<?php

// biasanya: user= root, password dikosongkan

$conn = new mysqli("localhost", "root", '', "usuarios");

if ($conn->connect_errno) {
  die('eror' . $conn->error);
}

ob_start();

// Include classes
include_once('tbs_class.php'); // Load the TinyButStrong template engine
include_once('plugins/tbs_plugin_opentbs.php'); // Load the OpenTBS plugin

$TBS = new clsTinyButStrong; // new instance of TBS
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

// ------------------------------
// Datos de Preparar con antelación
// ------------------------------
// $parameter1 = $_GET['param1'];
//$parameter1 = base64_decode($_GET['param1']);

//para traer la base de datos//
// $id=$_GET["id"];
// require_once "Modelos/ConexionBD.php";
// $data=ConexionBD::cBD()->query("SELECT * FROM consultores where id=$id"); 

$id=$_GET["id"];

$query1 = $conn->query("SELECT * FROM consultores WHERE id='$id'");

$data = array();
while ($getdata = $query1->fetch_assoc()){
    //@$i++;
	//$data['no'] = $i;
	$data[]=$getdata;
}

// datos personales de la empresa //


// $datawaktu = array('tanggal' => '15 juni 2021');
// $dataname = array('nama' => 'Muhammad Fatur Rohima Kaharunia');
// $datanim = array('nim' => '1903040006');
///



date_default_timezone_set('America/Bogota');

setlocale(LC_ALL, 'spanish');
$fecha= strftime("%A, %d de %B de %Y");  //obtener la fecha actual de 
 

$template = 'consultores2.docx';
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // Also merge some [onload] automatic fields (depends of the type of
// Merge data in the body of the document




$TBS->MergeBlock('data', $data);
// $TBS->MergeField('waktu', $datawaktu);
// $TBS->MergeField('name', $dataname);
// $TBS->MergeField('nim', $datanim);

   $TBS->MergeField('fecha', $fecha);


// -----------------
// Output the result
// -----------------

// $TBS->Show(OPENTBS_DOWNLOAD, 'hasil.xlsx');
// exit();


 $TBS->PlugIn(OPENTBS_DELETE_COMMENTS);

    $save_as = (isset($_POST['save_as']) && (trim($_POST['save_as'])!=='') && ($_SERVER['SERVER_NAME']=='localhost')) ? trim($_POST['save_as']) : '';
    $output_file_name = str_replace('.', '_'.date('Y-m-d').$save_as.'.', $template);
    if ($save_as==='') {
        $TBS->Show(OPENTBS_DOWNLOAD, $output_file_name); 
        exit();
    } else {
        $TBS->Show(OPENTBS_FILE, $output_file_name);
        exit("File [$output_file_name] has been created.");
    }

    ?>