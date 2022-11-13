<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

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
}
