<?php

namespace App\config;

    use Symfony\Component\Config\Definition\Exception\Exception;

    class DataBase {
        protected $dbhost = DB_HOST;
        protected $dbuser = DB_USER;
        protected $dbpass = DB_PASSWORD;
        protected $dbname = DB_NAME;
        private $conn = null;
        private $transaccion=false;
        public $queryID = "";
        public function __construct(){
            $this->transaccion=false;
            $this->open_connect();
        }
        private function open_connect(){
            if (!($this->conn = mysqli_connect ($this->dbhost, $this->dbuser, $this->dbpass))) {
                throw new Exception("Error en la conexion de base de datos");
            }else if(!mysqli_select_db($this->conn,$this->dbname)){
                throw new Exception("Error al seleccionar la base de datos ". mysqli_error($this->conn));
            }else if(!mysqli_set_charset($this->conn,'utf8')){
                throw new Exception("Error al cambiar la codificación".  mysqli_error($this->conn));
            }
        }

        private function close_connect(){
            $this->conn->close();
        }

        public function find($query){
            $rows = array();
            $this->open_connect();
            if ($result = $this->conn->query($query)){
                while ($rows[] = $result->fetch_assoc());
                array_pop($rows);
                $result->close();
                $this->close_connect();
            }

            return $rows;
        }

        public function query($query){
            $this->open_connect();
            $flag = true;
            if(!@mysqli_query($this->conn, $query)){
                throw new Exception("Error al insertar datos:\n".
                $this->conn->error."\n".$query,1);
                $flag = false;
            }else{
                $id = @mysqli_insert_id($this->conn);
                if($id != 0){
                    $this->queryID = $id;
                }
                $flag = true;
            }
            $this->close_connect();
            return $flag;
        }
        public function getLastInsert(){
            return $this->queryID;
        }
        public function beginTransaction(){
            if (!$this->conn) {
                $this->open_connect();
            }
            //Desactivar la confirmación automática
            $this->conn->autocommit(false);
            $this->transaccion=true;
            // $flag = true;
            // $query="BEGIN";
            // if(!@mysqli_query($this->conn, $query)){
            //     $flag = false;
            //     throw new Exception("Error al insertar datos:\n".
            //     $this->conn->error."\n".$query,1);
            // }else{
            //     // Turn autocommit off
            //     $id = @mysqli_insert_id($this->conn);
            //     if($id != 0){
            //         $this->id = $id;
            //     }
            //     $flag = true;
            // }
            // return $flag;

        }
        public function commitTransaction(){
            if (!$this->conn) {
                $this->open_connect();
            }
            $flag = true;
            if (!@$this->conn->commit()) {
                throw new Exception("Error al realizar commit:\n".$this->conn->error,1);
                $flag = false;
            }
            else{
                $id = @mysqli_insert_id($this->conn);
                if($id != 0){
                    $this->id = $id;
                }
                $flag = true;
                $this->transaccion=false;
            }
            $this->close_connect();
            return $flag;
        }
        public function rollbackTransaction(){
            if (!$this->conn) {
                $this->open_connect();
            }
            $flag = true;
            if (!@$this->conn->rollback()) {
                throw new Exception("Error al realizar rollback:\n".$this->conn->error,1);
                $flag = false;
            }
            else{
                $id = @mysqli_insert_id($this->conn);
                if($id != 0){
                    $this->id = $id;
                }
                $flag = true;
                $this->transaccion=false;
            }
            $this->close_connect();
            return $flag;
        }

        public function tFind($query){
            $rows = array();
            if ($result = $this->conn->query($query)){
                while ($rows[] = $result->fetch_assoc());
                array_pop($rows);
                $result->close();
            }

            return $rows;
        }
        public function tQuery($query){
            $flag = true;
            if(!@mysqli_query($this->conn, $query)){
                throw new Exception("Error al insertar datos:\n".
                $this->conn->error."\n".$query,1);
                $flag = false;
            }else{
                $id = @mysqli_insert_id($this->conn);
                if($id != 0){
                    $this->queryID = $id;
                }
                $flag = true;
            }
            return $flag;
        }
    }
