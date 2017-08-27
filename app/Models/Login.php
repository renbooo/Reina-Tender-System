<?php

class Login extends Eloquent{

  protected $table = 'login';

  protected $fillable = array('email, password, kategori, status');

  public function admin(){
    return $this->hasOne('admin', 'id_admin');
  }
}
