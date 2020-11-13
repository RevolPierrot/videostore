<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['author_id', 'title', 'price'];

    public function authors() {
        return $this->belongsTo(Authors::class, 'id', 'author_id');
    }
}
