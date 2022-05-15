<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_kk';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'no_kk', 'alamat', 'rt', 'rw', 'is_pendatang', 'is_miskin', 'is_pindah'
    ];

    public function anggota_keluarga()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'no_kk', 'no_kk')->orderBy('urutan', 'ASC');
    }

    public function anggota_keluargas()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'no_kk', 'no_kk')->where('urutan', '!=', 1)->orderBy('urutan', 'ASC');
    }

    public function kepala_keluarga()
    {
        return $this->hasOne(AnggotaKeluarga::class, 'no_kk', 'no_kk')->where('urutan', 1);
    }
}
