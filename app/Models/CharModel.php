<?php

namespace App\Models;

use CodeIgniter\Model;

class LogementModel extends Model
{
   
    protected $table      = 'loge';
    protected $primaryKey  = 'num_log';
    protected $allowedFields  = ['province','agence','adres_agn','citer','terrain','superficie'];

}
?>