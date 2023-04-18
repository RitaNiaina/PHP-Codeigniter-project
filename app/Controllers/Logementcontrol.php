<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogementModel;

class Logementcontrol extends BaseController
{
    public function logeme()
    {
        return view('interface');
    }
    public function test()
    {
        $this->logmod = new LogementModel();
        $this->data['client'] = $this->logmod->findall();
        return view('logement', $this->data);
    }
    public function save()
    {
        
        //AJOUT
        $this->logmod = new LogementModel();
        $this->values = [
            'province'=>$this->request->getPost('prov'),
            'agence'=> $this->request->getPost('agen') ,
            'adres_agn'=>$this->request->getPost('adres'),
            'citer'=>$this->request->getPost('cite'),
            'terrain'=>$this->request->getPost('ter'),
            'superficie'=>$this->request->getPost('super')
        ];
       $this->logmod->insert($this->values);
       return redirect()->to(base_url("/logem"));
    
    }
    public function delete()
    {
        $this->logmod = new LogementModel();
        $this->logmod->delete($this->request->getPost('delet'));
    }
    public function modif($num)
    {
        $this->logmod = new LogementModel();
        $this->data=$this->logmod->where('num_log',$num)->first();
        echo json_encode($this->data);
    }
    public function updatecli( )
    { 
        $this->logmod = new LogementModel();
        $this->num=$this->request->getVar('updatnum');
        $this->nom=$this->request->getVar('prov');
        $this->prenom=$this->request->getVar('agen') ;
        $this->adres=$this->request->getVar('adres');
        $this->tel=$this->request->getVar('cite');
        $this->lieu=$this->request->getVar('ter');
        $this->sup=$this->request->getVar('super');

        $this->data['province']=$this->nom;
        $this->data['agence']=$this->prenom;
        $this->data['adres_agn']=$this->adres;
        $this->data['citer']=$this->tel;
        $this->data['terrain']=$this->lieu;
        $this->data['superficie']=$this->sup;

        $this->logmod->update($this->num,$this->data);
        return redirect()->to(base_url("/logem"));
    }
}
