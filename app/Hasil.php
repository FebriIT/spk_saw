<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $guarded =[];
    protected $table = 'hasil';
    protected $fillable = ['kode', 'nama', 'total'];
}
