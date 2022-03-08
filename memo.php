

<?php


require('fpdf/fpdf.php');

 header('Content-Type: text/html; charset=ISO-8859-1');

header("Content-type:application/vnd.ms-word; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=contactos.doc");
date_default_timezone_set('America/Lima');
$name_file='Contacto-'.(date('d-m-Y-H:i:s')).'.pdf';

class PDF extends FPDF
{
// Cabecera de página
 function Header(){
   
   $this->Image('./logo.png','10',5,20);
    // Arial bold 15

    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(1);
    // Título


    // $this->Ln();  //salto de linea entre parrafos
    //  $this->SetFont('Arial','B',10);
    // $this->Cell(148,3,'FOREST',0,0,'R');
    //  $this->Ln();
    //  $this->SetFont('Arial','B',8);
    // $this->Cell(180,3,'Programa de cooperacion tecnica ',0,0,'R');
    // $this->Ln();
    // $this->Cell(164,3,'tecnica de USAID y el ',0,0,'R');
    // $this->Ln();
    // $this->Cell(174,3,'servicio forestal de los EE UU',0,0,'R');
    // Salto de línea
    // $this->Ln(20);
    // $this->Cell(45,10,'apellido',1,0,'C',0);
    // $this->Cell(60,10,'nombre',1,0,'C',0);
    // $this->Cell(95,10,'cargo',1,0,'C',0);
    // $this->Cell(35,10,'correo',1,0,'C',0);
    // $this->Cell(35,10,'telefono',1,0,'C',0);

    // $this->Cell(30,10,'institucion',1,1,'C',0);



}


// Pie de página
function Footer(){
    // Posición: a 1,5 cm del final
    $this->SetY(-20);
  
    // Arial italic 8
    $this->SetFont('Arial','I',8);
 
   $this-> Write('4','FOREST,programa de cooperacion tecnica de USAID                                                                                                                             www.forest.pe');
   $this->Ln();
   $this->  Write('4', ' y el SERVICIO FORESTAL  de los Estados Unidos                                                                                                                                  forest/peru');
   $this->Ln();
   $this-> Write('4','Calle Amador Merino Reyna 339 OF 70IA,San Isidro');





   // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');



  
}
}

$pdf = new PDF('P','mm','A4'); //formato de la pagina de la cabecera y pie de pagina //
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$id=$_GET["id"];
require_once "Modelos/ConexionBD.php";
$data=ConexionBD::cBD()->query("SELECT * FROM consultores where id=$id"); 


// foreach ($data as $row) {
//     $pdf->Cell(45,10, utf8_decode($row['apellido']),1,0,'C',0);
//     $pdf->Cell(45,10, utf8_decode($row['nombre']),1,0,'C',0);
//     $pdf->Cell(60,10, utf8_decode($row['cargo']),1,0,'C',0);
//     $pdf->Cell(60,10, utf8_decode(strtolower($row['correo'])),1,0,'C',0);
//     $pdf->Cell(35,10,$row['telefono'],1,0,'C',0);
//     $pdf->Cell(30,10,$row['institucion'],1,1,'C',0);
// }


$pdf->MultiCell(177,6, utf8_decode('El que suscribe, Encargado(a) del Departamento de Titulación del CECyTE. Hace constar que el (a) C. '.utf8_decode($data['nombre']).', con Clave ').utf8_decode($data['apellido']). utf8_decode('; concluyó sus actividades en la empresa ').utf8_decode($data['cargo'].', de la ciudad de  '.$data['telefono']). utf8_decode('; con un salario base de ').utf8_decode(strtolower($data['correo'])) ,0,'J');




$pdf->Output('I',$name_file);
?>*/

