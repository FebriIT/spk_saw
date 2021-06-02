<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenerimaBeasiswa extends Model
{
    protected $table        = 'penerima_beasiswa';
    protected $fillable     = ['kode','nama','total'];
}
