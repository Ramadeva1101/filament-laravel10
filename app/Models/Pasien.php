<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pasien extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_pelanggan'; // Menentukan primary key
    public $incrementing = false; // Ubah menjadi false
    protected $keyType = 'string'; // Ubah tipe data primary key menjadi string

    protected $fillable = [
        'kode_pelanggan',
        'nama',
        'tanggal_lahir',
        'alamat', // Perbaiki penamaan field
        'jenis_kelamin', // Perbaiki penamaan field
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->kode_pelanggan = self::generateKodePelanggan();
        });
    }

    protected static function generateKodePelanggan($prefix = 'C')
{
    $datePart = date('dHi') . date('s'); // Format: DDHIMenitDetik
    return $prefix . $datePart; // Gabungkan awalan dengan bagian tanggal
}


    public function obat(): BelongsTo
    {
        return $this->belongsTo(Obat::class);
    }
}
