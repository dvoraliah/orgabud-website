<?php

namespace App\Models;

use App\Models\User;
use App\Models\Year;
use App\Models\Field;
use App\Models\Month;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'field_id', 'user_id', 'month', 'year', 'is_debited'];

    /**
     * field
     * Un budget a un seul field
     *
     * @return HasOne
     */
    public function field(): belongsTo
    {
        return $this->belongsTo(Field::class);
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
    // public function month(): BelongsTo
    // {
    //     return $this->belongsTo(Month::class);
    // }


    // /**
    //  * Year
    //  * Un budget appartient à une année
    //  *
    //  * @return BelongsTo
    //  */
    // public function year(): BelongsTo
    // {
    //     return $this->belongsTo(Year::class);
    // }
}

