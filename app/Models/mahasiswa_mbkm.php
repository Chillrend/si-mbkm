<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa_mbkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'model_mbkm_id',
        'prodi_id',
        'nip_dospem',
        'nama_dospem',
        'lokasi_mbkm',
        'alamat_mbkm'
    ];

    public function getJurusan(){
        return $this->hasOne(prodi::class);
    }

    public function getModelMbkm(){
        return $this->hasOne(modelmbkm::class);
    }

    public function getMhsw(){
        return $this->belongsTo(User::class);
    }
}
