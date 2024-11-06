<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pasien extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_pelanggan'; // Menentukan primary key
    public $incrementing = true; // Jika kode_pelanggan auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'kode_pelanggan',
        'nama',
        'tanggal_lahir',
        'Alamat',
        'Jenis_kelamin',
    ];

    public function obat(): BelongsTo
    {
        return $this->belongsTo(Obat::class);
    }
}
