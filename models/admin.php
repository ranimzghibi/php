<?php
class Admin {
    private $id;
    private $pseudo;
    private $e_mail;
    private $motdepass;

    function __construct($id = "", $pseudo = "", $e_mail = "", $motdepass = "") {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->e_mail = $e_mail;
        $this->motdepass = $motdepass;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
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
