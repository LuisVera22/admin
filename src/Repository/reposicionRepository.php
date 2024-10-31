<?php
require_once '../../src/Model/reposicionModel.php';
require_once '../../src/Interface/reposicionInterface.php';

class ReposicionRepository implements ReposicionInterface
{
    static public function mostrarReposicion($manufactura,$store)
    {
        return ReposicionModel::getReposicion($manufactura,$store);
    }
    static public function mostrarIdReposicion($param)
    {
        return ReposicionModel::getReposicionId($param);
    }
    static public function guardarReposicion($reposicion)
    {
        return $reposicion->postReposicion();
    }
    static public function eliminarReposicion($param,$param2,$param3,$enabled)
    {
        return ReposicionModel::deleteReposicion($param,$param2,$param3,$enabled);
    }
    static public function listarReposicionxManufactura($manufactura)
    {
        return ReposicionModel::getReposicionxManufactura($manufactura);
    }
}
