<?php

class Letter_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userInfo($userid)
    {
        return $this->db->select('SELECT userid, nom, prenom, role FROM user WHERE userid = :userid', array(':userid' => $userid));
    }

    public function letterList()
    {
        return $this->db->select('SELECT * FROM letter WHERE userid = :userid ORDER BY letterid Desc Limit 1',
            array('userid' => $_SESSION['userid']));
    }

    public function save($data)
    {
        $this->db->insert('letter', array(
            'userid' => $_SESSION['userid'],
            'destinataire' => $data['destinataire'],
            'objet' => $data['objet'],
            'content' => $data['content'],
            'template' => $data['template'],
            'date_added' => date('Y-m-d H:i:s') // use GMT aka UTC 0:00
        ));
    }

    public function editSave($data)
    {
        $postData = array(
            'destinataire' => $data['destinataire'],
            'objet' => $data['objet'],
            'content' => $data['content'],
            'template'=> $data['template']
        );

        $this->db->update('letter', $postData,
                "`letterid` = '{$data['letterid']}' AND userid = '{$_SESSION['userid']}'");
    }

    public function delete($id)
    {
        $this->db->delete('letter', "`letterid` = {$data['letterid']} AND userid = '{$_SESSION['userid']}'");
    }
}
