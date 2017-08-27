<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminCrud extends Model
{
    protected $table = 'admin';
    protected $primaryKey='idadmin';
    protected $fillable = [
      'id', 'namaadmin', 'alamatadmin', 'tanggallahir', 'kotalahir', 'jeniskelamin',
    ];
    public $timestamps = true;
}
