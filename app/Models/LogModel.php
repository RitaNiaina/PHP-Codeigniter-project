<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
   
    protected $table      = 'login';
    protected $primaryKey  = 'Id';
    protected $allowedFields  = ['username','password'];

}
?>