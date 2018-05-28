<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table        = 'alternatif';
    protected $fillable     = ['kode_alternatif','nama_alternatif','keterangan'];
    protected $hidden       = ['created_at','updated_at'];
    public function nilai() {
        return $this->hasMany(\App\NilaiAlternatif::class);
    }
}
