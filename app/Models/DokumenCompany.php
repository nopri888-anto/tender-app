<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenCompany extends Model
{
    use HasFactory;

    protected $table = 'dokumen_companies';

    protected $fillable = [
        'npwp',
        'id_biodata',
    ];

    public function data()
    {
        return $this->belongsTo('App\Models\DataCompany', 'id_biodata');
    }
}
