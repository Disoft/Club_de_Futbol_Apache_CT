<?php
/**
 * Esta clase es utilizada para las relaciones entre clases modelos <p>
 * del tipo de relacion uno a uno.
 * @package persistence
 * @version 1.0
 * @author Luis Alberto Vega <vla200632213@gmail.com>
 */

class OneToOne {
    
    /**
     * @var string 
     */
    private $classModel;
    
    
    private $foreignKey;
    
    public function __construct($classModel, $foreingKey) {
        $this->classModel = $classModel;
        $this->foreignKey = $foreingKey;
    }
    
    /**
     * Retorna el nombre de la clase Model que tiene relacion<p>
     * de uno a uno, con las clase que lo contiene.
     * @return string
     */
    public function getClassModel() {
        return $this->classModel;
    }

    /**
     * Retorna el nombre de la llave primaria de la clase <p>
     *  que tiene relacion de uno a uno, con las clase que lo contiene.
     * @return string
     */
    public function getForeignKey() {
        return $this->foreignKey;
    }

}

?>
