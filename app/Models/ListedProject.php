<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class ListedProject extends Model
{
    protected $table = 'projectsExist';

    public $timestamps = false;

    protected $guarded = [];
}
