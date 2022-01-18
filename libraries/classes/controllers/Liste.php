<?php

namespace Controllers;

class Liste extends Controller{
    protected $modelName = "Liste";

    public function index() {

        
        $id_category = filter_input(INPUT_GET, 'id_category', FILTER_VALIDATE_INT);

        $liste = $this->model->findProductByCategory($id_category);
    }
}