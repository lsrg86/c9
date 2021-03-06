<?php
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
  
   /**@Column(type="date", length=50, unique=false, nullable=false)*/
  private $fechaalta;
  
  /** @OneToMany(targetEntity="AulaRecurso", mappedBy="recursos") */
  private $aulasRecursos;
   
}
