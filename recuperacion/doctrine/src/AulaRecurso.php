<?php

namespace izv\data;

/** @Entity @Table(name="aularecurso") */
class AulaRecurso {
  
  /** @Id @Column(type="integer") @GeneratedValue */
  private $id;
  
  /**
  * @ManyToOne(targetEntity="Aula", inversedBy="aulasRecursos")
  * @JoinColumn(name="idaula", referencedColumnName="id", nullable=false)
  */
  private $aulas;
  
  /**
  * @ManyToOne(targetEntity="Recurso", inversedBy="recursos")
  * @JoinColumn(name="idrecurso", referencedColumnName="id", nullable=false)
  */
  private $recursos;
  
  /** @Column(type="integer", length=3, unique=false, nullable=true)*/
  private $posicion;

}