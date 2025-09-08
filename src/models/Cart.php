<?php
class Cart {
    private $items = [];

    public function add($id){
        if(isset($this->items[$id])){
            $this->items[$id]++;
        } else {
            $this->items[$id] = 1;
        }
    }

    public function remove($id){
        if(isset($this->items[$id])){
            $this->items[$id]--;
            if($this->items[$id] <= 0){
                unset($this->items[$id]);
            }
        }
    }

    public function getItems(){
        return $this->items;
    }
}
