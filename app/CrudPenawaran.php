<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrudPenawaran extends Model
{
    protected $table = 'negotiation';
    protected $primaryKey='idpenawaran';

    protected $fillable = [
      'idlelang', 'namalelang', 'id', 'username', 'nilaitawar', 'uploadtawar', 'pemenang'
    ];
    public $timestamps = true;
}
