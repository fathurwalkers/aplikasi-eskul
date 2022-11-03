<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Eskul;
use App\Models\Siswa;
use App\Models\Jadwal;

class Absen extends Model
{
    use HasFactory;
    protected $table = "absen";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    // public function eskul()
    // {
    //     return $this->belongsTo(Eskul::class);
    // }
}
