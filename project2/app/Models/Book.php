<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    public $timestamps = false;
    public $primaryKey = 'idBook';
    public function lists()
    {
        return $this->hasManyThrough(
            'App\Subject',
            'App\Course',
            'App\Grade',
            'App\Bill',
            'idBook',
            'nameBook',
            'nameSubject',
            'nameCourse',
            'nameGrade',
            'amout',
            'time'
        );
    }
}
