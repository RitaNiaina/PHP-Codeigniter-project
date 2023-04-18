<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogementModel;

class charControl extends BaseController
{
    
    public function stat()
    {    
        $this->logmod = new LogementModel();
        $this->data['client'] = $this->logmod->select('SUM(acheter.prix) AS prix, loge.province AS province')
        ->join('acheter','acheter.num_log=loge.num_log')->groupBy('loge.province')
        ->get()->getResultArray();
        return view('State',$this->data);
    }
    
}
