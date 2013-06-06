<?php
/**
 * @package Model
 * @version 1.0
 * @author Luis Alberto Vega <vla200632213@gmail.com>
 */
include_once 'DataAccess.php';
include_once '../persistence/IEntity.php';
include_once '../persistence/Collection.php';

class Foto extends DataAccess implements IEntity{
    
    /**
     * @var integer
     */
    private $fotoId;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $path;
    
    /**
     * @var boolean
     */
    private $eliminado;


    public function __construct() {
        parent::__construct(__CLASS__);
    }

    public function getFotoId() {
        return $this->fotoId;
    }

    public function setFotoId($fotoId) {
        $this->fotoId = $fotoId;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = $path;
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
        $collectionAllFoto = $this->findAllObject();
        $collectionObjects = new Collection();
        foreach ($collectionAllFoto as $collectionFoto) {
            $this->collectionFieldsObject = $collectionFoto;
            $foto = new Foto();
            $this->loadAnObjects();
            $foto = clone $this;
            $collectionObjects->addAll($foto);
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
    
     /**
      * Carga todos los campos de la clase a la Collection <p>
      *  de la clase DataAccess (clase padre)
      */
     private function loadFields() {
         $this->collectionFieldsObject = new Collection(get_object_vars($this));
     }
     
     /**
      * Carga todos los campos de la Collection de la Clase DataAccess (clase padre) <p>
      *  a la clase
      */
     private function loadAnObjects() {
        foreach ($this->collectionFieldsObject as $key => $value) {
            $this->$key = $value;
        }
     }
}

    $foto = new Foto();
    $foto->find(100001);
    var_dump(print_r($foto->findAll()));
?>
