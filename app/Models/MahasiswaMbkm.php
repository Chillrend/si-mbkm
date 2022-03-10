<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaMbkm extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_mbkms';

    protected $fillable = [
        'user_id',
        'model_mbkm_id',
        'prodi_id',
        'nip_dospem',
        'nama_dospem',
        'lokasi_mbkm',
        'alamat_mbkm',
        'deskripsi_mbkm'
    ];

    public function getProdi(){
        return $this->hasOne(Prodi::class);
    }

    public function getModelMbkm(){
        return $this->hasOne(ModelMbkm::class);
    }

    public function getMhsw(){
        return $this->belongsTo(User::class);
    }
}
