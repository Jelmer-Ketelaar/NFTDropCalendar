<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Drop extends Model
{
    protected $table = 'projects';

    public $timestamps = false;

    protected $guarded = [];
}
