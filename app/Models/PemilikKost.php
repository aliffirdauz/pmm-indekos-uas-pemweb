<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilikKost extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kosts()
    {
        return $this->hasMany(Kost::class);
    }

}
