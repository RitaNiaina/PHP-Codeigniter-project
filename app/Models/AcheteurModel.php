<?php

namespace App\Models;

use CodeIgniter\Model;

class AcheteurModel extends Model
{
   
    protected $table      = 'acheter';
    protected $primaryKey  = 'achat';
    protected $allowedFields  = ['num_log','num_cli','Date','prix','paiement'];

}
?>