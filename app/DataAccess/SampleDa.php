<?php namespace App\DataAccess;

use App\Models\Sample;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\ResourceNotFoundException;

// サンプルテーブルのデータアクセス処理
class SampleDa
{
    /**
     * id と name の連想配列を返す
     * 同じリクエスト中は、１度しか実行せず、結果はキャッシュされる
     *
     * @return array
     */
    public static function getNamesByIds(): array
    {
        // 同じリクエスト中は、１度しか実行せず、結果をキャッシュしておく。
        return once(function () {
            $names_by_id = Sample::query()
            ->select('name', 'id')
            ->pluck('name', 'id')
            ->toArray();
    
            return $names_by_id;
        });
    }

    /**
     * id から name を取得する
     *
     * @param integer $id
     * @return string|null
     */
    public static function getNameById(int $id): string|null
    {
        $names_by_id = Self::getNamesByIds();

        return $names_by_id[$id] ?? '';
    }

    /**
     * レコードを作成し、作成されたモデルを返す
     *
     * @param array $attributes
     * @return Sample|null
     */
    public static function create(array $attributes): Sample|null
    {
        $sample = Sample::create($attributes);
        return $sample;
    }

    /**
     * IDで指定されたレコードを１件更新する。
     *
     * @param integer $id
     * @param array $attributes
     * @return integer
     */
    public static function update(int $id, array $attributes): int
    {
        $rows_affected = Sample::where('id', $id)->update($attributes);

        return $rows_affected;
    }

    /**
     * エクセルアップロード時の処理のため、指定されたIDのレコードを返す
     * 最大1000件まで。
     *
     * @param array $ids
     * @param string $key
     * @return Collection|null
     */
    public static function getMatrixByIds(array $ids, string $key = 'id'): Collection|null
    {
        $db_matrix_raw = Sample::query()
        ->whereIn($key, $ids)
        ->orderBy($key)
        ->get();

        return $db_matrix_raw;
    }

    /**
     * 指定された id のサンプルテーブルを返す。見つからないリソースが見つからないエラー
     *
     * @param int $id
     * @return Sample
     */
    public static function findOrFail(int $id): Sample
    {
        $sample = Sample::find($id);

        if (! $sample) {
            throw new ResourceNotFoundException("Samples id={$id} not found.");
        }

        return $sample;
    }    
}
