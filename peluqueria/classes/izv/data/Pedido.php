<?php

namespace izv\data;

/** @Entity @Table(name="pedido") */
class Pedido {
    use \izv\common\Comun;
  /** @Id @Column(type="integer") @GeneratedValue */
  private $id;
  
  /** @Column(type="datetime", unique=false, nullable=false) */
  private $fechapedido;
  
  /** @OneToMany(targetEntity="Detalle", mappedBy="pedido") */
   private $detalles;
  
  /**
  * @ManyToOne(targetEntity="Cliente", inversedBy="pedidos")
  * @JoinColumn(name="idCliente", referencedColumnName="id", nullable=false)
  */
  private $cliente;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->detalles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fechapedido = new \DateTime();
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
     * Set fechapedido
     *
     * @param \DateTime $fechapedido
     *
     * @return Pedido
     */
    public function setFechapedido($fechapedido)
    {
        $this->fechapedido = $fechapedido;

        return $this;
    }

    /**
     * Get fechapedido
     *
     * @return \DateTime
     */
    public function getFechapedido()
    {
        return $this->fechapedido;
    }

    /**
     * Add detalle
     *
     * @param \izv\data\Detalle $detalle
     *
     * @return Pedido
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

    /**
     * Set cliente
     *
     * @param \izv\data\Cliente $cliente
     *
     * @return Pedido
     */
    public function setCliente(\izv\data\Cliente $cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \izv\data\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }
}

