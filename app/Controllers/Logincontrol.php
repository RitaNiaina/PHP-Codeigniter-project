<?php
namespace App\Controllers;
use App\Models\LogModel;
use App\Libraries\Hash;

class Logincontrol extends BaseController
{
    public function _construct()
    {
        helper(['url','form']);
    }
    public function test()
    {
        return view('log');
    }
    public function testing()
    {
        $this->clientmod = new LogModel();
        $this->data['client'] = $this->clientmod->findall();
        return view('logins', $this->data);
    }
    public function save()
    {
        
        //AJOUT
        $this->clientmod = new LogModel();
        $this->values = [
            'Id'=>$this->request->getPost('updatnum'),
            'username'=>$this->request->getPost('nom'),
            'password'=> $this->request->getPost('pass') ,
            
        ];
       $this->clientmod->insert($this->values);
       return redirect()->to(base_url("/lo"));
    
    }
    public function deletv()
    {
        $this->clientmod = new LogModel();
        $this->clientmod->delete($this->request->getPost('delty'));
    }
    public function modifv($num)
    {
        $this->clientmod = new LogModel();
        $this->data=$this->clientmod->where('Id',$num)->first();
        echo json_encode($this->data);
    }
    public function updatelog( )
    { 
        $this->clientmod = new LogModel();
        $this->num=$this->request->getVar('updatnum');
        $this->nom=$this->request->getVar('nom');
        $this->pass=$this->request->getVar('pass') ;

        $this->data['username']=$this->nom;
        $this->data['password']=$this->pass;
        

        $this->clientmod->update($this->num,$this->data);
        return redirect()->to(base_url("/lo"));
    }
    // public function testing()
    // {
    //     return view('emit');
    // }
    //  function check()
    // {
    //     $this->validation= $this->validate([
    //         'username'=>[
    //             'rules'=>'required|is_not_unique[login.username]',
    //             'errors'=>[
    //                 'required'=>'nom est incorrect',
    //                 'is_not_unique'=>'cet nom est pas da l bd '
    //             ]
    //         ],
    //         'password'=>[
    //             'rules'=>'required|is_not_unique[login.password]',
    //             'errors'=>[  
    //                 'required'=>'mot nexiste pas',
                    
    //             ]
    //         ]
    //     ]);
    //     if(!$this->validation){
    //         return view('log',['validation'=>$this->validator]);
    //     }else{
    //         $this->username = $this->request->getPost('username');
    //         $this->password = $this->request->getPost('password');
    //         $this->logmod = new LogModel();
    //         $this->log_info = $this->logmod->where('username',$this->username )->first();
    //         $this->check_password = Hash::check($this->password,$this->log_info['password'] );
            
    //         if(!$this->check_password ){
    //             session()->setFlasdata('fail','incorrect password');
    //             return redirect()->to('/log')->withInput();
    //         }else {
    //             $this->login_Id =  $this->log_info['Id'];
    //             session()->set('login', $this->login_Id);
    //             return redirect()->to('/logem');
    //         }
    //     }
    // }

   public function do_login(){
    $this->clientmod = new LogModel();
    $this->username = $this->request->getPost('username');
    $this->password = $this->request->getPost('password');

    $this->result = $this->clientmod->where('username',$this->username )->first();

    if($this->result->id > 0){
        if(password_verify($this->password, $this->result->password)){
            // $this->session->set('/emit', $this->result);
            return redirect()->to(base_url("/emit"));
        }else{
            echo 'mot ou nom invalide';
        }
    }else{
        return redirect()->to(base_url("/emit"));
    }
   }
}
