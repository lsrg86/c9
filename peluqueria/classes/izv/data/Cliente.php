<?php

namespace izv\data;

/** @Entity @Table(name="cliente") */
class Cliente {
    use \izv\common\Comun;
  /** @Id @Column(type="integer") @GeneratedValue */
  private $id;
  
   /** @Column(type="string", length=150, unique=false, nullable=false) */
  private $nombre;
  
   /** @Column(type="string", length=200, unique=false, nullable=false) */
  private $apellidos;
  
  /** @Column(type="string", length=100, unique=false, nullable=false)*/
  private $alias;
  
  /** @Column(type="string", length=250, unique=false, nullable=false)*/
  private $clave;
  
  /** @Column(type="string", length=250, unique=true, nullable=false) */
  private $correo;
  
  /** @Column(type="integer", precision=2, unique=false, nullable=false) */
  private $activo;
  
  /** @Column(type="integer", precision=2, unique=false, nullable=false) */
  private $permisos;
  
  /** @Column(type="date", unique=false, nullable=false) */
  private $fechaalta;
  // inicializar la fecha en el constructor
  
  /** @OneToMany(targetEntity="Pedido", mappedBy="cliente") */
  private $pedidos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pedidos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fechaalta = new \DateTime();
        $this->activo = 0;
        $this->permisos = 0;
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
     * @return Cliente
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
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Cliente
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return Cliente
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set clave
     *
     * @param string $clave
     *
     * @return Cliente
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Cliente
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set activo
     *
     * @param integer $activo
     *
     * @return Cliente
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return integer
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set permisos
     *
     * @param integer $permisos
     *
     * @return Cliente
     */
    public function setPermisos($permisos)
    {
        $this->permisos = $permisos;

        return $this;
    }

    /**
     * Get permisos
     *
     * @return integer
     */
    public function getPermisos()
    {
        return $this->permisos;
    }

    /**
     * Set fechaalta
     *
     * @param \DateTime $fechaalta
     *
     * @return Cliente
     */
    public function setFechaalta($fechaalta)
    {
        $this->fechaalta = $fechaalta;

        return $this;
    }

    /**
     * Get fechaalta
     *
     * @return \DateTime
     */
    public function getFechaalta()
    {
        return $this->fechaalta;
    }

    /**
     * Add pedido
     *
     * @param \izv\data\Pedido $pedido
     *
     * @return Cliente
     */
    public function addPedido(\izv\data\Pedido $pedido)
    {
        $this->pedidos[] = $pedido;

        return $this;
    }

    /**
     * Remove pedido
     *
     * @param \izv\data\Pedido $pedido
     */
    public function removePedido(\izv\data\Pedido $pedido)
    {
        $this->pedidos->removeElement($pedido);
    }

    /**
     * Get pedidos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPedidos()
    {
        return $this->pedidos;
    }
}

