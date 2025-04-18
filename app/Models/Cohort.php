<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Cohort extends Model
{
    protected $table = 'cohorts';
    protected $fillable = ['school_id', 'name', 'description', 'start_date', 'end_date'];

    public function student()
    {
        return $this->hasMany(UserSchool::class)->with('user');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}


