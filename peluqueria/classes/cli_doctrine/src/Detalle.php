<?php

namespace izv\data;

/** @Entity @Table(name="detalle") */
class Detalle {

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
  
}