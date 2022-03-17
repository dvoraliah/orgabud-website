<?php

namespace App\Models;

use App\Models\Budget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Month extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /**
     * Budget
     * Un mois à plusieurs entrées budget associées
     * @return void
     */
    public function budget()
    {
        return $this->hasMany(Budget::class);
    }
}
