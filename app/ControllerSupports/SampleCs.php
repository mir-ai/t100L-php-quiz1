<?php

namespace App\ControllerSupports;

use Carbon\Carbon;
use App\Lib\Mms\MmsCode;
use App\Models\Sample;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\DataAccess\SampleDa;
use \Illuminate\Support\Collection;
use App\UseCases\SampleUseCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Lib\Mir\MirSearch;
use App\Lib\Mir\MirUtil;

/**
 * サンプルテーブルのコントローラーの詳細処理
 * 条件検索、ソート等の詳細処理を行う。
 * ダウンロード、アップロード等は BaseCs に実体がある
 */
final class SampleCs extends BaseCs
{
    protected string $model_label = 'サンプルテーブル';
    protected string $model_name = 'sample';
    protected string $upload_input = 'excel';
    protected string $default_order = 'sq-';
    private SampleUseCase $sampleUseCase;

    function __construct() {
        $this->sampleUseCase = new SampleUseCase();
    }

    /**
     * エクスポートするカラムキーとカラム名の連想配列を返す
     *
     * @return array
     */
    protected function getExportKvs(): array
    {
        return [
            'id' => 'ID',
            'name' => '名前',
            'price' => '値段',
            'memo' => 'メモ',
            'seq' => '順序',
            'created_at' => '登録日時',
            'updated_at' => '更新日時'            
        ];
    }

    protected function getUploadRules(string $id = '0', array $item = []): array
    {
        $rules = [
            'id' => ['nullable', 'integer'],
            'name' => ['required', 'string', 'max:32'],
            'price' => ['required', 'integer'],
            'memo' => ['nullable', 'string', 'max:4000'],
            'seq' => ['required', 'integer'],
            'created_at' => ['nullable', 'date'],
            'updated_at' => ['nullable', 'date']            
        ];

        return $rules;        
    }

    /**
     * エクセルでアップロードされた値を整形する
     * 0000 がほしいのに エクセルが 0 にしてしまう場合などがあるので、
     * それを整形する。
     *
     * @param string $key
     * @param string $val
     * @return void
     */
    public function formatUploadedItem(string $key, string $val)
    {
        $ret = $val;

        /*
        if ($key == 'id') {
            $ret = $ret
        }
        */

        return $ret;
    }

    /**
     * クエリー文字列に応じた検索条件の配列を作成する
     *
     * @param Request $request
     * @param array $conds_merge 追加したい検索条件
     * @return array 検索条件の配列
     */
    public function getConds($request, array $merge = []): array
    {
        if ($request->last_conds) {
            $last_conds = MirSearch::getLast($request, 'sample');

            if ($last_conds) {
                $conds = array_merge($last_conds, $merge);
                return $conds;
            }
        }

        $conds = [
            'id' => $request->input('id'), // ID,
            'nm' => $request->input('nm'), // 名前,
            'pr' => $request->input('pr'), // 値段,
            'mm' => $request->input('mm'), // メモ,
            'pr' => $request->input('pr'), // 順序,
            'catf' => $request->input('catf'), // 登録日時以降,
            'catt' => $request->input('catt'), // 登録日時以前,
            'uatf' => $request->input('uatf'), // 更新日時以降,
            'uatt' => $request->input('uatt'), // 更新日時以前

            'catf' => $request->input('catf'), // 登録日From
            'catt' => $request->input('catt'), // 登録日To

            's'   => $request->input('s'), // 検索文字列
            'o'   => $request->input('o', $this->default_order),   // 順番
            'n'   => $request->integer('n', 100),   // 件数

            // 最後にいたインデックスページ(index, lnav, index_live)
            'd'   => $request->input('d'),

            // ビューの種類 ('edit', 'edit_raw')
            'v'   => $request->input('v'),
        ];

        $conds = array_merge($conds, $merge);

        // 各データはすべて文字列に直して記録する。
        // 配列のままで保持する案もあったが、
        // select multiで「すべて 0=>'' 」を選んだ際に来る [0=>null] を false とみなすのが難しかったため
        // 配列も文字列に直して保持する。
        $conds = MirUtil::stringifyCondsElements($conds);

        return $conds;
    }

    /**
     * 並べ替え順序の一覧を返す
     *
     * @return array
     */
    public function getOrders(): array
    {
        return [
            'id' => 'ID(昇順)',
            'id-' => 'ID(降順)',
            'nm' => '名前(昇順)',
            'nm-' => '名前(降順)',
            'pr' => '値段(昇順)',
            'pr-' => '値段(降順)',
            'mm' => 'メモ(昇順)',
            'mm-' => 'メモ(降順)',
            'pr' => '順序(昇順)',
            'pr-' => '順序(降順)',
            'cat' => '登録日時(昇順)',
            'cat-' => '登録日時(降順)',
            'uat' => '更新日時(昇順)',
            'uat-' => '更新日時(降順)'
        ];
    }

    /**
     * 条件 $conds をもとに順序のカラムを返す
     *
     * @param array $conds
     * @return string $column
     */
    protected function orderColumn(array $conds): string
    {
        $column = 'id';

        if ($conds['o']) {
            $o = $conds['o'];
            $o = str_replace(['-'], '', $o);

            $column = match ($o) {
                'id' => 'id',
                'nm' => 'name',
                'pr' => 'price',
                'mm' => 'memo',
                'pr' => 'seq',
                'cat' => 'created_at',
                'uat' => 'updated_at',

                default => $column
            };
        }

        return $column;
    }

    /**
     * その時の検索条件に従ってプログラムの一覧を取得する 
     *
     * @param Request $request
     * @param array $conds
     * @param array $addConds
     * @param boolean $forMap
     * @return Collection
     */
    public function getSearch(array $conds, array $addConds = [], bool $forMap = false)
    {
        $conds = array_merge($conds, $addConds);

        $results = Sample::query()

            // id
            ->when($conds['id'], fn($results) => $results->where(
                'id',
                $conds['id']
            ))

            // キーワード
            ->when($conds['s'], fn($results) => $results->where(
                fn($q) => $q->where(
                    // ID
                    'ID',
                    'like',
                    "%{$conds['s']}%",
                )
                ->orWhere(
                    // 詳細説明
                    'name',
                    'like',
                    "%{$conds['s']}%",
                )
            ))

            // 登録期間From
            ->when($conds['catf'], fn($results) => $results->where(
                'created_at',
                '>=',
                $conds['catf']
            ))

            // 登録期間To
            ->when($conds['catt'], fn($results) => $results->where(
                'created_at',
                '<=',
                MirUtil::parseDt($conds['catt'])?->endOfDay()
            ))

            // 順序を指定(NULLは常に後ろにする)
            ->orderByRaw(
                $this->orderColumn($conds) . " is null asc, " . $this->orderColumn($conds) . " " . MirSearch::orderDirection($conds, 'desc')
            );

        $count = $results->count();

        // $results->dd();

        $n = ($forMap) ? 200 : $conds['n'];

        // TODO: 件数が多くなる場合は $results = $results->simplePaginate($n); にする。
        $results = $results->paginate($n);

        // ページネーションに現状の検索条件を引き継ぎ
        $conds = Arr::where($conds, fn($value, $key) => $value);
        $results->appends($conds);

        return $results;
    }

    /**
     * 検索条件の説明文を作成する
     *
     * @param array $conds
     * @return string
     */
    public function getSearchDescription(array $conds): string
    {
        $descriptions = [];
        $orders = $this->getOrders();

        // ID
        if ($conds['id']) {
            $descriptions[] = "IDが{$conds['id']}";
        }

        // キーワード
        if ($conds['s']) {
            $descriptions[] = "「{$conds['s']}」を含む";
        }

        // 開始日
        if ($conds['catf']) {
            $descriptions[] = "登録日が{$conds['catf']}以降";
        }

        // 終了日
        if ($conds['catt']) {
            $descriptions[] = "登録日が{$conds['catt']}以前";
        }

        if ($conds['o']) {
            $orderDesc = $orders[$conds['o']] ?? '';
            if ($orderDesc) {
                // TODO: seq順の場合はここをコメントすれば非表示に
                // $descriptions[] = "{$orderDesc}";
            }
        }

        if (empty($descriptions)) {
            return '';
        }

        return implode('、', $descriptions);
    }

    public function redirectToLastCondition(Request $request)
    {
        $last_conds = MirSearch::getLast($request, $this->model_name);
        $last_conds = array_merge($last_conds);
        $last_conds = array_merge($last_conds, $request->all());

        // フラッシュデータを次のセッションまで持ち越し
        $request->session()->reflash();

        $dest = $last_conds['d'] ?? '';

        $destRoute = match ($dest) {
            'index'  => 'r4.samples.index',
            'lnav'  => 'r4.samples.lnav',
            'index_live'  => 'r4.samples.index_live',
            default  => 'r4.samples.index',
        };

        return redirect()
            ->route($destRoute, $last_conds);
    }

    /**
     * Save sort order
     *
     * @param array $item_ids
     * @return void
     */
    public function saveSortOrder(array $item_ids, string $order_column = 'seq'): void
    {
        $seq = 100000;
        foreach ($item_ids as $id) {
            SampleDa::update($id, [
                $order_column => $seq
            ]);
            $seq -= 2;
        }
        return;
    }

    /**
     * Find Record for BaseCs
     *
     * @param integer $id
     * @return Sample|null
     */
    protected function find(int $id, string $key = 'id'): Sample|null
    {
        return Sample::find($id);
    }

    /**
     * Create Record for BaseCs
     *
     * @param array $item
     * @return int
     */
    protected function create(array $item): int
    {
        $id = Sample::create($item)->id;
        return $id;
    }

    /**
     * 一次元配列で指定されたIDの配列に応じてレコードを取得する。最大1000件まで。
     *
     * アップロード時の差分比較用に BaseCs の getMatrixFromDbByIds から
     * 1000件ごとに分割して呼び出されている。
     *
     * @param array $ids
     * @return Collection|null
     */
    protected function findByIds(array $ids)
    {
        $collections = SampleDa::getMatrixByIds(
            ids: $ids,
        );
        return $collections;
    }
}
