<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Transaction;
use App\Models\CardReview;
use App\Models\Order;
use App\Models\ShoppingCart;

class User extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'email', 'password', 'role', 'balance', 'country', 'image'];
    
    protected $hidden = ['password'];
    
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(CardReview::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public function cart()
    {
        return $this->hasMany(ShoppingCart::class);
    }
}
