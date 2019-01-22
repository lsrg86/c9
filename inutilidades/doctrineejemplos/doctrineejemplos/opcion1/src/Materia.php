<?php

/**
 * @Entity @Table(name="materia")
 **/
class Materia {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string", length=40, unique=true, nullable=false)
     */
    private $materia;

    public function getId() {
        return $this->id;
    }

    public function getMateria() {
        return $this->materia;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setMateria($materia) {
        $this->materia = $materia;
        return $this;
    }

}