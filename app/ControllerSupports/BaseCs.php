<?php

namespace App\ControllerSupports;

use App\Lib\Mir\MirExcelV2;
use App\Lib\Mir\MirExport;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lib\Mir\MirSearch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

/**
 * ControllerSupport の基底クラス
 * ダウンロード、アップロードの処理実体を定義。
 */
abstract class BaseCs
{
    protected string $model_label = '';
    protected string $model_name = '';
    protected string $upload_input = '';
    protected int $download_max = 20000;
    protected int $upload_max = 20000;
    protected string $upload_key = 'id';

    function __construct() {}

    /**
     * 最終検索条件を保存する
     *
     * @param Request $request
     * @param array $conds
     * @return void
     */
    public function saveConds(Request $request, array $conds)
    {
        MirSearch::setLast($request, $conds, $this->model_name);
    }

    /**
     * エクスポートエクセルのダウンロード用一時ファイルを保存する
     *
     * @param Request $request
     * @return string
     */
    public function getDownloadFullPath(Request $request): string
    {
        $download_matrix = $this->getMatrixFromDb($request);

        $abs_path = MirExcelV2::export($download_matrix, $this->model_name);

        return $abs_path;
    }

    public function newDownloadFileName(): string
    {
        $timestr = now()->format('Ymd_His');
        return "{$this->model_label}_{$timestr}.xlsx";
    }

    public function getUploadLabel(): string
    {
        return $this->model_label;
    }

    public function getUploadPrefix(): string
    {
        return $this->model_label;
    }

    public function getUploadInput(): string
    {
        return $this->upload_input;
    }

    /**
     * アップロードされたエクセルとの差分を表示する。
     *
     * @param Request $request
     * @return array
     */
    public function getUploadDiff(Request $request): array
    {
        // メモリ不足対策
        ini_set("memory_limit", "400M");
        set_time_limit(360);

        // アップロードされたファイル内のデータを整形する
        $label = $this->getUploadLabel();
        $prefix = $this->getUploadPrefix();
        $input = $this->getUploadInput();

        // アップロードファイル名と拡張子のエラーチェック
        $file_error = MirExport::checkUploadFileNameError(
            request: $request,
            prefix: $prefix,
            input: $input,
            exts: ['.xls', '.xlsx'],
        );

        if ($file_error) {
            return [
                'file_error' => $file_error
            ];
        }

        // アップロードされたエクセルの内容を配列として取得
        $uploaded_matrix = MirExport::getUploadedMatrix(
            request: $request,
            input: $input
        );

        // エクセルの内容を整形
        $uploaded_matrix = $this->formatUploadedRecords($uploaded_matrix);

        if (count($uploaded_matrix) == 0) {
            return [
                'content_errors' => 'ファイル中にデータがありません。',
                'uploaded_matrix' => $uploaded_matrix,
            ];
        }

        if (count($uploaded_matrix) > $this->upload_max) {
            return [
                'content_errors' => "データ件数が{$this->upload_max}件を超えています。{$this->upload_max}件以内に分割してください。",
                'uploaded_matrix' => $uploaded_matrix,
            ];
        }

        // アップロードされた内容のエラーチェック
        $content_errors = $this->validateUploadedMatrix($uploaded_matrix);
        if (count($content_errors)) {
            info("ERROR: Upload error for '{$label}'", $content_errors);

            return [
                'content_errors' => $content_errors,
                'uploaded_matrix' => $uploaded_matrix,
            ];
        }

        // アップロードされた内容をDBに一時保存
        $data_key = MirExport::saveToTmpStorage(
            prefix: $prefix, 
            uploaded_matrix: $uploaded_matrix,
            original_file_name: request()->file($input)->getClientOriginalName(),
            original_file_size: request()->file($input)->getSize(),
            user_id: Auth::user()?->id,
        );
        
        // 現状のDBの内容との、差分を表示する
        $x_of_key = 1;
        $y_of_key = 1;

        // アップロードされたファイル中からIDの配列を取得する。
        // [1, 2, 3] アップロードされたID
        $ids = MirExport::getIdsFromMatrix($uploaded_matrix);

        // データベースから $ids のデータを取得する
        $db_matrix = $this->getUniqRowKeysFromDbByIds($ids);

        // 差分比較するIDキーを取得する。
        // [1, 2, 3] アップロードされたID
        $row_keys = MirExport::uniqRowKeys($uploaded_matrix, $x_of_key);

        // アップロードされたエクセルファイルの内容を、比較用の配列に展開
        $row_col_keys1 = MirExport::getRowColValue($db_matrix, $y_of_key, $x_of_key);

        // 現状のDBの内容を、、比較用の配列に展開
        $row_col_keys2 = MirExport::getRowColValue($uploaded_matrix, $y_of_key, $x_of_key);

        // カラムのキーを取得する
        $col_keys = array_keys($this->getExportKvs());

        // カラムの名称を取得する
        $col_names = array_values($this->getExportKvs());

        $ret = [
            'data_key' => $data_key,
            'row_col_keys1' => $row_col_keys1,
            'row_col_keys2' => $row_col_keys2,
            'col_keys' => $col_keys,
            'col_names' => $col_names,
            'row_keys' => $row_keys,
        ];
        return $ret;
    }

    /**
     * ローカルファイルをインポートする。
     *
     * @param string $import_file_path
     * @return array
     */
    public function importSeedExcelFile(string $import_file_path): array
    {
        // メモリ不足対策
        ini_set("memory_limit", "400M");
        set_time_limit(360);

        // ファイル内のデータを整形する
        $label = $this->getUploadLabel();
        $prefix = $this->getUploadPrefix();
        $input = $this->getUploadInput();

        // アップロードされたエクセルの内容を配列として取得
        $uploaded_matrix = MirExport::getImportedMatrix(
            import_file_path: $import_file_path,
        );

        // エクセルの内容を整形
        $uploaded_matrix = $this->formatUploadedRecords($uploaded_matrix);

        if (count($uploaded_matrix) == 0) {
            return [
                'is_success' => 'N',
                'cnt' => 0,
                'msg' => "ファイル中にデータがありません。",
            ];
        }

        if (count($uploaded_matrix) > $this->upload_max) {
            return [
                'is_success' => 'N',
                'cnt' => 0,
                'msg' => "データ件数が{$this->upload_max}件を超えています。{$this->upload_max}件以内に分割してください。",
            ];
        }

        // アップロードされた内容のエラーチェック
        $content_errors = $this->validateUploadedMatrix($uploaded_matrix);
        if (count($content_errors)) {
            info("ERROR: Upload error for '{$label}'", $content_errors);

            return [
                'is_success' => 'N',
                'cnt' => 0,
                'msg' => implode("\n", $content_errors),
            ];
        }

        // アップロードされた内容をDBに一時保存
        $data_key = MirExport::saveToTmpStorage(
            prefix: $prefix, 
            uploaded_matrix: $uploaded_matrix,
            original_file_name: basename($import_file_path),
            original_file_size: filesize($import_file_path),
            user_id: Auth::user()?->id,
        );

        // データを保存する
        $ret = $this->execCommit(
            data_key: $data_key,
        );

        return $ret;
    }    

    public function importSeeder(): bool
    {
        $model_label = $this->getUploadLabel();
        $model_name = $this->getUploadLabel();
        $import_seed_excel_file = storage_path("initdata/{$model_label}_initdata.xlsx");

        $ret = $this->importSeedExcelFile($import_seed_excel_file);

        $is_success = $ret['is_success'] ?? 'N';
        $cnt = $ret['cnt'] ?? 0;
        $msg = $ret['msg'] ?? '';
        $class = __CLASS__;

        if ($is_success != 'Y') {
            throw new \Exception("{$class} Failed to Import {$import_seed_excel_file} as {$model_label} ({$model_name}): " . $msg);
        }

        logger("Imported {$import_seed_excel_file} {$model_label} ({$model_name}): cnt=", $cnt);

        return true;
    }

    /**
     * アップロード後のデータを保存する処理
     *
     * @param Request $request
     * @param string $data_key
     * @return array
     */
    public function uploadCommit(
        Request $request, 
        string $data_key, 
        string $default_key = 'id', 
        $save_columns = []
    ): array
    {
        return $this->execCommit(
            $data_key, 
            $default_key,
            $save_columns,
        );
    }

    protected function execCommit(
        string $data_key, 
        string $default_key = 'id', 
        $save_columns = []
    ): array
    {
        // 実行時間を確保
        set_time_limit(300); 

        // 一時保存したデータを取得
        $uploaded_matrix = MirExport::loadFromTmpStorage($data_key);

        // 一次取得データの有効期限切れかを確認
        if (! $uploaded_matrix) {
            return [
                'is_success' => 'N',
                'cnt' => 0,
                'msg' => "アップロードの有効期限が切れました。お手数ですが、再度アップロードして下さい。",
            ];
        }

        // データベースにあるデータを取得（比較用）
        $x_of_key = 1;

        $label = $this->getUploadLabel();

        // 新規登録・更新・削除を行う
        $x_of_key = 1;

        // カラム位置
        $col_keys = $uploaded_matrix[1] ?? '';

        $cnt = [
            'total' => 0,
            'insert' => 0,
            'update' => 0,
            'delete' => 0,
            'same' => 0,
            'already_deleted' => 0,
        ];

        for ($y = 2; $y < count($uploaded_matrix); $y++) {

            $cnt['total']++;

            $line = implode('', $uploaded_matrix[$y]);

            if (str_starts_with($line, '#')) {
                continue;
            }

            if (empty($line)) {
                continue;
            }

            // そのデータのIDを取得
            $id = $uploaded_matrix[$y][$x_of_key];

            if ($default_key == 'id') {
                $record = $this->find(intval($id));
            } else {
                $record = $this->findByKey($id, $default_key);
            }

            // Casts
            $casts = $record?->getCasts();

            // カラムキーとデータの連想配列を作る
            $item = [];
            $is_same = true;
            for ($x = 0; $x < count($col_keys); $x++) {
                $colkey = $col_keys[$x];
                $colkey = str_replace('#', '', $colkey);

                $item[$colkey] = $uploaded_matrix[$y][$x] ?? null;
                $cast = $casts[$colkey] ?? '';

                // FastExcelはセルを文字列型に強制して渡してくるので、array型で入れたい場合はjson_encodeでarrayに戻してあげる
                if ($cast == 'array') {
                    if ($item[$colkey]) {
                        $item[$colkey] = json_decode($item[$colkey]);
                    }
                }

                // 既存のレコードと同一かを判定
                if ($is_same) {
                    $db_val = $record[$colkey] ?? null;
                    if ($db_val != $item[$colkey]) {
                        $is_same = false;
                    }
                }
            }

            // 保存前に、連想配列の加工
            $item = $this->beforeSaveUploadedItem($item);

            // 登録・更新するカラムを絞る
            if ($save_columns) {
                $save_columns[] = 'Delete1';
                $item = Arr::only($item, $save_columns);
            }

            // 登録するカラムを絞る
            $item = Arr::only($item, array_keys($this->getExportKvs()));

            logger("IMPORT {$label} y={$y} id={$id}", $item);

            if (($item['Delete1'] ?? '') == '1') {
                if (! empty($record)) {
                    $record->forceDelete();
                    logger("DELETE {$label} y={$y} id={$id}");
                    $cnt['delete']++;
                } else {
                    $cnt['already_deleted']++;
                }
                continue;
            }

            if (! empty($record)) {
                // 差分取得のため、元の値を保持。カラムは $item に合わせる
                $old_item = $record->toArray();
                $old_item = Arr::only($old_item, array_keys($item));
                logger("UPDATE 111 ", $item);
                logger("UPDATE 222 ", $record->toArray());

                // パスワードはいかなる場合も変更しない
                unset($item['password']);

                $record->update($item);

                logger("UPDATE 333 ", $item);

                if (! $is_same) {
                    // 変更あり
                    $cnt['update']++;
                    logger("UPDATE {$label} y={$y} id={$id}", $item);

                    // 変更点を記録するために呼び出し
                    if (gettype($id) == 'integer') {
                        $this->recordItemChange(
                            target_id: $id,
                            old_item: $old_item, 
                            new_item: $item,
                        );
                    }
                } else {
                    // 変更なし
                    $cnt['same']++;
                }
            } else {
                unset($item['created_at']);
                unset($item['updated_at']);
                unset($item['deleted_at']);
                if (empty($item['seq'])) {
                    $item['seq'] = time();
                }
                $id = $this->create($item);

                $item['id'] = $id;
                logger("CREATE {$label} y={$y} id={$id}", $item);
                $cnt['insert']++;
            }

            // 保存後の後処理
            $this->afterSaveUploadedItem($item);
        }

        // 結果を表示

        $msg = "{$label}の変更はありませんでした。";

        if ($cnt['insert'] + $cnt['update'] + $cnt['delete'] + $cnt['same'] > 0) {
            $msg = "{$label}データを{$cnt['total']}件読込み";

            if ($cnt['insert']) {
                $msg .= "、{$cnt['insert']}件追加";
            }

            if ($cnt['update']) {
                $msg .= "、{$cnt['update']}件更新";
            }

            if ($cnt['delete']) {
                $msg .= "、{$cnt['delete']}件削除";
            }

            if ($cnt['already_deleted']) {
                $msg .= "({$cnt['already_deleted']}件は既に削除済)";
            }

            $msg .= "しました。";

            if ($cnt['same']) {
                $msg .= "{$cnt['same']}件は変更がありませんでした。";
            }
        }

        return [
            'is_success' => 'Y',
            'error_message' => '',
            'cnt' => $cnt,
            'msg' => $msg,
        ];
    }

    protected function getXOfKey(array $uploaded_matrix)
    {
        $x_of_key = [];
        for ($x = 0; $x < count($uploaded_matrix[1]); $x++) {
            $key = $uploaded_matrix[1][$x] ?? '';
            if ($key) {
                $x_of_key[$key] = $x;
            }
        }

        return $x_of_key;
    }

    /**
     * アップロードされたエクセルファイルをルールに沿ってバリデートする
     *
     * @param array $uploaded_matrix
     * @return array $errors エラーの位置と内容を返す
     * $errors[1,3] = '氏名は必須です。';
     */
    public function validateUploadedMatrix(array $uploaded_matrix): array
    {
        $export_kvs = $this->getExportKvs();
        $header_column_keys = $uploaded_matrix[1];
        $x_of_key = $this->getXOfKey($uploaded_matrix);
        $errors = [];

        for ($y = 2; $y < count($uploaded_matrix); $y++) {
            $attributes = [];
            for ($x = 0; $x < count($uploaded_matrix[$y]); $x++) {
                $key = $header_column_keys[$x] ?? '';
                if (! $key) {
                    continue;
                }
                $attributes[$key] = strval($uploaded_matrix[$y][$x]);
            }
            $id = $attributes[$this->upload_key] ?? 0;

            $rules = $this->getUploadRules($id, $attributes);
            $validator = Validator::make($attributes, $rules, [], $export_kvs);

            if ($validator->fails()) {
                foreach ($validator->errors()->get('*') as $key => $err) {
                    $pos = $x_of_key[$key] ?? 0;
                    $errors["{$y},{$pos}"] = implode('、', $err);
                }
            }
        }

        return $errors;
    }

    /**
     * エクセルでアップロードされた値を整形する
     *
     * @param array $uploaded_matrix
     * @return array
     */
    protected function formatUploadedRecords(array $uploaded_matrix): array
    {
        $header_column_keys = $uploaded_matrix[1];
        $new_matrix = [];

        $new_matrix[] = $uploaded_matrix[0] ?? [];
        $new_matrix[] = $uploaded_matrix[1] ?? [];

        for ($y = 2; $y < count($uploaded_matrix); $y++) {
            $new_item = [];
            for ($x = 0; $x < count($uploaded_matrix[$y]); $x++) {
                $k = $header_column_keys[$x] ?? '';
                $v = $uploaded_matrix[$y][$x] ?? '';

                $v = $this->formatUploadedItem(key: $k, val: $v);

                if ($v == '') {
                    $v = null;
                }
                $new_item[] = $v;
            }
            $new_matrix[] = $new_item;
        }

        return $new_matrix;
    }

    // 以下は子クラスでちゃんと定義すること。

    /**
     * 
     * ページ遷移時に引き継ぎ回したいすべての値を
     * リクエストから読み取り、 conds という変数にいれる
     * 
     * ビューでのページ遷移時には次のリクエストに conds 変数を渡す
     * 
     * 継承先クラスの、コントローラーのすべての関数から呼ばれる
     * つまり、すべてのリクエストから呼ばれる。
     *
     * 
     * @param [type] $request
     * @param array $merge
     * @return array
     */
    public function getConds($request, array $merge = []): array
    {
        logger("Warning: BaseCs getConds() called.");
        return [];
    }

    /**
     * ソートの種類を定義する
     * generator v4で自動生成されたものをそのまま使うということでよい
     *
     * @return array
     */
    public function getOrders(): array
    {
        logger("Warning: BaseCs getOrders() called.");
        return [];
    }

    /**
     * ソートの種類に応じた実際のカラム名を定義する。
     * generator v4で自動生成されたものをそのまま使うということでよい
     *
     * @return array
     */
    protected function orderColumn(array $conds): string
    {
        logger("Warning: BaseCs orderColumn() called.");
        return '';
    }

    /**
     * 検索条件のcondsの値に応じて、結果のCollectionを返す。
     *
     * @return array
     */
    public function getSearch(array $conds, array $addConds = [], bool $forMap = false)
    {
        logger("Warning: BaseCs getSearch() called.");
    }

    /**
     * 検索結果のcondsの値に応じて、現在の検索条件をテキストで返す。
     *
     * @param array $conds
     * @return string
     */
    public function getSearchDescription(array $conds): string
    {
        logger("Warning: BaseCs getSearchDescription() called.");
        return '';
    }  
    
    /**
     * １件検索。
     * ここでは抽象モデルで検索するようにしているが、
     * 継承先のクラスで実際のモデルインスタンスを検索
     *
     * @param integer $id
     * @param string $key
     * @return Model|null
     */
    protected function find(int $id, string $key = 'id'): Model|null
    {
        logger("Warning: BaseCs find() called.");
        return null;
    }

    /**
     * １件作成の抽象関数
     *
     * @param array $item
     * @return integer
     */
    protected function create(array $item): int
    {
        logger("Warning: BaseCs create() called.");
        return 0;
    }

    /**
     * １件検索の抽象関数。
     * アップロード時に、一部のデータだけアップロードされた場合に、
     * そのデータの現在の値をIDの配列から取得する。
     * 差分を表示するために使う。
     * 最大1000件まで。
     *
     * @param array $ids
     * @return void
     */
    protected function findByIds(array $ids)
    {
        logger("Warning: BaseCs findByIds() called.");
        return;
    }    

    /**
     * １件検索の抽象関数。数値型のidではなく、文字列型のキーで検索する。
     * 
     * アップロード時に、（別DB間で同じ内容を移行したいときのために）
     * キーとして id は含めず「部署コード」「カテゴリコード」にしたい場合がある。
     * そのときに現状の値を取得するために使う。
     *
     * @param [type] $val
     * @param string $key
     * @return void
     */
    protected function findByKey($val, string $key = 'id')
    {
        logger("Warning: BaseCs findByKey() called.");
        return;
    }    

    /**
     * アップロード時に、各値を修正するために使う。
     * レコードごとに、値のキーごとに呼び出される。
     *
     * @param string $key 値のキー（DBのカラム名等）
     * @param string $val 値
     * @return void
     */
    protected function formatUploadedItem(string $key, string $val)
    {
        logger("Warning: BaseCs formatUploadedItem() called.");
        return;
    }    

    /**
     * ダウンロード・アップロード時の項目拡張対応。
     * 子クラスで追加項目を定義する。
     *
     * @return array
     */
    protected function getExportKvs(): array
    {
        logger("Warning: BaseCs getExportKvs() called.");
        return [];
    }

    /**
     * アップロード時の項目拡張をしたら、ルールを追加する
     *
     * @param string $id
     * @param array $item
     * @return array
     */
    protected function getUploadRules(string $id = '0', array $item = []): array
    {
        logger("Warning: BaseCs getUploadRules() called.");
        return [];
    }

    /**
     * データベースから、条件指定されたマトリクスファイルの作成
     * 
     * ダウンロード時に項目を拡張する際は、継承先クラスで実装し直し、
     * 拡張項目をここで返す。
     *
     * @param Request $request
     * @return array
     */
    protected function getMatrixFromDb(Request $request): array
    {
        $conds = $this->getConds($request);
        $collections = $this->getSearch($conds, [
            'n' => $this->download_max, // エクセルの最大件数
        ]);
        $export_kvs = $this->getExportKvs();
        $download_matrix = MirExport::make_matrix(
            collections: $collections,
            export_kvs: $export_kvs,
            append_delete_column: true
        );

        return $download_matrix;
    }

    /**
     * データベースから、ID(複数)指定されたマトリクスファイルの作成
     * 
     * ダウンロード時に項目を拡張する際は、継承先クラスで実装し直し、
     * 拡張項目をここで返す。
     *
     * @param Request $request
     * @return array
     */
    protected function getMatrixFromDbByIds(array $ids): array
    {
        $ids_chunks = array_chunk($ids, 1000);

        $collections_all = new \Illuminate\Database\Eloquent\Collection();

        foreach ($ids_chunks as $ids_chunk) {
            $collections = $this->findByIds($ids_chunk);
            $collections_all->push($collections);
        }
        $collections_all_flattened = $collections_all->flatten();

        $export_kvs = $this->getExportKvs();
        $download_matrix = MirExport::make_matrix(
            collections: $collections_all_flattened,
            export_kvs: $export_kvs,
            append_delete_column: true
        );

        return $download_matrix;
    }

    /**
     * データベースから、ID(複数)指定されたマトリクスファイルの作成
     * 
     * ダウンロード時に項目を拡張する際は、継承先クラスで実装し直し、
     * 拡張項目をここで返す。
     *
     * @param Request $request
     * @return array
     */
    protected function getUniqRowKeysFromDbByIds(array $ids): array
    {
        $ids_chunks = array_chunk($ids, 1000);

        $collections_all = new \Illuminate\Database\Eloquent\Collection();

        foreach ($ids_chunks as $ids_chunk) {
            $collections = $this->findByIds($ids_chunk);
            $collections_all->push($collections);
        }
        $collections_all_flattened = $collections_all->flatten();

        $export_kvs = $this->getExportKvs();
        $download_matrix = MirExport::makeBoxMatrix(
            collections: $collections_all_flattened,
            export_kvs: $export_kvs,
            append_delete_column: true
        );

        return $download_matrix;
    }

    /**
     * アップロード時の項目拡張対応用（同一テーブルへの値変換・追加項目保存）
     * 
     * １件インポートする前に、呼び出される。
     * $itemの中身を修正可能。
     *
     * @param array $item
     * @return array
     */
    protected function beforeSaveUploadedItem(array $item): array
    {
        return $item;
    }

    /**
     * アップロード時の項目拡張対応用（別テーブルへの保存）
     * 
     * １件インポートした後に、呼び出される。
     *
     * @param array $item
     * @return array
     */
    protected function afterSaveUploadedItem(array $item): array
    {
        return $item;
    }

    /**
     * 変更点を記録するため、更新時に呼び出される関数。
     * 実際の処理は、子CSクラスで行う。
     *
     * @param int $target_id
     * @param array $old_item
     * @param array $new_item
     * @return void
     */
    protected function recordItemChange(int $target_id, array $old_item, array $new_item): void
    {
        return;
    }
    
}
