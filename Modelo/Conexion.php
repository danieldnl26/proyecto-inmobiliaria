<?php 
    abstract class conexion {
        public $isConnected;
        protected $datab;
        private $username = "root";
        private $password = "";
        private $host = "localhost";
        private $dbname = "consignataria";

        # métodos abstractos para ABM de clases que hereden 
        abstract protected static function buscarForId($id);
	abstract protected static function buscar($query);
        abstract protected static function getAll();
        abstract protected function insertar();
        abstract protected function editar();
        abstract protected function eliminar();
        abstract protected static function selectAll();

        public function __construct(){
            $this->isConnected = true;
            try { 
                $this->datab = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); 
                $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }catch(PDOException $e) { 
                $this->isConnected = false;
                throw new Exception($e->getMessage());
            }
        }
        
        //disconnecting from database
        //$database->Disconnect();
        public function Disconnect(){
            $this->datab = null;
            $this->isConnected = false;
        }
        
        //Getting row
        //$getrow = $database->getRow("SELECT email, username FROM users WHERE username =?", array("yusaf"));
        public function getRow($query, $params=array()){
            try{ 
                $stmt = $this->datab->prepare($query); 
                $stmt->execute($params);
                return $stmt->fetch();  
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        
        //Getting multiple rows
        //$getrows = $database->getRows("SELECT id, username FROM users");
        public function getRows($query, $params=array()){
            try{ 
                $stmt = $this->datab->prepare($query); 
                $stmt->execute($params);
                return $stmt->fetchAll();       
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }       
        }
        
        //inserting un campo
        //$insertrow = $database ->insertRow("INSERT INTO users (username, email) VALUES (?, ?)", array("yusaf", "yusaf@email.com"));
        public function insertRow($query, $params){
            try{ 
                $stmt = $this->datab->prepare($query); 
                $stmt->execute($params);
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }           
        }
        
        //updating existing row           
        //$updaterow = $database->updateRow("UPDATE users SET username = ?, email = ? WHERE id = ?", array("yusafk", "yusafk@email.com", "1"));
        public function updateRow($query, $params){
            return $this->insertRow($query, $params);
        }
        
        //delete a row
        //$deleterow = $database->deleteRow("DELETE FROM users WHERE id = ?", array("1"));
        public function deleteRow($query, $params){
            return $this->insertRow($query, $params);
        }
    }
?>    
