<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Login;
use App\Models\Eskul;
use App\Models\Absen;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswa";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function login()
    {
        return $this->belongsTo(Login::class);
    }

    public function eskul()
    {
        return $this->belongsTo(Eskul::class);
    }

    public function absen()
    {
        return $this->hasMany(Absen::class);
    }
}
