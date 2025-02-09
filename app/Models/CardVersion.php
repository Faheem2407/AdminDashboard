<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CardVersion extends Model
{
    use HasFactory;
    
    protected $fillable = ['card_id', 'version_id'];
}
