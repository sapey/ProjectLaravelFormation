<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $table = "formations";
    protected $fillable = ['title', 'description', 'type', 'price', 'picture','user_id', 'cours'];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'formations_categories', 'formation', 'category');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
