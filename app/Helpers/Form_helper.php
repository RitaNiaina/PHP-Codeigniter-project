<?php
function display_error($validation, $field){
    if($this->validation->hasError($this->field)){
        return $this->validation->getError($this->field);
    }else{
        return false;
    }
}

?>