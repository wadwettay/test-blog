<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserProfile
 *
 * @property int $id
 * @property int $user_id
 * @property string $nickname
 * @property string $name
 * @property string $surname
 * @property string|null $avatar
 * @property string $phone
 * @property string $sex
 * @property int $consent_to_receive_email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $phone_link
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereConsentToReceiveEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserProfile whereUserId($value)
 * @mixin \Eloquent
 */
class UserProfile extends Model
{
    const GENDERS = ['male', 'female'];
    const GENDERS_LABELS = ['male' => 'Мужской', 'female'=> 'Женский'];
    const DEFAULT_CONSENT_TO_RECEIVE_EMAIL = false;

    protected $fillable = [
        'user_id',
        'nickname',
        'name',
        'surname',
        'avatar',
        'phone',
        'sex',
        'consent_to_receive_email'
    ];

    protected $appends = ['phone_link'];

    public function getPhoneLinkAttribute()
    {
        return preg_replace('/[^+|\d]/', '', $this->phone);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
