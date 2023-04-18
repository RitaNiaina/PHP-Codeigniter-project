<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
   
    protected $table      = 'client';
    protected $primaryKey  = 'num_cli';
    protected $allowedFields  = ['nom_cli','prenom_cli','adres_cli','tel_cli','lieu_trav'];

}
?>