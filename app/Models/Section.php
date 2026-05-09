<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['page_id', 'slug', 'type', 'order'];

    public function blocks()
    {
        return $this->hasMany(Block::class)->orderBy('order');
    }
}