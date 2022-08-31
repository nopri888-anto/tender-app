<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCompany extends Model
{
    use HasFactory;

    protected $table = 'data_companies';

    protected $fillable = [
        'kodeVendor',
        'nameVendor',
        'alamat',
        'kab',
        'provinsi',
        'kodepos',
        'notelp',
        'email',
        'noNpwp',
        'noKtp',
        'status',
    ];

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User', 'id_user');
    // }


    public function dokumen()
    {
        return $this->hasOne('App\Models\DokumenCompany', 'id_biodata');
    }

    public function tender()
    {
        return $this->hasOne('App\Models\TenderModal', 'id_vendor');
    }

    public function userVendor()
    {
        return $this->hasOne('App\Models\userVendor', 'id_company');
    }
}
