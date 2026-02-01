<?php

namespace Tests\Feature\Web;

use Tests\TestCase;
use App\Models\Sample;
use App\Models\User;
use App\Models\MirSerializedVar;
use \Illuminate\Http\UploadedFile;
use Database\Seeders\TestUserTableSeeder;
use Illuminate\Support\Facades\Route;

/**
 * サンプルテーブル の登録、更新、一覧、詳細表示ページを http でアクセスしてエラーがないかを確認する。
 */
class SampleWebTest extends TestCase
{
    private $user;

    private string $string_column = 'memo';

    protected array $seeders = [
        TestUserTableSeeder::class,
        \Database\Seeders\SampleTableSeeder::class
    ];

    public function setUp(): void
    {
        parent::setUp();
    }

    // ダミーのユーザー情報作成(または更新)
    public function test_create_user()
    {
        Sample::query()->forceDelete();
        $this->seed($this->seeders);

        $this->assertTrue(true);
    }

    // 登録画面
    public function test_sample_create()
    {
        if (Route::has('r4.samples.create')) {
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          Sample::where($this->string_column, 'UNITTEST')->forceDelete();
          $response = $this->actingAs($user)->call('GET', route('r4.samples.create'), [], [], [], []);
          $response->assertStatus(200);
        } else {
            $this->assertTrue(true);
        }        
    }

    // 登録処理
    public function test_sample_store()
    {
        if (Route::has('r4.samples.store')) {
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          // TODO:
          $item = [
              'name' => fake()->word(),
            'price' => fake()->randomNumber(4),
            'memo' => fake()->text(),
            'seq' => fake()->randomNumber(4),
          ];
          $item[$this->string_column] = 'UNITTEST';

          $response = $this->actingAs($user)->call('POST', route('r4.samples.store'), $item, [], [], []);
          $response->assertStatus(302);
          $response->assertSessionHasNoErrors();
          $id = Sample::where($this->string_column, 'UNITTEST')->orderBy('id', 'desc')->value('id');
        } else {
            $this->assertTrue(true);
        }        
    }

    // 修正画面
    public function test_sample_edit()
    {
        if (Route::has('r4.samples.edit')) {
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $id = Sample::where($this->string_column, 'UNITTEST')->orderBy('id', 'desc')->value('id');
          $response = $this->actingAs($user)->call('GET', route('r4.samples.edit', ['sample' => ($id ?? 1),]), [], [], [], []);
          $response->assertStatus(200);
        } else {
            $this->assertTrue(true);
        }        
    }

    // 修正処理
    public function test_sample_update()
    {
        if (Route::has('r4.samples.update')) {
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $id = Sample::where($this->string_column, 'UNITTEST')->orderBy('id', 'desc')->value('id');
          $item = [
              // TODO:
              'name' => fake()->word(),
            'price' => fake()->randomNumber(4),
            'memo' => fake()->text(),
            'seq' => fake()->randomNumber(4),
          ];
          $item[$this->string_column] = 'UNITTEST';
          $response = $this->actingAs($user)->call('PUT', route('r4.samples.update', ['sample' => $id,]), $item, [], [], []);
          $response->assertStatus(302);
          $response->assertSessionHasNoErrors();
        } else {
            $this->assertTrue(true);
        }        
    }

    // 表示
    public function test_sample_show()
    {
        if (Route::has('r4.samples.show')) {
          $id = Sample::where($this->string_column, 'UNITTEST')->orderBy('id', 'desc')->value('id');
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $response = $this->actingAs($user)->call('GET', route('r4.samples.show', ['sample' => ($id ?? 1),]), [], [], [], []);
          $response->assertStatus(200);
        } else {
            $this->assertTrue(true);
        }        
    }

    // 直接編集フォーム
    public function test_sample_edit_raw()
    {
        if (Route::has('r4.samples.edit_raw')) {
          $id = Sample::where($this->string_column, 'UNITTEST')->orderBy('id', 'desc')->value('id');
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $response = $this->actingAs($user)->call('GET', route('r4.samples.edit_raw', ['sample' => ($id ?? 1),]), [], [], [], []);
          $response->assertStatus(200);
        } else {
            $this->assertTrue(true);
        }        
    }
    
    // 直接修正処理
    public function test_sample_update_raw()
    {
        if (Route::has('r4.samples.update_raw')) {
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $id = Sample::where($this->string_column, 'UNITTEST')->orderBy('id', 'desc')->value('id');
          $item = [
              // TODO:
              'name' => fake()->word(),
            'price' => fake()->randomNumber(4),
            'memo' => fake()->text(),
            'seq' => fake()->randomNumber(4),
          ];
          $item[$this->string_column] = 'UNITTEST';
          $response = $this->actingAs($user)->call('PATCH', route('r4.samples.update_raw', ['sample' => $id,]), $item, [], [], []);
          $response->assertStatus(302);
          $response->assertSessionHasNoErrors();
        } else {
            $this->assertTrue(true);
        }        
    }

    // 一覧表示画面
    public function test_sample_index()
    {
        if (Route::has('r4.samples.index')) {
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $response = $this->actingAs($user)->call('GET', route('r4.samples.index'), [], [], [], []);
          $response->assertStatus(200);
        } else {
            $this->assertTrue(true);
        }        
    }

    // 並べ替え
    public function test_sample_seq()
    {
        if (Route::has('r4.samples.seq')) {
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $response = $this->actingAs($user)->call('GET', route('r4.samples.seq'), [], [], [], []);
          $response->assertStatus(200);
        } else {
            $this->assertTrue(true);
        }        
    }

    // 並べ替え保存
    public function test_sample_seq_save()
    {
        if (Route::has('r4.samples.seq_save')) {
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $response = $this->actingAs($user)->call('POST', route('r4.samples.seq_save', ['item_ids' => '1,2']), [], [], [], []);
          $response->assertStatus(302);
        } else {
          $this->assertTrue(true);
        }
    }

    // 削除
    public function test_sample_destroy()
    {
        if (Route::has('r4.samples.destroy')) {
          $id = Sample::where($this->string_column, 'UNITTEST')->orderBy('id', 'desc')->value('id');
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);

          $response = $this->actingAs($user)->call('DELETE', route('r4.samples.destroy', ['sample' => ($id ?? 1),]), [], [], [], []);
          $response->assertStatus(302);
        } else {
            $this->assertTrue(true);
        }        
    }

    // ダウンロード
    public function test_sample_download()
    {
        if (Route::has('r4.samples.download')) {
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $response = $this->actingAs($user)->call('GET', route('r4.samples.download'), [], [], [], []);
          $response->assertStatus(200);
          $this->assertTrue(strpos($response->headers->get('content-disposition'), 'attachment; filename=') !== false);
        } else {
            $this->assertTrue(true);
        }        
    }

    // アップロード画面
    public function test_sample_uploader()
    {
        if (Route::has('r4.samples.uploader')) {
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $response = $this->actingAs($user)->call('GET', route('r4.samples.uploader'), [], [], [], []);
          $response->assertStatus(200);
        } else {
            $this->assertTrue(true);
        }        
    }

    // アップロード・差分表示（ファイルは testdata/sample_unittest.xlsx を使用）
    public function test_sample_upload_diff()
    {
        if (Route::has('r4.samples.upload_diff')) {

          // 重複による削除を抑止。（ただし更新の試験ができないね）
          Sample::query()->forceDelete();

          // TODO: 
          $file = new UploadedFile(storage_path('testdata/サンプルテーブル_unittest.xlsx'), 'サンプルテーブル_unittest.xlsx', null, null, true);

          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $response = $this->actingAs($user)->call('POST', route('r4.samples.upload_diff'), ['excel' => $file], [], [], []);
          $response->assertStatus(200);
          $response->assertDontSeeText('アップロードエラー');
        } else {
            $this->assertTrue(true);
        }        
    }

    // アップロード後保存
    public function test_sample_upload_commit()
    {
        if (Route::has('r4.samples.upload_commit')) {
          $data_key = MirSerializedVar::orderBy('id', 'desc')->value('var_name');
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $response = $this->actingAs($user)->call('POST', route('r4.samples.upload_commit', ['data_key' => $data_key,]), [], [], [], []);
          $response->assertStatus(302);
        } else {
            $this->assertTrue(true);
        }        
      }

    // 最後に指定した条件で遷移
    public function test_sample_last_conds()
    {
        if (Route::has('r4.samples.last_conds')) {
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $response = $this->actingAs($user)->call('GET', route('r4.samples.last_conds'), [], [], [], []);
          $response->assertStatus(302);
        } else {
            $this->assertTrue(true);
        }        
    }

    // 左ナビ形式の一覧
    public function test_sample_lnav()
    {
        if (Route::has('r4.samples.lnav')) {
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $response = $this->actingAs($user)->call('GET', route('r4.samples.lnav'), [], [], [], []);
          $response->assertStatus(200);
        } else {
            $this->assertTrue(true);
        }        
    }

    // 一覧表示の自動更新版
    public function test_sample_index_live()
    {
        if (Route::has('r4.samples.index_live')) {
          /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
          $user = User::find(1);
          $response = $this->actingAs($user)->call('GET', route('r4.samples.index_live'), [], [], [], []);
          $response->assertStatus(200);
        } else {
            $this->assertTrue(true);
        }        
    }
}
