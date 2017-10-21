<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $sth = $this->db->prepare("SELECT userid, role FROM user WHERE
                nom = :nom AND prenom = :prenom");
        $sth->execute(array(
            ':nom' => $_POST['nom'],
            ':prenom' => $_POST['prenom']
        ));

        $data = $sth->fetch();

        $count =  $sth->rowCount();
        if ($count > 0) {
            // login
            Session::init();
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
            Session::set('userid', $data['userid']);
            header('location: /Cover-Builder/letter/');
        } else {
            header('location: /Cover-Builder/');
        }

    }

}
