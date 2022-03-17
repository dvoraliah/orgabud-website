<?php

namespace App\Models;

use App\Models\Budget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
{
    use HasFactory;
    protected $fillable = ['year'];

    /**
     * Budget
     * Une annee à plusieurs entrées budget associées
     * @return void
     */
    public function budget()
    {
        return $this->hasMany(Budget::class);
    }
}
