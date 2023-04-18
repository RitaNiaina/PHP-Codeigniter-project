<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AchetModel;


class AchetControl extends BaseController
{
    public function index()
    {
        try {
            $this->logmodel = new AchetModel();
            $this->data['client'] = $this->logmodel->showdata();
            return view('client', $this->data);
        } catch (\Throwable $th) {
            echo "$th";
        }
        
    }
    
}

