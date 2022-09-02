<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepBinnding extends Model
{
    use HasFactory;

    protected $table = 'stepBinding';

    protected $fillable =
    [
        'nameStep',
        'startDate',
        'finishDate',
        'id_binding',
    ];

    public function binding()
    {
        return $this->belongsTo('App\Models\TenderModal', 'id_binding');
    }
}
