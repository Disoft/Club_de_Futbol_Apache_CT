<?php
/**
 * @package Model
 * @version 1.0
 * @author Luis Alberto Vega <vla200632213@gmail.com>
 */
include_once 'DataAccess.php';
require_once 'Delegado.php';
require_once 'Jugador.php';
require_once 'Galeria.php';
require_once 'Evento.php';
include_once '../persistence/Collection.php';
include_once '../persistence/IEntity.php';
include_once '../persistence/OneToOne.php';

class Equipo extends DataAccess implements IEntity{
    
    const ID_EQUIPO_SYSTEM = 100001;

    /**
     * @var integer 
     */
    private $equipoId;

    /**
     * @var string 
     */
    private $nombre;
    
    /**
     * @var string 
     */
    private $historia;

    /**
     * @var string 
     */
    private $vision;

    /**
     * @var integer 
     */
    private $delegadoId;
    
    /**
     * @var Delegado 
     */
    private $delegado;
    
    /**
     * @var boolean
     */
    private $eliminado;
    
    /**
     * @var library\persistence\Collection 
     */
    private $relationOneToOne;

    public function __construct() {
        parent::__construct(__CLASS__);
        $this->relationOneToOne = new Collection();
        $this->relationOneToOne->addAll(new OneToOne('Delegado', 'delegadoId'));
    }

    public function getEquipoId() {
        return $this->equipoId;
    }

    public function setEquipoId($equipoId) {
        $this->equipoId = $equipoId;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getHistoria() {
        return $this->historia;
    }

    public function setHistoria($historia) {
        $this->historia = $historia;
    }

    public function getVision() {
        return $this->vision;
    }

    public function setVision($vision) {
        $this->vision = $vision;
    }

    public function getDelegado() {
        return $this->delegado;
    }

    public function setDelegado(Delegado $delegado) {
        $this->delegado = $delegado;
        $this->delegadoId = $delegado->getDelegadoId();
    }

    public function getEliminado() {
        return $this->eliminado;
    }

    public function setEliminado($eliminado) {
        $this->eliminado = $eliminado;
    }

    public function getJugadores() {
        return $this->getRelationOneToMany('Jugador');
    }

    public function getGalerias() {
        return $this->getRelationOneToMany('Galeria');
    }
    
    public function getEventos() {
        return $this->getRelationOneToMany('Evento');
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
        $collectionAllEquipo = $this->findAllObject();
        $collectionObjects = new Collection();
        foreach ($collectionAllEquipo as $collectionEquipo) {
            $this->collectionFieldsObject = $collectionEquipo;
            $equipo = new Equipo();
            $this->loadAnObjects();
            $equipo = clone $this;
            $collectionObjects->addAll($equipo);
        }
        $this->collectionFieldsObject->clear();
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
            $relation = $this->contain($key);
            
            if (false != $relation) {
                $model = $relation->getClassModel();
                $classRelation = new $model();
                $model = strtolower($model);
                $classRelation->find($value); 
                $this->$model = $classRelation;   
                
            } else {
                $this->$key = $value;
            }
        }
    }
    
    /**
     * Verifica si la key es perteneciente a la relacion con otra clase modelo
     * @param integer $key
     * @return boolean or object OneToOne
     */
    private function contain($key) {
        
        foreach ($this->relationOneToOne as $relation) {
            if ($key == $relation->getForeignKey()){
                return $relation;
            }
        }
        return false;
    }
    
    /**
     * Retorna una collection de modelos relacionados <p>
     * con la clase Equipo
     * @param strin $class nombre de la clase Modelo
     * @return \Collection
     */
    private function getRelationOneToMany($class) {
        $model = new $class();
        $modelAll = $model->findAll();
        $relationAll = new Collection();
        foreach ($modelAll as $modelRelation) {
            $method = 'get' . __CLASS__ . 'Id';
            $value = $modelRelation->$method();
            if ($value == $this->$method()) {
                $relationAll->addAll($modelRelation);
            }
        }
        return $relationAll;
    }
}
 
?>
