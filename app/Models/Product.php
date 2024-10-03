<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'price'
    ];


    public function orderItems() : HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
