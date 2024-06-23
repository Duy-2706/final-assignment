<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Validator;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function order() {
         return $this->hasMany(Order::class);
    }
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::saved(function ($user) {
    //         if ($user->isDirty('profile_photo_path')) {
    //             if(strpos($user->profile_photo_path, "profile-photos")==0){
    //                 $path = str_replace('profile-photos', 'WebProject\final-assignment\public\storage\profile-photos', $user->profile_photo_path);
    //                 $user->update(['profile_photo_path' => $path]);
    //                 $user->profile_photo_path = $path;
    //             }
    //             $user->save();
    //         }
    //     });
    // }

    public function blog()
    {
         return  $this->hasMany(Blog::class);
    }

     public function salary()
    {
         return  $this->hasMany(Salary::class);
    }
}
