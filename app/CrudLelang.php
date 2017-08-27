<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrudLelang extends Model
{
    protected $table = 'auction';
    protected $primaryKey='idlelang';

    protected $fillable = [
      'namalelang', 'deskripsi', 'tanggaltutup', 'kodelelang', 'uploadfile', 'pemenang',
    ];
    public $timestamps = true;
}
