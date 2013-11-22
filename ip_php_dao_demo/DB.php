<?php
    class DB {
        private $dbHost;
        private $dbName;
        private $dbUser;
        private $dbPassword;

        function __construct($dbHost, $dbName, $dbUser, $dbPassword) {
            $this->dbHost=$dbHost;
            $this->dbName=$dbName;
            $this->dbUser=$dbUser;
            $this->dbPassword=$dbPassword;
        }

        function createConnexion() {
            return new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", 
                        $this->dbUser, $this->dbPassword);
        }
    }
?>
