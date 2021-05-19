<?php

namespace App\Models;

use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model implements Commentable
{
    use HasComments;
    protected $table = 'coins';

	protected $hidden = [
    ];

	protected $guarded = [];
}
