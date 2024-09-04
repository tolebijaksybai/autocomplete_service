<?php

namespace App\Models;

use App\Enum\UserEnum;
use App\Enum\UserRoleEnum;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property int                                       $id
 * @property string                                    $first_name
 * @property string|null                               $middle_name
 * @property string|null                               $last_name
 * @property string|null                               $personal_number
 * @property string|null                               $work_number
 * @property string|null                               $internal_number
 * @property string|null                               $job_title
 * @property string|null                               $department
 * @property int|null                                  $manager_id
 * @property string|null                               $birthday
 * @property int                                       $birthday_amount
 * @property int                                       $show_birthday
 * @property string|null                               $email
 * @property Carbon|null                               $email_verified_at
 * @property string|null                               $photo
 * @property int                                       $balance
 * @property string|null                               $iin
 * @property mixed                                     $password
 * @property string|null                               $remember_token
 * @property string|null                               $cabinet_address
 * @property string|null                               $city
 * @property string|null                               $street
 * @property string|null                               $floor
 * @property string|null                               $cabinet_number
 * @property string|null                               $about_me
 * @property string|null                               $hobbies_interests
 * @property string|null                               $mail_config
 * @property string|null                               $last_activity_at
 * @property string|null                               $when_created_at
 * @property Carbon|null                               $created_at
 * @property Carbon|null                               $updated_at
 * @property Carbon|null                               $deleted_at
 *
 * @property-read string                               $birthday_format
 * @property-read string                               $created_at_format
 * @property-read string                               $full_name
 * @property-read string                               $last_activity_at_format
 * @property-read string                               $name
 * @property-read string                               $photo_url
 * @property-read string                               $role_name
 * @property-read string                               $structure_name
 * @property-read string                               $when_created_at_format
 * @property-read User|null                            $manager
 * @property-read Collection<int, Permission>          $permissions
 * @property-read int|null                             $permissions_count
 * @property-read Collection<int, Role>                $roles
 * @property-read int|null                             $roles_count
 * @property-read Collection<int, PersonalAccessToken> $tokens
 * @property-read int|null                             $tokens_count
 * @property-read Collection<int, UserNotification>    $userNotifications
 * @property-read int|null                             $user_notifications_count
 *
 * @method void decrement(string $column, int $amount = 1, array $extra = [])
 * @method void increment(string $column, int $amount = 1, array $extra = [])
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasRoles;
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $appends = ['full_name', 'photo_url'];

    protected $hidden = [
        'iin',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'mail_config',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    public function getPhotoUrlAttribute(): string
    {
        $file = UserEnum::PHOTO_PATH . '/' . $this->photo;

        return $this->photo && Storage::disk('custom')->exists($file)
            ? Storage::disk('custom')->url($file)
            : asset(UserEnum::DEFAULT_PHOTO_PATH);
    }

    public function getFullNameAttribute(): string
    {
        return trim(implode(' ', array_filter([$this->first_name, $this->last_name])));
    }

    public function getNameAttribute(): string
    {
        return trim(implode(' ', array_filter([$this->first_name, $this->last_name])));
    }

    public function getBirthdayFormatAttribute(): string
    {
        return $this->birthday
            ? Carbon::createFromFormat('Y-m-d', $this->birthday)->translatedFormat('j F')
            : 'Не неизвестен';
    }

    public function getWhenCreatedAtFormatAttribute(): string
    {
        return $this->when_created_at
            ? date('d.m.Y', strtotime($this->when_created_at))
            : 'Не неизвестен';
    }

    public function getStructureNameAttribute(): string
    {
        return trim(implode(' / ', array_filter([$this->job_title, $this->department])));
    }

    public function getRoleNameAttribute(): string
    {
        return UserRoleEnum::getRoles()[$this->roles[0]->name];
    }

    public function getCreatedAtFormatAttribute(): string
    {
        return $this->created_at
            ? date('d.m.Y / H:i', strtotime($this->created_at))
            : 'Время не неизвестен';
    }

    public function getLastActivityAtFormatAttribute(): string
    {
        return $this->last_activity_at
            ? date('d.m.Y / H:i', strtotime($this->last_activity_at))
            : '-';
    }

    public function userNotifications(): HasMany
    {
        return $this->hasMany(UserNotification::class, 'user_id', 'id');
    }

    public function manager(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'manager_id');
    }

    public function scopeSearch($query, $search)
    {
        $keywords = explode(' ', $search);

        return $query->where(function ($subQuery) use ($keywords) {
            foreach ($keywords as $keyword) {
                $subQuery->where('first_name', 'like', "%$keyword%")
                    ->orWhere('last_name', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%")
                    ->orWhere('work_number', 'like', "%$keyword%")
                    ->orWhere('job_title', 'like', "%$keyword%")
                    ->orWhere('department', 'like', "%$keyword%")
                    ->orWhere('iin', 'like', "%$keyword%");
            }
        });
    }

    public function subordinates()
    {
        return $this->hasMany(self::class, 'manager_id');
    }

    public function documents()
    {
        return $this->hasMany(DepartmentDocument::class, 'author_id', 'id');
    }
}
