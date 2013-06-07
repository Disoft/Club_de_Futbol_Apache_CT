<?php
/**
 * @package DataMapper
 * @version 1.0
 * @author Luis Alberto Vega <vla200632213@gmail.com>
 */
include '../persistence/Collection.php';

 class DataAccess {
    
     /**
      * @var type array[]
      */
     protected $collectionFieldsObject;

     /**
      * @var type string
      */
     protected $nameClass;

     public function __construct($nameClass) {
         $this->nameClass = $nameClass;
         $this->collectionFieldsObject = new Collection();
    }
        
     public function saveObject($className = __CLASS__) {

     }
     
     /**
      * Retorna una Collection con todos los campos <p>
      * de la clase que herede de esta clase
      * @return Collection
      */
     public function findObject($id) {
         $datesCollection = self::getDates();
         foreach ($datesCollection as $itemCollection) {
             if ($itemCollection->contains($id)) {
                 $this->collectionFieldsObject = $itemCollection; 
                 return true;
             }
         }
         return false;
     }

     /**
      * Retorna una Collection con todos los datos <p>
      * de la clase que herede de esta clase
      * @return Collection
      */
     public function findAllObject() {
         $datesCollection = self::getDates();
         return $datesCollection;
     }
     
     /**
      * 
      * @param string $className Name of Class
      * @return \Collection
      */
     private  function getDates(){
          $className = $this->nameClass;
          $file = fopen('../dates/' . strtolower($className) . '.txt', 'r') or exit('Unable to open file! ' . $className . '.txt');
          
          $itemsString =fgets($file);
          $itemsString = str_replace(' ', '', $itemsString);
          $arrayItems = explode(',', $itemsString);
          $arrayFields = $arrayItems;
          $itemsCollection = new Collection();
          while(!feof($file)) {
              $itemsString =fgets($file);
            if ('___end___' ==$itemsString) {
                break;
            }  else {
                $arrayValues = explode(',', $itemsString);
                $arrayItems = array_combine($arrayFields, $arrayValues); 
                $itemsCollection->addAll(new Collection($arrayItems));
            }

          }
          fclose($file);
          return $itemsCollection;
     }

     /**
      * Carga todos los campos de la clase hija a la Collection <p>
      *  de la clase DataAccess (clase padre)
      */
     private function loadFields() {}
     
     /**
      * Carga todos los campos de la Collection de la Clase DataAccess (clase padre) <p>
      *  a la clase hija
      */
     private function loadAnObjects() {}
}

?>
