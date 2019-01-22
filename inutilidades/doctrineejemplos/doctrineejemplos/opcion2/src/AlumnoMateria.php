<?php

/**
 * @Entity @Table(name="alumnomateria",
 *  uniqueConstraints={@UniqueConstraint(name="am", columns={"idalumno", "idmateria"})})
 **/
class AlumnoMateria {

    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="Alumno", inversedBy="materias")
     * @JoinColumn(name="idalumno", referencedColumnName="id", nullable=false)
     */
    private $alumno;

    /**
     * @ManyToOne(targetEntity="Materia", inversedBy="alumnos")
     * @JoinColumn(name="idmateria", referencedColumnName="id", nullable=false)
     */
    private $materia;

    /**
     * @Column(type="string", length=20, unique=false, nullable=true)
     */
    private $nota;

    public function getId() {
        return $this->id;
    }

    public function getAlumno() {
        return $this->alumno;
    }

    public function getMateria() {
        return $this->materia;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setAlumno($alumno) {
        $this->alumno = $alumno;
        return $this;
    }

    public function setMateria($materia) {
        $this->materia = $materia;
        return $this;
    }

}