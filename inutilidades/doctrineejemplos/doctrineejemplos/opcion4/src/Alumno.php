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
     * @ManyToMany(targetEntity="Materia", inversedBy="alumnos")
     * @JoinTable(name="alumnomateria",
     *      joinColumns={@JoinColumn(name="idalumno", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="idmateria", referencedColumnName="id")}
     *      )
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
     * @param \Materia $materia
     *
     * @return Alumno
     */
    public function addMateria(\Materia $materia)
    {
        $this->materias[] = $materia;

        return $this;
    }

    /**
     * Remove materia
     *
     * @param \Materia $materia
     */
    public function removeMateria(\Materia $materia)
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
