<?php

use Doctrine\Common\Collections\ArrayCollection;

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

    /**
     * @OneToMany(targetEntity="AlumnoMateria", mappedBy="idmateria")
     */
    private $alumnos = null;

    public function __construct() {
        $this->alumnos = new ArrayCollection();
    }

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

    public function addAlumno($alumno) {
        $this->alumnos[] = $alumno;
    }

    public function getAlumnos() {
        return $this->alumnos;
    }
}