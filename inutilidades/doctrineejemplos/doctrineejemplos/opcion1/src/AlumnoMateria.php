<?php

/**
 * @Entity @Table(name="alumnomateria")
 **/
class AlumnoMateria {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="integer", nullable=false)
     */
    private $idalumno;

    /**
     * @Column(type="integer", nullable=false)
     */
    private $idmateria;

    public function getId() {
        return $this->id;
    }

    public function getIdalumno() {
        return $this->idalumno;
    }

    public function getIdmateria() {
        return $this->idmateria;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setIdalumno($idalumno) {
        $this->idalumno = $idalumno;
        return $this;
    }

    public function setIdmateria($idmateria) {
        $this->idmateria = $idmateria;
        return $this;
    }

}