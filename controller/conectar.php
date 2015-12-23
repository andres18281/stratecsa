
<?php
 
 
/**
 * Clase para acceso a datos
 * @package dbAccess
 */

  class Conectar{
             
        //atributos
        public $host;
        public $user;
        public $pass; 
        public $mysqli;
        public $db;
	      public $array = array();
  
        public function __construct($user,$pass){
                $this->host = "localhost";//"190.84.233.180";
                $this->user = "user_admin";
                $this->pass = "claudio2015";
                $this->db = "stra_credenciales";   

        }

        public function connect(){             
           return $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);   
        }


        public function inserta($tablas,$params = array()){

            $array = array("mensaje"=>"Hay un problema interno que debe solucionarse");

            if($this->connect()){
             if(isset($tablas)){
                //  $inserta = 'INSERT INTO '.$tablas.' ('.implode("','",array_keys($parametros)).'") VALUES ("'.implode("','",$parametros).'")"';
                $inserta = 'INSERT INTO `'.$tablas.'` (`'.implode('`, `',array_keys($params)).'`) VALUES ("' . implode('", "', $params) . '")';

                $insercion = $this->mysqli->query($inserta);
                if($insercion){
                    $array = array("exito"=>"Insercion con exito",
                                   "last_cod_id"=>$this->mysqli->insert_id,
                                   "mensaje"=>"Si inserto");
                }else{
                    $array = array("error"=>$this->mysqli->errno);
                }
              }
            }else{
             $array = array("mensaje"=>"No se pudo conectar a la base de datos, intentelo de nuevo");
            }
            return $array;
        }


        public function consultas($sql){
           if($this->connect()){
              if($result = $this->mysqli->query($sql)){
                    if($result->num_rows == 1){
                        $row = $result->fetch_array(MYSQL_NUM);
                        $this->close_conection();
                        return $row;    
                    }elseif($result->num_rows > 1){
                      while($row = $result->fetch_array(MYSQL_NUM)){
                       // $array = Array("codigo"=>$row);
                        $array_[] = $row;
                      }
                      $this->close_conection();
                      return $array_;
                        
                    //$this->mysqli->free_result($result);
                    }else{
                //  $this->close_conection();
                      return null;
                    }
           }
        }
      }

      public function consulta_usuario($root,$pass){
        if($this->connect()){
              $sql = 'SELECT cli.User_name,cli.Users_email,cli.Users_contrase,user.id_user_,user.pass_ 
                      FROM users_admin232 cli
                      INNER JOIN user_mysql_sdsq user ON user.id_auto = cli.User_tip
                      WHERE Users_email ="'.$root.'"
                      AND Users_contrase = "'.$pass.'"';
              if($result = $this->mysqli->query($sql)){
                if($result->num_rows == 1){
                  $row = $result->fetch_array(MYSQL_NUM);
                  $this->close_conection();
                  return $row;    
                }else{
                //  $this->close_conection();
                  return null;
                }
              }
        }
      }

      public function update_query($query){
        $salida = array("error"=> "Problemas al actualizar datos.");
   
        if($this->connect()){
           if($this->mysqli->query($query)){
              $salida = array("mensaje"=> "Datos actualizados con exito\n Filas afectadas: ".$this->mysqli->affected_rows,
                              "exito"=>"Actualizacion con exito");                     
           }else{
              $salida = array("error"=>"Problemas, no hay actualizacion",
                              "codigo"=>$this->mysqli->errno);
           }
            return $salida;    
        }
      }

      function encriptar($contrasena, $numero = 7){
        $salt = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz./';
        $saltc = sprintf('$2y$%02d$', $numero);
        for($i = 0; $i < 22; $i++)
          $saltc .= $salt[ rand(0, strlen($salt)-1) ];
          return crypt($contrasena, $saltc);
      }

      public function close_conection(){
          $this->mysqli->close();
      }

      public function sanitize($val){
        return $this->mysqli->real_escape_string($val);                  
      } 


}


 
?>
























 