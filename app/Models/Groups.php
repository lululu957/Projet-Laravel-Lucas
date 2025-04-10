<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $table = 'groups';
    protected $fillable = ['id', 'name', 'cohort_id', 'created_date', 'updated_date'];
}
