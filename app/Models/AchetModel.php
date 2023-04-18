<?php

namespace App\Models;

use CodeIgniter\Model;

class AchetModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'acheter';
    protected $primaryKey       = 'achat';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];
   
    public function showdata(){
        $builder = $this->table('acheter')->select('*');
        $builder->join('loge','acheter.num_log=loge.num_log');
        $builder->join('client','acheter.num_cli=client.num_cli');
        $posts = $builder->get()->getResultArray();
        return $posts;
    }
}
?>