<?php
namespace izv\data;

/** @Entity @Table(name="recurso") */
class Recurso {

  /** @Id @Column(type="integer") @GeneratedValue */
  private $id;

  /** @Column(type="string", length=250, unique=false, nullable=false) */
  private $nombre;

  /** @Column(type="string", length=250, nullable=false) */
  private $tipo;

  /** @Column(type="integer", length=400, nullable=false) */
  private $cantidad;

  /**@Column(type="string", length=250, unique=false, nullable=true)*/
  private $descripcion;
  
  /**@Column(type="date", nullable=false)*/
  private $fechalta;
  
  /** @OneToMany(targetEntity="AulaRecurso", mappedBy="recursos") */
  private $aulasRecursos;

}