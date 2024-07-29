<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'no_telp',
        'password',
        'type',
        'rt',
        'rw',
        'dusun'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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


     /**
     * Determine if the user can access the given Filament panel.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        switch ($panel->getId()) {
            case 'admin':
                return $this->usertype === 'admin';
            case 'inputer':
                return $this->usertype === 'inputer';
            case 'user':
                return $this->usertype === 'user';
            default:
                return false;
        }
    }

    /**
     * Get the name of the user for display in Filament.
     */
    public function getFilamentName(): string
    {
        return $this->name;
    }
}
