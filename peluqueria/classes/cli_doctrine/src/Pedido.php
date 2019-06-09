<?php

namespace izv\data;

/** @Entity @Table(name="pedido") */
class Pedido {

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

}