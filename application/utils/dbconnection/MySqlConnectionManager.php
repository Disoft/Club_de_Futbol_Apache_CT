<?php

class MySqlConnectionManager {

    private $_host;
    private $_user;
    private $_password;
    private $_database;
    private $_connection;

    public function __construct($configSection) {
        $config = Config::get_section($configSection);
        $this->validateConfig($config);
        $this->_host = $config['host'];
        $this->_user = $config['user'];
        $this->_password = $config['password'];
        $this->_database = $config['database'];
    }

    private function validateConfig($config_array) {
        if (!array_key_exists('host', $config_array)) {
            throw new Exception('Host data not found in configuration file.');
        }
        if (!array_key_exists('user', $config_array)) {
            throw new Exception('User data not found in configuration file.');
        }
        if (!array_key_exists('password', $config_array)) {
            throw new Exception('Password data not found in configuration file.');
        }
        if (!array_key_exists('database', $config_array)) {
            throw new Exception('Database data not found in configuration file.');
        }
    }

    public function connect($debugMode = false) {
        $this->_connection = NewADOConnection('mysql');
        if ($debugMode === true) {
            $this->_connection->debug = true;
        }
        $this->_connection->PConnect($this->_host, $this->_user, $this->_password, $this->_database);
    }

    public function disconnect() {
        $this->_connection->Close();
    }

    public function executeSql($sql) {
        $this->_connection->Execute($sql);
    }

    public function execute_query($sql) {
        return $this->_connection->Execute($sql);
    }

}
?>