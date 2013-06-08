<?php
/**
 * @package persistence
 * @version 1.0
 * @author Luis Alberto Vega <vla200632213@gmail.com>
 */

interface IEntity {
    
    /**
     * save in the Data Base the fields of Class 
     */
    public function save();
    
    /**
     * update in the Data Base the fields of Class 
     */
    public function update();
    
     /**
     * delete of the Data Base the Class 
     */
    public function remove();
    
     /**
      * Return a the collection of All the object this Class
      */
     public function findAll();
    
     /**
      * Return the object of the Class
      */
     public function find($id = 100000);
     
}

?>
