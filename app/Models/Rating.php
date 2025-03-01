<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['rating', 'description', 'user_id', 'chef_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function chef()
    {
        return $this->belongsTo(User::class, 'chef_id');
    }
}