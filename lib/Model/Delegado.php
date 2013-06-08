<?php
/**
 * @package Model
 * @version 1.0
 * @author Luis Alberto Vega <vla200632213@gmail.com>
 */
include_once 'DataAccess.php';
include_once '../persistence/IEntity.php';

class Delegado extends DataAccess implements IEntity{
    
    const ID_DELEGADO_SYSTEM = 100001;

    /**
     * @var integer
     */
    private $delegadoId;

    /**
     * @var string
     */
    private $nombres;
    
    /**
     * @var type 
     */
    private $apellidos;

    /**
     * @var bool
     */
    private $eliminado;


    public function __construct() {
        parent::__construct(__CLASS__);
    }

    public function getDelegadoId() {
        return $this->delegadoId;
    }

    public function setDelegadoId($delegadoId) {
        $this->delegadoId = $delegadoId;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos(type $apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getEliminado() {
        return $this->eliminado;
    }

    public function setEliminado($eliminado) {
        $this->eliminado = $eliminado;
    }
    
    /**
     * return of date of the Class
     * @param type $id integer
     */
    public function find($id = 100000) {
        $this->findObject($id);
        $this->loadAnObjects();
    }

    public function findAll() {
        $collectionAllDelegado = $this->findAllObject();
        $collectionObjects = new Collection();
        foreach ($collectionAllDelegado as $collectionDelegado) {
            $this->collectionFieldsObject = $collectionDelegado;
            $delegado = new Delegado();
            $this->loadAnObjects();
            $delegado = clone $this;
            $collectionObjects->addAll($delegado);
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

    $delegado = new Delegado();

?>
