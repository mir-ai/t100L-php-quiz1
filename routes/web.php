<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\V4\SampleV4Controller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 基本認証領域（第一ログイン）
if (Route::group(['middleware' => 'auth.very_basic'], function () {

    // ID・パスワードログイン領域（第二ログイン）
    Route::group(['middleware' => 'auth'], function () {
        // admin
        Route::prefix('admin')->name('r4.')->group(function () {

            // サンプルテーブル管理
            Route::controller(SampleV4Controller::class)->group(function () {
                // サンプルテーブル管理
                Route::prefix('/samples')->name('samples.')->group(function () {
                    // ダウンロード画面
                    Route::get('/download', 'download')->name('download');

                    // アップロード画面
                    Route::get('/uploader', 'uploader')->name('uploader');
                    
                    // アップロードファイルと現在の内容との差分表示
                    Route::post('/upload_diff/wfps', 'upload_diff')->name('upload_diff');

                    // アップロード情報で更新
                    Route::post('/upload_commit/{data_key}', 'upload_commit')->name('upload_commit');

                    // 最後の検索条件で一覧に戻る
                    Route::get('/last_conds', 'last_conds')->name('last_conds');

                    // 並べ替え
                    Route::get('/seq', 'seq')->name('seq');

                    // 並べ替え保存
                    Route::post('/seq_save', 'seq_save')->name('seq_save');
                });

                // 一覧、詳細、登録、修正、削除はここに
                Route::resource('samples', SampleV4Controller::class);
            })->whereNumber('sample');
        });

    });

    Auth::routes();

}));
