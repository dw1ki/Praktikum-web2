<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit_kerja extends Model
{
    use HasFactory;

    protected $table = 'unit_kerja';
    protected $fillable = [
        'id',
        'nama'
    ];

    public $timestamps = false;

    public function unit_kerja(){
        return $this->belongsTo(Unit_kerja::class);
    }
}
