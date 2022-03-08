<?php

//con esto jalamos los controladores y sus modelos //

require_once "Controladores/plantillaC.php";

require_once "Controladores/secretariasC.php";

require_once "Modelos/secretariasM.php";

require_once "Controladores/funcionariosC.php";

require_once "Modelos/funcionariosM.php";

require_once "Controladores/historialC.php";

require_once "Modelos/historialM.php";

require_once "Controladores/archivosC.php";

require_once "Modelos/archivosM.php";

require_once "Controladores/carpetasC.php";

require_once "Modelos/carpetasM.php";

$plantilla =new Plantilla();
$plantilla->LlamarPlantilla();