<?php

namespace izv\data;

/** @Entity @Table(name="producto") */
class Producto {
    use \izv\common\Comun;
  /** @Id @Column(type="integer") @GeneratedValue */
  private $id;
  
  /** @Column(type="string", length=3, unique=false, nullable=false) */
  private $nombre;
  
  /** @Column(type="decimal", precision=7, scale=2, nullable=false) */
  private $precio;
  
   /** @Column(type="string", length=25, nullable=false) */
  private $tipo;
  
  /** @Column(type="integer", precision=3, unique=false, nullable=false)*/
  private $volumendesde;
  
  /** @Column(type="integer", precision=5, unique=false, nullable=false)*/
  private $volumenhasta;
  
   /** @Column(type="string", length=250, unique=false, nullable=true)*/
  private $descripcion;
  
  /** @OneToMany(targetEntity="Detalle", mappedBy="producto") */
  private $detalles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->detalles = new \Doctrine\Common\Collections\ArrayCollection();
        
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
     * @return Producto
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
     * Set precio
     *
     * @param string $precio
     *
     * @return Producto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Producto
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set volumendesde
     *
     * @param integer $volumendesde
     *
     * @return Producto
     */
    public function setVolumendesde($volumendesde)
    {
        $this->volumendesde = $volumendesde;

        return $this;
    }

    /**
     * Get volumendesde
     *
     * @return integer
     */
    public function getVolumendesde()
    {
        return $this->volumendesde;
    }

    /**
     * Set volumenhasta
     *
     * @param integer $volumenhasta
     *
     * @return Producto
     */
    public function setVolumenhasta($volumenhasta)
    {
        $this->volumenhasta = $volumenhasta;

        return $this;
    }

    /**
     * Get volumenhasta
     *
     * @return integer
     */
    public function getVolumenhasta()
    {
        return $this->volumenhasta;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Producto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Add detalle
     *
     * @param \izv\data\Detalle $detalle
     *
     * @return Producto
     */
    public function addDetalle(\izv\data\Detalle $detalle)
    {
        $this->detalles[] = $detalle;

        return $this;
    }

    /**
     * Remove detalle
     *
     * @param \izv\data\Detalle $detalle
     */
    public function removeDetalle(\izv\data\Detalle $detalle)
    {
        $this->detalles->removeElement($detalle);
    }

    /**
     * Get detalles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetalles()
    {
        return $this->detalles;
    }
}

