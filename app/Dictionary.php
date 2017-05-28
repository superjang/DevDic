<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $table = 'dictionaries';

    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key', 'id');
    }
}
