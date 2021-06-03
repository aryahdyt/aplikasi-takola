<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = "surats";

    protected $fillable = [
        'nama_template_surat',
        'content_surat',
        'nama_perusahaan',
        'alamat_perusahaan',
        'tanggal_pelaksanaan',
        'petugas_id',
    ];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }

    public function get_tanggal_pelaksanaan()
    {
        return Carbon::parse($this->attributes['tanggal_pelaksanaan'])->translatedFormat('l, d F Y');
    }

    public function tanggal_dibuat()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
}
