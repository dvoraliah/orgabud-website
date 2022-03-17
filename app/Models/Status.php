<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    /**
     * user
     * Un statut peut avoir plusieurs utilisateurs
     *
     * @return void
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }
}

