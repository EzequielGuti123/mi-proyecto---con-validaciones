<?php
echo "Iniciando carga de plantilla...";
require_once "controladores/controlador.php";
echo "Archivo controlador.php cargado";
$plantilla = new PlantillaControlador();
$plantilla -> CargarPlantilla();
?>