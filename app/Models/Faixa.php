<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faixa extends Model
{
    use HasFactory;


    protected $table = 'faixa';
    protected $fillable = ['disco_id', 'name', 'duration'];

    public function disco(){
        return $this->belongsTo(Disco::class);
    }
}
