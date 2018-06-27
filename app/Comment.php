<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function commentable()
    {
      return $this->morphTo();
    }

    public function replies()
    {
      return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

    public function parent()
    {
      return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
