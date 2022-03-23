<?php

namespace App\Models;

use App\Models\User;
use App\Models\Year;
use App\Models\Field;
use App\Models\Month;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'field_id', 'user_id', 'month_id', 'year_id', 'is_debited'];

    /**
     * field
     * Un budget possède plusieurs fields
     *
     * @return HasMany
     */
    public function field(): HasMany
    {
        return $this->hasMany(Field::class);
    }

    /**
     * user
     * Un budget appartient a un utilisateur
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Month
     * Un budget appartient à un mois
     *
     * @return BelongsTo
     */
    public function month(): BelongsTo
    {
        return $this->belongsTo(Month::class);
    }


    /**
     * Year
     * Un budget appartient à une année
     *
     * @return BelongsTo
     */
    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }
}
