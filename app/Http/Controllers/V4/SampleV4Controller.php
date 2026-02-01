<?php

namespace App\Http\Controllers\V4;

use App\Models\Sample;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\ControllerSupports\SampleCs;
use App\UseCases\SampleUseCase;
use App\Http\Requests\V4\SampleStoreRequest;
use App\Http\Requests\V4\SampleUpdateRequest;
use App\Http\Requests\V4\SampleUpdateRawRequest;
use Illuminate\Support\Facades\View;

/**
 * サンプルテーブルのコントローラー
 */
class SampleV4Controller extends Controller
{
    private SampleCs $sampleCs;
    private SampleUseCase $sampleUseCase;

    public function __construct(
    ) {
        // リクエスト情報から設置場所と事業者名を取得する。
        $this->middleware(function ($request, $next) {
            $this->init($request);
            return $next($request);
        });
    }

    // リクエスト情報から設置場所と事業者名を取得する。
    private function init($request)
    {
        // sampleCs と sampleUseCase を生成する
        $this->sampleCs = new SampleCs();

        $this->sampleUseCase = new SampleUseCase();
    }

    /**
     * サンプルテーブルの一覧表示・検索画面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Sample::class);

        $conds = $this->sampleCs->getConds($request, [
            'd' => 'index',
        ]);
        $orders = $this->sampleCs->getOrders();
        $samples = $this->sampleCs->getSearch($conds);
        $search_description = $this->sampleCs->getSearchDescription($conds);
        $this->sampleCs->saveConds($request, $conds);

        return view('v4.samples.index', compact(
            'samples',
            'conds',
            'orders',
            'search_description',
        ));
    }

    /**
     * サンプルテーブルの登録フォーム
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $conds = $this->sampleCs->getConds($request);

        $this->authorize('create', Sample::class);

        return view('v4.samples.create', compact([
            'conds'
        ]));
    }

    /**
     * サンプルテーブルの登録処理
     *
     * @param  \App\Http\Requests\SampleStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SampleStoreRequest $request)
    {
        $this->authorize('create', Sample::class);
        $conds = $this->sampleCs->getConds($request);

        $attributes = array_merge($request->validated(), [
        ]);

        logger("create samples attributes=", $attributes);

        $sample = Sample::create($attributes);

        // TODO: 次の行き先を決める
        $route = 'r4.samples.last_conds';

        return redirect()
            ->route($route, array_merge($conds, ['sample' => $sample]))
            ->with('flash_message',  "サンプルテーブル「{$sample->ItemTitle}」を作成しました。");
    }

    /**
     * サンプルテーブルの更新フォーム
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Sample $sample)
    {
        $this->authorize('update', $sample);

        $conds = $this->sampleCs->getConds($request);

        return view('v4.samples.edit', compact(
            'sample',
            'conds'
        ));
    }

    /**
     * サンプルテーブルの更新処理
     *
     * @param  \App\Http\Requests\SampleUpdateRequest  $request
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function update(SampleUpdateRequest $request, Sample $sample)
    {
        $this->authorize('update', $sample);

        $attributes = array_merge($request->validated(), []);
        $conds = $this->sampleCs->getConds($request);

        $sample->update($attributes);

        // TODO: 次の行き先を決める
        $route = 'r4.samples.last_conds';

        return redirect()
            ->route($route, array_merge($conds, ['sample' => $sample]))
            ->with('flash_message',  "サンプルテーブル「{$sample->ItemTitle}」を更新しました。");
    }

    /**
     * サンプルテーブルの更新フォーム(直接編集)
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function edit_raw(Request $request, Sample $sample)
    {
        $this->authorize('update_raw', $sample);

        $conds = $this->sampleCs->getConds($request);
        
        return view('v4.samples.edit_raw', compact(
            'sample',
            'conds',
        ));
    }

    /**
     * サンプルテーブルの直接更新処理
     *
     * @param  \App\Http\Requests\SampleUpdateRawRequest  $request
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function update_raw(SampleUpdateRawRequest $request, Sample $sample)
    {
        $this->authorize('update', $sample);

        $attributes = array_merge($request->validated(), []);
        $conds = $this->sampleCs->getConds($request);
        $sample_old = clone $sample;
    
        $sample->update($attributes);

        // TODO: 次の行き先を決める
        $route = 'r4.samples.last_conds';

        return redirect()
            ->route($route, array_merge($conds, ['sample' => $sample]))
            ->with('flash_message',  "サンプルテーブル「{$sample->ItemTitle}」を直接更新しました。");
    }

    /**
     * サンプルテーブルを１件削除
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Sample $sample)
    {
        $conds = $this->sampleCs->getConds($request);

        $this->authorize('delete', $sample);

        $delete_id = $sample->id;
        $item_title = $sample->ItemTitle;

        // TODO: ユニークキーを持つモデルは forceDelete(); が好ましい。
        $sample->delete();

        return redirect()
            ->route('r4.samples.last_conds')
            ->with('flash_message', "サンプルテーブル「{$item_title}」を削除しました。");
    }

    /**
     * サンプルテーブルを１件表示
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Sample $sample)
    {
        $this->authorize('view', $sample);

        $conds = $this->sampleCs->getConds($request);
        $this->sampleCs->saveConds($request, $conds);

        return view('v4.samples.show', compact(
            'sample',
            'conds',
        ));
    }

    /**
     * サンプルテーブルの前回の検索条件を再現して一覧表示
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function last_conds(Request $request)
    {
        return $this->sampleCs->redirectToLastCondition($request);
    }

    /**
     * サンプルテーブルのエクセル出力
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        $new_excel_full_path = $this->sampleCs->getDownloadFullPath(
            request: $request
        );

        $new_file_name = $this->sampleCs->newDownloadFileName();

        return response()
            ->download(
                $new_excel_full_path,
                $new_file_name,
            )
            ->deleteFileAfterSend(true);
    }

    /**
     * サンプルテーブルのアップロード画面
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function uploader(Request $request)
    {
        $this->authorize('upload', Sample::class);

        $label = $this->sampleCs->getUploadLabel();
        $prefix = $this->sampleCs->getUploadPrefix();
        $input = $this->sampleCs->getUploadInput();

        $next = route('r4.samples.upload_diff');
        $back = route('r4.samples.last_conds');

        return view('uploader.uploader', compact(
            'label',
            'prefix',
            'input',
            'next',
            'back',
        ));
    }

    /**
     * サンプルテーブルのアップロードデータの現行との差分表示
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function upload_diff(Request $request)
    {
        $this->authorize('upload', Sample::class);

        $label = $this->sampleCs->getUploadLabel();
        $back = route('r4.samples.uploader');

        $res = $this->sampleCs->getUploadDiff($request);

        // アップロードされたファイル名に関するエラー
        $file_error = $res['file_error'] ?? '';
        if ($file_error) {
            return redirect($back)
            ->with('flash_warning', $file_error);
        }

        // アップロードされたファイルの内容に関するエラー
        $content_errors = $res['content_errors'] ?? '';
        if ($content_errors) {
            return view('uploader.upload_errors', [
                'label' => $label,
                'back' => $back,
                'errors' => $content_errors,
                'uploaded_matrix' => $res['uploaded_matrix']
            ]);
        }

        $next = route('r4.samples.upload_commit', ['data_key' => $res['data_key']]);

        $params = [
            'row_col_keys1' => $res['row_col_keys1'],
            'row_col_keys2' => $res['row_col_keys2'],
            'col_names' => $res['col_names'],
            'col_keys' => $res['col_keys'],
            'row_keys' => $res['row_keys'],
            'data_key' => $res['data_key'],
            'label' => $label,
            'next' => $next,
            'back' => $back,
        ];

        return view('uploader.upload_diff', $params);
    }

    /**
     * サンプルテーブルのアップロード反映
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function upload_commit(Request $request, string $data_key)
    {
        $this->authorize('upload', Sample::class);

        $res = $this->sampleCs->uploadCommit(
            request: $request,
            data_key: $data_key,
        );

        // エラー発生時
        if ($res['error_message'] ?? '') {
            return redirect(
                route('r4.samples.uploader')
            )->with('flash_warning', $res['error_message']);
        }

        // 正常完了時
        return redirect()
            ->route('r4.samples.last_conds', [
                
                'dest' => 'index',
            ])
            ->with('flash_modal', $res['msg']);
    }

    /**
     * サンプルテーブルのソート
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function seq(Request $request)
    {
        $this->authorize('seq', Sample::class);

        $conds = $this->sampleCs->getConds($request);
        $samples = $this->sampleCs->getSearch($conds, [
            'o' => 'sq-',
            'n' => 1000,
        ]);

        return view('v4.samples.seq', compact(
            'samples',
            'conds',
        ));
    }

    /**
     * サンプルテーブルのソート保存
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function seq_save(Request $request)
    {
        $this->authorize('seq', Sample::class);

        $item_ids = explode(',', $request->item_ids);
        $this->sampleCs->saveSortOrder($item_ids, 'seq');

        return redirect()
            ->route('r4.samples.last_conds', [
                
                'dest' => 'index',
                'o' => 'sq-',
            ])
            ->with('flash_message', '順序を変更しました');
    }
}
