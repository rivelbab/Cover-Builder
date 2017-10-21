<?php
//Prevue pour une gestion des users (Pas encore utilise)
class User extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    public function index()
    {
        $userList = $this->model->userList();

        $this->view->render('user/index', array('titre'=>'User','userList'=>$userList));
    }

    public function create()
    {
        $data = array();
        $data['nom'] = $_POST['nom'];
        $data['prenom'] = $_POST['prenom'];
        $data['role'] = $_POST['role'];

        // @TODO: Do your error checking!

        $this->model->create($data);
        header('location: /Cover-Builder/user');
    }

    public function edit($id)
    {
        $userSingleList = $this->model->userSingleList($id);

        $this->view->render('user/edit', array('titre'=>'User Edit','userSingleList'=>$userSingleList));
    }

    public function editSave($id)
    {
        $data = array();
        $data['id'] = $id;
        $data['nom'] = $_POST['nom'];
        $data['prenom'] = $_POST['prenom'];
        $data['role'] = $_POST['role'];

        // @TODO: Do your error checking!

        $this->model->editSave($data);
        header('location: /Cover-Builder/user');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('location: /Cover-Builder/user');
    }
}
