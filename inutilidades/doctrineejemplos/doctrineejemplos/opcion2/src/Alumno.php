<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="alumno")
 **/
class Alumno {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string", length=40, unique=true, nullable=false)
     */
    private $nombre;
    
    /**
     * @OneToMany(targetEntity="AlumnoMateria", mappedBy="idalumno")
     */
    private $materias = null;

    public function __construct() {
        $this->materias = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

    public function addMateria($materia) {
        echo 'metodoadd<br>';
        $this->materias[] = $materia;
        echo '<pre>' . var_export($this->materias, true) . '</pre>';
    }

    public function getMaterias() {
        echo 'metodoget<br>';
        echo '<pre>' . var_export($this->materias, true) . '</pre>';
        return $this->materias;
    }
}