<?php
//Classe de connexion, tres basique: elle se contente de construire et d'appeller run() du model
class Login extends Controller {

    function __construct() {
        parent::__construct();
    }

    function run()
    {
        $this->model->run();
    }


}
