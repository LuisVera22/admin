<?php
class ReposicionController
{
    static public function mostrarReposicion($idmanufactura,$idstore)
    {
        return ReposicionRepository::mostrarReposicion($idmanufactura,$idstore);
    }
    static public function mostrarIdReposicion($param)
    {
        return ReposicionRepository::mostrarIdReposicion($param);
    }
    static public function guardarReposicion($reposicion)
    {
        return ReposicionRepository::guardarReposicion($reposicion);
    }
    static public function eliminarReposicion($param,$param2,$param3,$enabled)
    {
        return ReposicionRepository::eliminarReposicion($param,$param2,$param3,$enabled);
    }
    static public function listarReposicionxManufactura($manufactura)
    {
        return ReposicionRepository::listarReposicionxManufactura($manufactura);
    }
}