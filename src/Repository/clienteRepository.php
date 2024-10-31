<?php
require_once '../../src/Model/clienteModel.php';
require_once '../../src/Interface/clienteInterface.php';

class ClienteRepository implements ClienteInterface
{
    static public function mostrarCliente()
    {
        return ClienteModel::getCliente();
    }
    static public function mostrarIdCliente($param)
    {
        return ClienteModel::getClienteId($param);
    }
    static public function guardarCliente(ClienteModel $cliente)
    {
        return $cliente->postCliente();
    }
    static public function actualizarCliente(ClienteModel $cliente)
    {
        return $cliente->putCliente();
    }
    static public function eliminarCliente($param,$enabled)
    {
        return ClienteModel::deleteCliente($param,$enabled);
    }
    static public function buscarDocumento($param)
    {
        return ClienteModel::getsearchDocumentosId($param);
    }
    static public function mostrarClientesActivos()
    {
        return ClienteModel::getClienteActivo();
    }
}
?>