<?php
//Je fais tout dans ce controller
// @TOCHANGE : Mieux structurer le code et adapter a la BDD
class Letter extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();//authentification user
    }

    //charge le user connecte et sa derniere lettre saisie
    // @TODO Ajouter les controles
    function index()
    {
        $letterList = $this->model->letterList();
        $userInfo = $this->model->userInfo($_SESSION['userid']);
        $this->view->render('letter/index', array('titre'=>'Letter','userInfo'=>$userInfo, 'letterList'=>$letterList));
    }

    public function save()
    {
        $data = array(
            'destinataire' => $_POST['dest'],
            'objet' => $_POST['objet'],
            'content' => $_POST['content'],
            'template' => $_POST['template']
        );
        $this->model->save($data);
        header('location: /Cover-Builder/letter');
    }

    public function edit($id)
    {
        $letterSingleList = $this->model->letterSingleList($id);

        if (empty($letterSingleList)) {
            die('This is an invalid letter!');
        }

        $this->view->render('letter/edit', array('titre'=>'Edit letter','letterSingleList'=>$letterSingleList));
    }

    public function editSave($letterid)
    {
        $data = array(
            'letterid' => $letterid,
            'destinataire' => $_POST['destinataire'],
            'objet' => $_POST['objet'],
            'content' => $_POST['content'],
            'template' => $_POST['template']
        );

        // @TODO: Error cheking here

        $this->model->editSave($data);
        header('location: /Cover-Builder/letter');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('location: /Cover-Builder/letter');
    }
}
