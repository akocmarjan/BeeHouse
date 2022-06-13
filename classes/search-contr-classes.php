<?php

class SearchContr extends Search{

    private $search_term;

    public function __construct($search_term){
        $this->search_term = $search_term;
    }

    public function search(){
        $this->setSearch($this->search_term);
    }


}