<?php 

class Item{
    private $_id;
    private $_label;
    private $_price;

    public function getId(){
        return $this->_id;
    }

    public function getLabel(){
        return $this->_label;
    }

    public function getPrice(){
        return $this->_price;
    }
}

?>