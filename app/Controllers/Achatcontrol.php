<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AchatModel;
use App\Models\ClientModel;

class Achatcontrol extends BaseController
{
    public function teste()
    {
        try {
            $this->logmod = new AchatModel();
            $this->data['client'] = $this->logmod->where('etat','disponible')->findall();

            $this->logmdel = new ClientModel();
            $this->data['cli'] = $this->logmdel->findall();

            
            return view('Achat', $this->data);
        } catch (\Throwable $th) {
            echo "$th";
        }
       
    }
    
    
    public function modif($num)
    {
        $this->logmod = new AchatModel();
        $this->data=$this->logmod->where('num_log',$num)->first();
        echo json_encode($this->data);
    }
    
   
}

