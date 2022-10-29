<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Eskul;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = "eskul";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function eskul()
    {
        return $this->belongsTo(Eskul::class);
    }
}
