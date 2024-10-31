<?php
session_start();
require_once 'views/modulos/header.php';

$ruta = isset($_GET['ruta']) ? $_GET['ruta'] : null;

if (!empty($ruta)) {
	$ruta = ltrim($ruta, "/");
}

if (isset($_SESSION['token'])) {
	if (isset($_SESSION['rol'])) {
		if (isset($ruta)) {
			if (
				$_GET['ruta'] == "dashboard" ||
				$_GET['ruta'] == "empresa"	||
				$_GET['ruta'] == "locales" ||
				$_GET['ruta'] == "correlativos" ||
				$_GET['ruta'] == "ordenes-trabajo" ||
				$_GET['ruta'] == "nueva-orden-trabajo" ||
				$_GET['ruta'] == "actualizar-orden-trabajo" ||
				$_GET['ruta'] == "facturar-orden" ||
				$_GET['ruta'] == "facturaciones" ||
				$_GET['ruta'] == "boletas" ||
				$_GET['ruta'] == "notas-de-creditos" ||
				$_GET['ruta'] == "nota-credito" ||
				$_GET['ruta'] == "clientes" ||
				$_GET['ruta'] == "proveedores" ||
				$_GET['ruta'] == "personal" ||				
				$_GET['ruta'] == "productos-stock" ||
				$_GET['ruta'] == "productos-fabricacion" ||
				$_GET['ruta'] == "reposicion-stock" ||
				$_GET['ruta'] == "reposicion-fabricacion" ||
				$_GET['ruta'] == "salidas-stock" ||
				$_GET['ruta'] == "almacen-stock" ||
				$_GET['ruta'] == "almacen-fabricacion" ||
				$_GET['ruta'] == "ticket" ||				
				$_GET['ruta'] == "generales" ||
				$_GET['ruta'] == "productos" ||
				$_GET['ruta'] == "roles" ||
				$_GET['ruta'] == "sedes" ||
				$_GET['ruta'] == "documentos-sunat" ||
				$_GET['ruta'] == "logout"
			) {
				include_once "views/modulos/" . $_GET['ruta'] . ".php";
			} else {
				echo '<script>location.href ="dashboard";</script>';
			}
		} else {
			echo '<script>location.href ="dashboard";</script>';
		}
	}
} else {
	if (isset($ruta)) {
		if (
			$ruta == "login" ||
			$ruta == "cambiar-contraseña"
		) {
			include_once "views/modulos/" . $ruta . ".php";
		} else {
			echo '<script>location.href ="login";</script>';
		}
	} else {
		echo '<script>location.href ="login";</script>';
	}
}
require_once 'views/modulos/footer.php';
