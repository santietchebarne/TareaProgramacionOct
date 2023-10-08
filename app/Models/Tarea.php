<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes, HasFactory, HasTimestamps};

class Tarea extends Model
{
    protected $table = "Tarea";

    use SoftDeletes, HasFactory, HasTimestamps;
}

