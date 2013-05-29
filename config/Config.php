<?php

final class Config {

    private static $_data = null;

    private function __construct() {
        
    }

    /**
     * Obtains the given section of the config.ini file. If no section is specified, then the
     * entire configuration file is returned.
     * 
     * @param type $section the section to obtain from the config.ini file.
     * @return type array containing the selected section.
     * @throws Exception if the given section doesn't exist in the config.ini file.
     */
    public static function get_section($section = null) {
        if ($section === null) {
            return self::get_data();
        } else {
            self::get_data();
            if (array_key_exists($section, self::$_data)) {
                return self::$_data[$section];
            } else {
                throw new Exception('Section does not exists in the configuration file.');
            }
        }
    }
    
    public static function get_value($section, $key) {
        if ($section === null) {
            throw new Exception ('Must specify a section');
        }
        if ($key === null) {
            throw new Exception('Must specify a key');
        }
        
        $tempArray = self::get_section($section);
        
        if (array_key_exists($key, $tempArray)) {
            return $tempArray[$key];
        } else {
            throw new Exception('The key does not exists in the configuration file');
        }
    }

    private static function get_data() {
        if (self::$_data != null) {
            return self::$_data;
        } else {
            self::$_data = parse_ini_file("config.ini", true);
            return self::$_data;
        }
    }

}

?>
