<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'customer_id',
        'customer_name',
        'status',
        'delivery',
        'delivery_address',
        'delivery_date',
        'delivery_cost',
        'total'
    ];


    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function customer() : BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

}
