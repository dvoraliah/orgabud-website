<?php

namespace App\Models;

use App\Models\User;
use App\Models\Field;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Budget extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
    
}

