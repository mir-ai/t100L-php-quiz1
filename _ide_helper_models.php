<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * アップロードファイルモデルのオブジェクト定義
 *
 * @property int $id
 * @property int $var_yymm
 * @property string $var_name
 * @property string $serialized_var
 * @property int $user_id
 * @property string|null $original_file_name
 * @property int|null $file_size
 * @property \Illuminate\Support\Carbon $expired_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read mixed $item_title
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar whereOriginalFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar whereSerializedVar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar whereVarName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MirSerializedVar whereVarYymm($value)
 */
	class MirSerializedVar extends \Eloquent {}
}

namespace App\Models{
/**
 * サンプルテーブルモデルのオブジェクト定義
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $memo
 * @property int $seq
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string|null $deleted_at
 * @property-read mixed $item_title
 * @method static \Database\Factories\SampleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sample newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sample newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sample query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sample whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sample whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sample whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sample whereMemo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sample whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sample wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sample whereSeq($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sample whereUpdatedAt($value)
 */
	class Sample extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $is_admin
 * @property-read mixed $item_title
 * @property-read mixed $role_label
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

