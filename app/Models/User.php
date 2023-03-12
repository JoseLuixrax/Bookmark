<?php
namespace App\Models;

class User extends DBAbstractModel
{
    private $id;
    private $nombre;
    private $user;
    private $psw;
    private $email;
    private $perfil;
    private $bloqueado;

    private static $instancia;
    public static function getInstancia()
    {
        if(!isset(self::$instancia)){
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    public function get(){
        $this->query = "SELECT * FROM usuarios where id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function blockUser(){
        $this->query = "UPDATE usuarios set bloqueado = 1 where id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario bloqueado exitosamente';
    }

    public function unblockUser(){
        $this->query = "UPDATE usuarios set bloqueado = 0 where id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario desbloqueado exitosamente';
    }

    public function getBlockedUsers(){
        $this->query = "SELECT * FROM usuarios where bloqueado = 1";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set(){
        $this->query = "INSERT INTO usuarios (nombre,user,psw,email,perfil,bloqueado) VALUES (:nombre,:user,:psw,:email,:perfil,:bloqueado)";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['user'] = $this->user;
        $this->parametros['psw'] = $this->psw;
        $this->parametros['email'] = $this->email;
        $this->parametros['perfil'] = $this->perfil;
        $this->parametros['bloqueado'] = $this->bloqueado;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario agregado exitosamente';
    }

    public function delete(){
        $this->query = "DELETE FROM usuarios WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario eliminado exitosamente';
    }

    public function edit(){
        $this->query = "UPDATE usuarios SET nombre=:nombre, psw=:psw, email=:email WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['psw'] = $this->psw;
        $this->parametros['email'] = $this->email;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario editado exitosamente';
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setPassword($psw)
    {
        $this->psw = $psw;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }

    public function setBloqueado($bloqueado)
    {
        $this->bloqueado = $bloqueado;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->psw;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function getBloqueado()
    {
        return $this->bloqueado;
    }

    public function getByUserAndPass(){
        $this->query = "SELECT * FROM usuarios where user=:user and psw=:psw";
        $this->parametros['user'] = $this->user;
        $this->parametros['psw'] = $this->psw;
        $this->get_results_from_query();
        return $this->rows;
    }

}