<?php

namespace izv\data;

/** @Entity @Table(name="cliente") */
class Cliente {

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
    
}