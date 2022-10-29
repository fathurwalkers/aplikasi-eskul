<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembina extends Model
{
    use HasFactory;
    protected $table = "pembina";
    protected $guarded = [];
    protected $primaryKey = "id";
}
