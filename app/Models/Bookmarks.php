<?php 
namespace App\Models;

// require_once("vendor/autoload.php");
class Bookmarks extends DBAbstractModel
{
    private static $instancia;
    private $id;
    private $bm_url;
    private $descripcion;
    private $idUsuario;

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

    public function getAll(){
        $this->query = "SELECT * FROM bookmarks where idUsuario=:idUsuario";
        $this->parametros['idUsuario'] = $this->idUsuario;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getByName(){
        $this->query = "SELECT * FROM bookmarks where descripcion=:descripcion";
        $this->parametros['descripcion'] = $this->descripcion;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function get(){
        $this->query = "SELECT * FROM bookmarks where id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set(){
        $this->query = "INSERT INTO bookmarks (id, bm_url, descripcion, idUsuario) VALUES (:id, :bm_url, :descripcion, :idUsuario)";
        $this->parametros['id'] = $this->id;
        $this->parametros['bm_url'] = $this->bm_url;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['idUsuario'] = $this->idUsuario;
        $this->get_results_from_query();
        $this->mensaje = 'Bookmark agregado exitosamente';
    }

    public function edit(){
        $this->query = "UPDATE bookmarks SET bm_url=:bm_url, descripcion=:descripcion WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->parametros['bm_url'] = $this->bm_url;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->get_results_from_query();
        $this->mensaje = 'Bookmark actualizado exitosamente';
    }

    public function delete(){
        $this->query = "DELETE FROM bookmarks WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $this->mensaje = 'Bookmark eliminado exitosamente';
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getBm_url()
    {
        return $this->bm_url;
    }

    public function setBm_url($bm_url)
    {
        $this->bm_url = $bm_url;
    }   

    public function getDescripcion()
    {
        return $this->descripcion;
    }   

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }   
}