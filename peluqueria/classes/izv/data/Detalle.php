<?php

namespace izv\data;

/** @Entity @Table(name="detalle") */
class Detalle {
    use \izv\common\Comun;
  /** @Id @Column(type="integer") @GeneratedValue */
  private $id;
  
  /** @Column(type="integer", precision=3, unique=false, nullable=false)*/
  private $cantidad;
  
  /** @Column(type="decimal", precision=7, scale=2, nullable=false) */
  private $precio;
  
  /**
  * @ManyToOne(targetEntity="Pedido", inversedBy="detalles")
  * @JoinColumn(name="idPedido", referencedColumnName="id", nullable=false)
  */
  private $pedido;
  
  /**
  * @ManyToOne(targetEntity="Producto", inversedBy="detalles")
  * @JoinColumn(name="idProducto", referencedColumnName="id", nullable=false)
  */
  private $producto;


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
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Detalle
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return Detalle
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
     * Set pedido
     *
     * @param \izv\data\Pedido $pedido
     *
     * @return Detalle
     */
    public function setPedido(\izv\data\Pedido $pedido)
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * Get pedido
     *
     * @return \izv\data\Pedido
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * Set producto
     *
     * @param \izv\data\Producto $producto
     *
     * @return Detalle
     */
    public function setProducto(\izv\data\Producto $producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \izv\data\Producto
     */
    public function getProducto()
    {
        return $this->producto;
    }
}

