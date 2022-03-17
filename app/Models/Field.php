<?php

namespace App\Models;

use App\Models\Budget;
use App\Models\FieldCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Field extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'field_category_id', 'slug', 'id_category', 'is_private'];

    /**
     * Budget
     * Un field appartient à plusieurs budget
     *
     * @return void
     */
    public function budget()
    {
        return $this->belongsToMany(Budget::class);
    }

    /**
     * category
     * Un field appartient à une seule FieldCategory
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(FieldCategory::class);
    }
}
