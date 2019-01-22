<?php

/**
 * @Entity @Table(name="logregistro")
 **/
class LogRegistro {
    
    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="integer", nullable=false)
     */
    private $idregistro;
    
    /**
     * @Column(type="date", nullable=false)
     */
    private $date;

    public function getId() {
        return $this->id;
    }

    public function getIdregistro() {
        return $this->idregistro;
    }

    public function getDate() {
        return $this->date;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setIdregistro($idregistro) {
        $this->idregistro = $idregistro;
        return $this;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }
}