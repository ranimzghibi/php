<?php
class User {
    private $e_mail;
    private $motdepass;
    private $username;
    private $id_user;
    function __construct($e_mail = "", $motdepass = "",$username="",$id_user="") {
        $this->e_mail = $e_mail;
        $this->motdepass = $motdepass;
        $this->username = $username;
        $this->id_user = $id_user;
    }
    public function getIduser() {
        return $this->id_user;
    }
    public function setIduser($id_user) {
        $this->id_user = $id_user;
    }
    public function getusername() {
        return $this->username;
    }
    public function setusername($username) {
        $this->username = $username;
    }
    public function getE_mail() {
        return $this->e_mail;
    }
    public function setE_mail($e_mail) {
        $this->e_mail = $e_mail;
    }
    public function getMotdepass() {
        return $this->motdepass;
    }
    public function setMotdepass($motdepass) {
        $this->motdepass = $motdepass;
    }
}
?>
