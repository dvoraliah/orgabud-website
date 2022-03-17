<?php

namespace App\Models;

use App\Models\Field;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FieldCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    /**
     * field
     * Une FieldCategory a plusieurs fields
     *
     * @return void
     */
    public function field(){
        return $this->hasMany(Field::class);
    }
}
