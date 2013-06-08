<?php
/**
 * @package Model
 * @version 1.0
 * @author Luis Alberto Vega <vla200632213@gmail.com>
 */

include_once 'DataAccess.php';
include_once 'Foto.php';
include_once '../persistence/IEntity.php';
include_once '../persistence/Collection.php';

class Galeria extends DataAccess implements IEntity{
   
    /**
     * @var integer
     */
    private $galeriaId;
    
    /**
     * @var string 
     */
    private $nombre;
    
    /**
     * @var string 
     */
    private $equipoId;
    
    /**
     * @var boolean 
     */
    private $eliminado;
    
    public function __construct() {
        parent::__construct(__CLASS__);
    }
    
    public function getGaleriaId() {
        return $this->galeriaId;
    }

    public function setGaleriaId($galeriaId) {
        $this->galeriaId = $galeriaId;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
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

    public function getFotos() {
        return $this->getRelationOneToMany('Foto');
    }

    public function findAll() {
        $collectionAllGaleria = $this->findAllObject();
        $collectionObjects = new Collection();
        foreach ($collectionAllGaleria as $collectionGaleria) {
            $this->collectionFieldsObject = $collectionGaleria;
            $galeria = new Galeria();
            $this->loadAnObjects();
            $galeria = clone $this;
            $collectionObjects->addAll($galeria);
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
    
    /**
     * Retorna una collection de modelos relacionados <p>
     * con la clase Galeria
     * @param string $class nombre de la clase Modelo
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
