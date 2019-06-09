<?php

namespace izv\data;

/** @Entity @Table(name="producto") */
class Producto {

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
}