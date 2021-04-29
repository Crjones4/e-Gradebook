<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'teacher_id',
        'comment',
        'grade'
    ];

    function teacher(){

        return $this->belongsTo(User::class,'teacher_id');

    }

}
