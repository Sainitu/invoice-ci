<?php defined('BASEPATH') OR exit('No direct script access allowed');
// Dompdf namespace use Dompdf\Dompdf;
// die(dirname(__FILE__));
// require_once(dirname(__FILE__) . '../../vendor/autoload.php');
class Pdf
{   
    
    public function __construct(){
        require_once('E:\xampp\htdocs\admin-template\vendor\autoload.php');
        $pdf = new Dompdf\DOMPDF(); 
        $CI = & get_instance();
        $CI->dompdf = $pdf; 
    } 
//     function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='portrait'){
//         $dompdf = new Dompdf\DOMPDF();
//         $dompdf->load_html($html);
//         $dompdf->set_paper($paper, $orientation);
//         $dompdf->render();
//         if($download){
//             $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
//             }
//         else 
//         {
//             $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
//         } 
//        // $dompdf->stream("print.php", array("Attachment"=>1)); 
    
    
// } 
}
?>