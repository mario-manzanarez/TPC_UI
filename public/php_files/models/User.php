<?php
include_once "../database/Conection.php";
class User{
    private $id;
    private $nombre;
    private $user;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    //Consultar si un usuario se puede loggear
    public function login($user,$pass){
        try{
            $conn = conexion();
            $stmt = $conn->prepare("SELECT id,nombre FROM usuarios where usuario = ? and pass = ?");
            $stmt->bind_param('ss',$user,$pass);
            $stmt->execute();
            $res =$stmt->get_result();
            $res = $res->fetch_assoc();
            if($res){
                session_start();
                $_SESSION["id"]=$res['id'];
                $_SESSION['nombre'] = $res['nombre'];

                return true;
            }else{
                return false;
            }
        }catch (Exception $e){
            $e->getMessage();
        } finally {
            $conn->close();
            $stmt->close();
        }
    }


}
