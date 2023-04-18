<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Userscontrol extends BaseController
{
    public function test()
    {
        $this->user_model =new UsersModel();
        //AJOUT
        $this->user_model -> insert(['nom'=>'antsa','prenom'=>'rita']);
        return view('inde');
        //AFFICHER
        //$data = $user_model -> findAll();
        // var_dump($data);
        //UPDATE
        // $user_model -> update(1,$data);
        //DELETE
        // $user_model -> delete(1);
    }
}
