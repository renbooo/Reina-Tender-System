<?php

class Admin extends Eloquent{

  protected $table = 'admin';

  protected $fillable = array('nama_admin, alamat_admin, tanggal_lahir, kota_lahir, jenis_kelamin');

  public function login(){
    return $this->belongsTo('login', 'id_login');
  }
}
