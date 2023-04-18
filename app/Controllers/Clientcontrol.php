<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;

class Clientcontrol extends BaseController
{
    public function vody()
    {
        return view('interface');
    }
    public function test()
    {
        $this->clientmod = new ClientModel();
        $this->data['client'] = $this->clientmod->findall();
        return view('clients', $this->data);
    }
   
    public function op()
    {
       
        $this->clientmod = new ClientModel();
        $this->data['client'] = $this->clientmod->where('num_cli', $this->request->getPost('op'))->findall();
        return view('interface', $this->data);
    }
    public function save()
    {
        
        //AJOUT
        $this->clientmod = new ClientModel();
        $this->values = [
            'nom_cli'=>$this->request->getPost('nom'),
            'prenom_cli'=> $this->request->getPost('prenom') ,
            'adres_cli'=>$this->request->getPost('adresse'),
            'tel_cli'=>$this->request->getPost('tel'),
            'lieu_trav'=>$this->request->getPost('lieu')
        ];
       $this->clientmod->insert($this->values);
       return redirect()->to(base_url("/emit"));
    
    }
    public function delete()
    {
        $this->clientmod = new ClientModel();
        $this->clientmod->delete($this->request->getPost('delet'));
    }
    public function modif($num)
    {
        $this->clientmod = new ClientModel();
        $this->data=$this->clientmod->where('num_cli',$num)->first();
        echo json_encode($this->data);
    }
    public function updatecli( )
    { 
        $this->clientmod = new ClientModel();
        $this->num=$this->request->getVar('updatnum');
        $this->nom=$this->request->getVar('nom');
        $this->prenom=$this->request->getVar('prenom') ;
        $this->adres=$this->request->getVar('adresse');
        $this->tel=$this->request->getVar('tel');
        $this->lieu=$this->request->getVar('lieu');

        $this->data['nom_cli']=$this->nom;
        $this->data['prenom_cli']=$this->prenom;
        $this->data['adres_cli']=$this->adres;
        $this->data['tel_cli']=$this->tel;
        $this->data['lieu_trav']=$this->lieu;

        $this->clientmod->update($this->num,$this->data);
        return redirect()->to(base_url("/emit"));
    }
}
