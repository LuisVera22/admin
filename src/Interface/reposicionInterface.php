<?php
interface ReposicionInterface
{
    static public function mostrarReposicion($reposicion,$idmanufactura);
    static public function mostrarIdReposicion($param);
    static public function guardarReposicion(ReposicionModel $reposicion);
    static public function eliminarReposicion($param,$param2,$param3,$enabled);
    static public function listarReposicionxManufactura($manufactura);
}