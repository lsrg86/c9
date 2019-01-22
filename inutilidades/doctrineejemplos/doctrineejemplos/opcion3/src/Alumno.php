<?php

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
     * @OneToMany(targetEntity="AlumnoMateria", mappedBy="alumno")
     */
    private $materias = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->materias = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Alumno
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add materia
     *
     * @param \AlumnoMateria $materia
     *
     * @return Alumno
     */
    public function addMateria(\AlumnoMateria $materia)
    {
        $this->materias[] = $materia;

        return $this;
    }

    /**
     * Remove materia
     *
     * @param \AlumnoMateria $materia
     */
    public function removeMateria(\AlumnoMateria $materia)
    {
        $this->materias->removeElement($materia);
    }

    /**
     * Get materias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMaterias()
    {
        return $this->materias;
    }
}
