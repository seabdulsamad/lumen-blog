<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'description', 'user_id'];

    protected $dates = [];

    public static $rules = [
        // Validation rules
        'title' => 'required',
        'description' => 'required',
        "user_id" => 'required|exists:users,id'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
