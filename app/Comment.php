<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['post_id', 'user_id', 'text'];

    protected $dates = [];

    public static $rules = [
        // Validation rules
        'post_id' => 'required|exists:posts,id',
        'user_id' => 'required|exists:users,id',
        'text' => 'required'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
