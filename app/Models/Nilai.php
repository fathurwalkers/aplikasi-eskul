<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Eskul;

class Nilai extends Model
{
    use HasFactory;
    protected $table = "nilai";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function eskul()
    {
        return $this->belongsTo(Eskul::class);
    }
}
