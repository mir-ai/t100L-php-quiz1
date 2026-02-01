<?php

namespace App\Policies;

use App\Models\Sample;
use App\Models\User;
use Illuminate\Auth\Access\Response;

/**
 * サンプルテーブルの画面別アクセス権限規定
 */
class SamplePolicy
{
    /**
     * サンプルテーブルの権限設定。Adminユーザーの場合すべてアクセス可能
     */
    public function before(User $user)
    {
        return true;
    }

    /**
     * サンプルテーブルの参照権限
     */
    public function viewAny(User $user): bool
    {
        // TODO:
        return true;
    }

    /**
     * 削除済のサンプルテーブルの参照権限
     */
    public function viewTrashed(User $user): bool
    {
        // TODO:
        return true;
    }

    /**
     * サンプルテーブルの閲覧権限
     */
    public function view(User $user, Sample $sample): bool
    {
        // TODO:
        return true;
    }

    /**
     * サンプルテーブルの作成権限
     */
    public function create(User $user): bool
    {
        // TODO:
        return true;
    }

    /**
     * サンプルテーブルの更新権限
     */
    public function update(User $user, Sample $sample): bool
    {
        // TODO:
        // return $sample->user()->is($user);
        return true;
    }

    /**
     * サンプルテーブルの更新権限(全項目)
     */
    public function update_raw(User $user, Sample $sample): bool
    {
        // TODO:
        // return $sample->user()->is($user);
        return true;
    }

    /**
     * サンプルテーブルの削除権限
     */
    public function delete(User $user, Sample $sample): bool
    {
        // TODO:
        // return $sample->user()->is($user);
        return true;
    }

    /**
     * 削除済のサンプルテーブルの復旧権限
     */
    public function restore(User $user, Sample $sample): bool
    {
        // TODO:
        // return $sample->user()->is($user);
        return true;
    }

    /**
     * 削除済のサンプルテーブルの完全削除権限
     */
    public function force(User $user, Sample $sample): bool
    {
        // TODO:
        // return $sample->user()->is($user);
        return true;
    }

    /**
     * サンプルテーブルのアップロード権限
     */
    public function upload(User $user): bool
    {
        // TODO:
        return true;
    }

    /**
     * サンプルテーブルの並べ替え権限
     */
    public function seq(User $user): bool
    {
        // TODO:
        return true;
    }
}
