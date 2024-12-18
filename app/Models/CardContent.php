<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardContent extends Model
{
    protected $table = 'card_content';

    protected $fillable = ['name', 'content'];
}
