<?php
/** @Entity @Table(name="aulaRecurso") */

class AulaRecurso {
  /** @Id @Column(type="integer") @GeneratedValue */
  private $id;
  
  /**@Column(type="integer", length=3, unique=true, nullable=false)*/
  private $idAula;
  
  /**@Column(type="integer", length=3, unique=true, nullable=false)*/
  private $idRecurso;
  
  /**@Column(type="integer", length=3, unique=false, nullable=true)*/
  private $posicion;
  
  /**
  * @ManyToOne(targetEntity="Aula", inversedBy="aulasRecursos")
  * @JoinColumn(name="idAula", referencedColumnName="id", nullable=false)
  */
  private $aulas;
  
  /**
  * @ManyToOne(targetEntity="Recurso", inversedBy="recursos")
  * @JoinColumn(name="idRecurso", referencedColumnName="id", nullable=false)
  */
  private $recursos;
  

}