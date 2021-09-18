<?php
include_once "../database/Conection.php";

class Nota{
    private $id;
    private $titulo;
    private $nota;
    private $creada;
    private $id_usuario;

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
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $nota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
    }

    /**
     * @return mixed
     */
    public function getCreada()
    {
        return $this->creada;
    }

    /**
     * @param mixed $creada
     */
    public function setCreada($creada)
    {
        $this->creada = $creada;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    // Métodos de funcionalidad
    public function showAllNotes(){
        try{
            $conn = conexion();
            $stmt = $conn->prepare("SELECT * FROM notas WHERE id_usuario =?");
            $stmt->bind_param('i', $this->id_usuario);
            $stmt->execute();
            $res = $stmt->get_result();
            if($res){
                return $res;
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

    public function showOneNote(){
        try{
            $conn = conexion();
            $stmt = $conn->prepare("SELECT * FROM notas WHERE id =?");
            $stmt->bind_param('i', $this->id);
            $stmt->execute();
            $res = $stmt->get_result();
            $res = $res->fetch_assoc();
            if($res){
                return $res;
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

    public function deleteNote(){
        try{
            $conn = conexion();
            $stmt = $conn->prepare("DELETE FROM notas WHERE id =?");
            $stmt->bind_param('i', $this->id);
            $stmt->execute();
            if($stmt->affected_rows > 0){
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
    public function addNote(){
        try{
            $conn = conexion();
            $stmt = $conn->prepare("INSERT INTO notas (titulo, nota, id_usuario) values (?,?,?)");
            $stmt->bind_param('ssi', $this->titulo,$this->nota,$this->id_usuario);
            $stmt->execute();
            if($stmt->affected_rows > 0){
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

    public function editNote(){
        try{
            $conn = conexion();
            $stmt = $conn->prepare("UPDATE notas SET titulo = ?, nota = ? WHERE id = ?");
            $stmt->bind_param('ssi', $this->titulo,$this->nota,$this->id);
            $stmt->execute();
            if($stmt->affected_rows > 0){
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