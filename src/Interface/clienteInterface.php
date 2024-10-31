<?php
interface ClienteInterface
{
    static public function mostrarCliente();
    static public function mostrarIdCliente($param);
    static public function guardarCliente(ClienteModel $cliente);
    static public function actualizarCliente(ClienteModel $cliente);
    static public function eliminarCliente($param,$enabled);
    static public function buscarDocumento($param);
}
?>