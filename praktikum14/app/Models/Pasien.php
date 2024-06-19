<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $fillable = [
        'id',
        'kode',
        'nama',
        'tmpt_lahir',
        'tgl_lahir',
        'gender',
        'email',
        'alamat',
        'kelurahan',

    ];
    public $timestamps = false;

    public function kelurahan (){
        return $this->belongsTo(kelurahan::class);
    }
}
