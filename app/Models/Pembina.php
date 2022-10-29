<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Eskul;
use App\Models\Login;

class Pembina extends Model
{
    use HasFactory;
    protected $table = "pembina";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function eskul()
    {
        return $this->belongsTo(Eskul::class);
    }

    public function login()
    {
        return $this->belongsTo(Login::class);
    }
}
