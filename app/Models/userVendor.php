<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userVendor extends Model
{
    use HasFactory;

    protected $table = 'user_vendors';

    protected $fillable = [
        'username',
        'password',
        'status',
        'id_company',
        'remark',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\DataCompany', 'id_company');
    }

   
}
