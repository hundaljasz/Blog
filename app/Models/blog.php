<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    public function Getuser()
    {
        return $this->hasOne(User::class,'id','author_id');
    }
    /**
     * Get all of the comments for the blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Getcomments()
    {
        return $this->hasMany(comment::class, 'blog_id', 'id');
    }
    
}
