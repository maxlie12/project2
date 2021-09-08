<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailBill extends Model
{
    use HasFactory;
    protected $table = 'detailbill';
    public $timestamps = false;
    public $primaryKey = 'idDetailBill';
}
