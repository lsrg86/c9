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


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nota
     *
     * @param string $nota
     *
     * @return AlumnoMateria
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set alumno
     *
     * @param \Alumno $alumno
     *
     * @return AlumnoMateria
     */
    public function setAlumno(\Alumno $alumno)
    {
        $this->alumno = $alumno;

        return $this;
    }

    /**
     * Get alumno
     *
     * @return \Alumno
     */
    public function getAlumno()
    {
        return $this->alumno;
    }

    /**
     * Set materia
     *
     * @param \Materia $materia
     *
     * @return AlumnoMateria
     */
    public function setMateria(\Materia $materia)
    {
        $this->materia = $materia;

        return $this;
    }

    /**
     * Get materia
     *
     * @return \Materia
     */
    public function getMateria()
    {
        return $this->materia;
    }
}
