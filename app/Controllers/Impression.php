<?php
namespace App\Controllers;
use Dompdf\Dompdf;
use App\Models\AchetModel;

class Impression extends BaseController
{
    public function demoPDF()
    {
        try {
            $this->dompdf = new Dompdf();
            // $this->dompdf->loadHTML('<h1>bonjour</h1><br><p>salut bb</p>');
            // $this->dompdf->loadHTML(view('Imprime'));
            // $this->dompdf->setPaper('A4' , 'portrait');
            // $this->dompdf->render();
            // $this->dompdf->stream("Impression");
    
            $this->logmodel = new AchetModel();
                $this->data['client'] = $this->logmodel->showdata();
                $this->html = view('Imprime',$this->data);
                $this->dompdf->loadHTML($this->html);
                $this->dompdf->render();
                $this->dompdf->stream("Impression");
        } catch (\Throwable $th) {
            echo "$th";
        }
            
        
       
    }

    
    
}
