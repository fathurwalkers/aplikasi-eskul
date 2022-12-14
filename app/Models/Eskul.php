<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pembina;
use App\Models\Siswa;
use App\Models\Jadwal;
use App\Models\Nilai;
// use App\Models\Absen;

class Eskul extends Model
{
    use HasFactory;
    protected $table = "eskul";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function pembina()
    {
        return $this->hasMany(Pembina::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    // public function absen()
    // {
    //     return $this->hasMany(Absen::class);
    // }
}
