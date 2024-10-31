<?php
class ClienteController
{
    static public function mostrarCliente(){
        return ClienteRepository::mostrarCliente();
    }
    static public function mostrarIdCliente($param)
    {
        return ClienteRepository::mostrarIdCliente($param);
    }
    static public function guardarCliente(ClienteModel $cliente)
    {
        return ClienteRepository::guardarCliente($cliente);
    }
    static public function actualizarCliente(ClienteModel $cliente)
    {
        return ClienteRepository::actualizarCliente($cliente);
    }
    static public function eliminarCliente($param,$enabled)
    {
        return ClienteRepository::eliminarCliente($param,$enabled);
    }
    static public function buscarDocumento($param)
    {
        return ClienteRepository::buscarDocumento($param);
    }
    static public function mostrarClientesActivos()
    {
        return ClienteRepository::mostrarClientesActivos();
    }
}
?>