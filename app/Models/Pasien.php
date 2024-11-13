<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_pelanggan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'pasien';
    protected $fillable = [
        'kode_pelanggan',
        'nama',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->kode_pelanggan)) {
                $model->kode_pelanggan = self::generateKodePelanggan();
            }
        });
    }

    protected static function generateKodePelanggan($prefix = 'C')
    {
        $datePart = date('dHi') . date('s'); // Format: DDHIMenitDetik
        return $prefix . $datePart; // Gabungkan awalan dengan bagian tanggal
    }
    public function kunjungan(): HasMany
    {
        return $this->hasMany(Kunjungan::class, 'pasien_id');
    }
}
