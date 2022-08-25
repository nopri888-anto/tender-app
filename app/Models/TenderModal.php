<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderModal extends Model
{
    use HasFactory;

    protected $table = 'tender_modals';

    protected $fillable = [
        'kodeTender',
        'namaTender',
        'tanggalTender',
        'tanggalMulaiTender',
        'tanggalSelesaiTender',
        'satuanKerja',
        'lokasiLelang',
        'kab',
        'provinsi',
        'nilaiPagu',
        'nilaiHps',
        'statusTender',
        'jenisKontrak',
    ];

    public function companys()
    {
        return $this->belongsTo('App\Models\DataCompany', 'id_vendor');
    }
}
