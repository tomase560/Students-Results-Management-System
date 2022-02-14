<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(User::Student);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
