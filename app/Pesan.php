<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'comment';
    protected $primaryKey='idpertanyaan';

    protected $fillable = [
      'idlelang','namalelang','id', 'username', 'pertanyaan', 'jawaban',
    ];
    public $timestamps = true;
}
