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

    /**
     * @ManyToMany(targetEntity="Alumno", mappedBy="materias")
     * @JoinTable(name="alumnomateria",
     *      joinColumns={@JoinColumn(name="idmateria", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="idalumno", referencedColumnName="id")}
     *      )
     */
    private $alumnos = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alumnos = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set materia
     *
     * @param string $materia
     *
     * @return Materia
     */
    public function setMateria($materia)
    {
        $this->materia = $materia;

        return $this;
    }

    /**
     * Get materia
     *
     * @return string
     */
    public function getMateria()
    {
        return $this->materia;
    }

    /**
     * Add alumno
     *
     * @param \Alumno $alumno
     *
     * @return Materia
     */
    public function addAlumno(\Alumno $alumno)
    {
        $this->alumnos[] = $alumno;

        return $this;
    }

    /**
     * Remove alumno
     *
     * @param \Alumno $alumno
     */
    public function removeAlumno(\Alumno $alumno)
    {
        $this->alumnos->removeElement($alumno);
    }

    /**
     * Get alumnos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlumnos()
    {
        return $this->alumnos;
    }
}
