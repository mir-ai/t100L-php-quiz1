<?php

namespace App\Observers;

use App\Models\Sample;
use App\DataAccess\ChangeLogDa;

/**
  * サンプルテーブルモデルのイベント監視クラス
  *
  */
class SampleObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;

    private $table_name = 'samples';

    /**
     * サンプルテーブル の登録イベント
     */
    public function created(Sample $sample): void
    {
        // logger("Created Sample [{$sample->id}]", $sample->toArray());

        ChangeLogDa::record(
            op_mode: 'CREATED',
            table_name: $this->table_name,
            primary_id: $sample->id,
            attributes: $sample->toArray(),
        );

    }

    /**
     * サンプルテーブル の更新イベント
     */
    public function updating(Sample $sample): void
    {
        // logger("Updating Sample [{$sample->id}]", $this->getDiffs($sample));

        ChangeLogDa::record(
            op_mode: 'UPDATED',
            table_name: $this->table_name,
            primary_id: $sample->id,
            attributes: $this->getDiffs($sample),
        );        
    }

    /**
     * サンプルテーブル の削除イベント
     */
    public function deleted(Sample $sample): void
    {
        // logger("Deleted Sample [{$sample->id}]", $sample->toArray());

        ChangeLogDa::record(
            op_mode: 'DELETED',
            table_name: $this->table_name,
            primary_id: $sample->id,
            attributes: $sample->toArray(),
        );

    }

    /**
     * サンプルテーブル の削除取消イベント
     */
    public function restored(Sample $sample): void
    {
        // logger("Restored Sample [{$sample->id}]");

        ChangeLogDa::record(
            op_mode: 'RESTORED',
            table_name: $this->table_name,
            primary_id: $sample->id,
            attributes: $sample->toArray(),
        );        
    }

    /**
     * サンプルテーブル の強制削除イベント
     */
    public function forceDeleted(Sample $sample): void
    {
        // logger("ForceDeleted Sample [{$sample->id}]", $sample->toArray());

        ChangeLogDa::record(
            op_mode: 'FORCE_DELETED',
            table_name: $this->table_name,
            primary_id: $sample->id,
            attributes: $sample->toArray(),
        );        
    }

    /**
     * サンプルテーブル  の変更差分を取得
     *
     * @param Sample $sample
     * @return array
     *
     *
     * $diffs = [
     *   'age' => [
     *      'old' => 16,
     *      'new' => 17,
     *   ],
     *   'height' => [
     *      'old' => 157,
     *      'new' => 160,
     *   ],     
     * ]
     * 
     */
    private function getDiffs(Sample $sample): array
    {
        $diffs = [];

        if ($sample->isDirty()) {
            $changed_attributes = $sample->getDirty();
            $original_values = $sample->getOriginal();

            foreach ($changed_attributes as $attribute => $new_value) {
                $old_value = $original_values[$attribute] ?? null;
            }

            $diffs[$attribute]['old'] = $old_value;
            $diffs[$attribute]['new'] = $new_value;
        }

        return $diffs;
    }    
}
