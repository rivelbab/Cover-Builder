<?php
// Charge la page d'accueil @TODO : ajouter des fonctionnalitees
class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('index/index',array('titre' => 'Home'));
    }

}
