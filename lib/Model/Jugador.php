<?php
/**
 * @package Model
 * @version 1.0
 * @author Luis Alberto Vega <vla200632213@gmail.com>
 */
include_once 'DataAccess.php';
include_once '../persistence/IEntity.php';
include_once '../persistence/Collection.php';

class Jugador extends DataAccess implements IEntity{
    
    const ID_JUGADOR_SYSTEM = 100001;

    /**
     * @var integer 
     */
    private $jugadorId;

    /**
     * @var integer
     */
    private $nrocamiseta;

    /**
     * @var string 
     */
    private $nombres;
    
    /**
     * @var string 
     */
    private $apellidos;
    
    /**
     * @var string
     */
    private $apodo;

    /**
     * @var integer
     */
    private $posicionId;

    /**
     * @var Date
     */
    private $nacimiento;

    /**
     * @var integer 
     */
    private $equipoId;

    /**
     * @var bool 
     */
    private $eliminado;

    public function __construct() {
        parent::__construct(__CLASS__);
    }

    public function getJugadorId() {
        return $this->jugadorId;
    }

    public function setJugadorId($jugadorId) {
        $this->jugadorId = $jugadorId;
    }

    public function getNrocamiseta() {
        return $this->nrocamiseta;
    }

    public function setNrocamiseta($nrocamiseta) {
        $this->nrocamiseta = $nrocamiseta;
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

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getApodo() {
        return $this->apodo;
    }

    public function setApodo($apodo) {
        $this->apodo = $apodo;
    }

    public function getPosicionId() {
        return $this->posicionId;
    }

    public function setPosicionId($posicionId) {
        $this->posicionId = $posicionId;
    }

    public function getNacimiento() {
        return $this->nacimiento;
    }

    public function setNacimiento(Date $nacimiento) {
        $this->nacimiento = $nacimiento;
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

    /**
     * return All the objects Jugador of BD.
     */
     public function findAll() {
        $collectionAllJugador = $this->findAllObject();
        $collectionObjects = new Collection();
        foreach ($collectionAllJugador as $collectionJugador) {
            $this->collectionFieldsObject = $collectionJugador;
            $jugador = new Jugador();
            $this->loadAnObjects();
            $jugador = clone $this;
            $collectionObjects->addAll($jugador);
            $this->collectionFieldsObject->clear();
        }
        
        return $collectionObjects;
     }

    /**
     * remove this object of the BD
     */
    public function remove() {

    }

    /**
     * save the fields of the Class
     */
    public function save() {
        $this->loadFields();
        $this->saveObject(__CLASS__);
    }

    /**
     * update the fields of the Class 
     */
    public function update() {
       
    }
    
    /**
     * return of date of the Class
     * @param type $id integer
     */
    public function find($id = 100000) {
        $this->findObject($id);
        $this->loadAnObjects();
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

$jugador = new Jugador();
//$jugador->find(100003);
//var_dump(print_r($jugador->getEquipoId()));
?>
    