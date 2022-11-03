<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Eskul;
use App\Models\Absen;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = "jadwal";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function eskul()
    {
        return $this->belongsTo(Eskul::class);
    }

    public function absen()
    {
        return $this->hasMany(Absen::class);
    }
}
