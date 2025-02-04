<?php
session_start();

// Establecer el idioma por defecto como español
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'es';
}

// Si se ha pasado un idioma a través de la URL, cambiar el idioma
if (isset($_GET['lang']) && ($_GET['lang'] == 'es' || $_GET['lang'] == 'en')) {
    $_SESSION['lang'] = $_GET['lang'];
}

// Cargar el archivo de idioma correspondiente
include("idioma_".$_SESSION['lang'].".php");
 
