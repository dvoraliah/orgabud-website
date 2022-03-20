<?php

namespace App\Models;

use App\Models\Budget;
use App\Models\Status;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'status_id',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * budget
     * Un user a plusieurs entrée dans budget
     *
     * @return void
     */
    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    /**
     * status
     * Un user appartient à un statut
     *
     * @return void
     */
    public function status(){
        return $this->belongsTo(Status::class);
    }
    
}
