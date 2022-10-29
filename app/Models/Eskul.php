<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pembina;

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
}
