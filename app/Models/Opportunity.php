<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $table = "opportunitys";
    protected $fillable = ['title', 'slug', 'type', 'content'];
}
