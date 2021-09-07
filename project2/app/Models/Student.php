<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    public $timestamps = false;
    public $primaryKey = 'idStudent';
    public function getGenderNameAttribute()
    {
        if ($this->gender == 1) {
            return "Nam";
        } else {
            return "Nữ";
        }
    }
    public function getAvailableTextAttribute()
    {
        if ($this->available == 1) {
            return "Đã đăng kí";
        } else {
            return "Chưa đăng kí";
        }
    }
    public function bill()
    {
        return $this->hasMany(Bill::class);
    }
}
