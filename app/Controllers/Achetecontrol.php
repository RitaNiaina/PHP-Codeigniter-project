<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AcheteurModel;
use App\Models\AchatModel;
use App\Models\ClientModel;

class Achetecontrol extends BaseController
{
    public function teste()
    {
        $this->logmodel = new AcheteurModel();
        $this->data['client'] = $this->logmodel->findall();
        return view('Vente', $this->data);
    }
    public function diry()
    {
        try {
            $this->logmdel = new ClientModel();
            $this->data['cli'] = $this->logmdel->findall();
            return view('Achat', $this->data);
        } catch (\Throwable $th) {
            echo "$th";
        }
        
    }
    public function save()
    {
        
        //AJOUT
        $this->logmodel = new AcheteurModel();
        $this->values = [
            'num_log'=>$this->request->getPost('updatnum'),
            'num_cli'=> $this->request->getPost('cLI'),
            'Date'=>$this->request->getPost('dat'),
            'prix'=>$this->request->getPost('pri'),
            'paiement'=>$this->request->getPost('pay')
        ];
       $this->logmodel->save($this->values);
      

       $this->logmod = new AchatModel();
       $this->ID = $this->request->getPost('updatnum');
      $this->data=['etat'=>'vendu'];
      $this->logmod->update($this->ID,$this->data);
      return redirect()->to(base_url("/vente"));
    }
    public function delets()
    {
        $this->logmodel = new AcheteurModel();
        $this->logmodel->delete($this->request->getPost('delet'));
    }
    
}

