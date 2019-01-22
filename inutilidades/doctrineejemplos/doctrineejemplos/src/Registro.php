<?php

/**
 * @Entity @Table(name="registro")
 **/
class Registro {
    
    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="string", length=200, unique=true, nullable=false)
     */
    private $token;
    
    /**
     * @Column(type="string", length=100, unique=false, nullable=true)
     */
    private $email;
    
    /**
     * @Column(type="string", length=20, unique=false, nullable=true)
     */
    private $phone;

    public function getId() {
        return $this->id;
    }

    public function getToken() {
        return $this->token;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setToken($token) {
        $this->token = $token;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }
    
    public function set($phone, $email) {
        $this->setEmail($email);
        $this->setPhone($phone);
        return $this;
    }
    
    function __toString(){
        return $this->getId() . ' ' . $this->getEmail() . ' ' . $this->getPhone();
    }
}