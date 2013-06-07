<?php
/**
 * @package Model
 * @version 1.0
 * @author Luis Alberto Vega <vla200632213@gmail.com>
 */
include_once 'DataAccess.php';
include_once '../persistence/IEntity.php';
include_once '../persistence/Collection.php';

class Evento extends DataAccess implements IEntity{
    
    /**
     * @var integer
     */
    private $eventoId;
    
    /**
     * @var string 
     */
    private $titulo;
    
    /**
     * @var string 
     */
    private $descripcion;
    
    /**
     * @var Date
     */
    private $publicacion;
    
    /**
     * @var Date
     */
    private $conclusion;
    
    /**
     * @var integer
     */
    private $equipoId;
    
    /**
     * @var boolean 
     */
    private $eliminado;
    
    
    public function __construct() {
        parent::__construct(__CLASS__);
    }
    
    public function getEventoId() {
        return $this->eventoId;
    }

    public function setEventoId($eventoId) {
        $this->eventoId = $eventoId;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getPublicacion() {
        return $this->publicacion;
    }

    public function setPublicacion(Date $publicacion) {
        $this->publicacion = $publicacion;
    }

    public function getConclusion() {
        return $this->conclusion;
    }

    public function setConclusion(Date $conclusion) {
        $this->conclusion = $conclusion;
    }

    public function getEquipoId() {
        return $this->equipoId;
    }

    public function setEquipoId($equipoId) {
        $this->equipoId = $equipoId;
    }

    public function getEliminado() {
        return $this->eliminado;
    }

    public function setEliminado($eliminado) {
        $this->eliminado = $eliminado;
    }

    public function find($id = 100000) {
        $this->findObject($id);
        $this->loadAnObjects();
    }

    public function findAll() {
        $collectionAllEvento = $this->findAllObject();
        $collectionObjects = new Collection();
        foreach ($collectionAllEvento as $collectionEvento) {
            $this->collectionFieldsObject = $collectionEvento;
            $evento = new Evento();
            $this->loadAnObjects();
            $evento = clone $this;
            $collectionObjects->addAll($evento);
            $this->collectionFieldsObject->clear();
        }
        
        return $collectionObjects;
    }

    public function remove() {
        
    }

    public function save() {
        
    }

    public function update() {
        
    }

    private function loadFields() {
        $this->collectionFieldsObject = new Collection(get_object_vars($this));
    }
    
    private function loadAnObjects() {        
        foreach ($this->collectionFieldsObject as $key => $value) {
            $this->$key = $value;
        }
    }
}

?>
