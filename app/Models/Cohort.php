<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Cohort extends Model
{
    protected $table = 'cohorts';
    protected $fillable = ['school_id', 'name', 'description', 'start_date', 'end_date'];

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function getYearsAttribute()
    {
        $startYear = \Carbon\Carbon::parse($this->start_date)->format('Y');
        $endYear = \Carbon\Carbon::parse($this->end_date)->format('Y');
        return "$startYear-$endYear";
    }
}


