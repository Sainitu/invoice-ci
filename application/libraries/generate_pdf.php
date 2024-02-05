<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// include autoloader
require_once 'vendor/autoload.inc.php';


use Dompdf\Dompdf;

// Get the HTML content of the modal
$html = '<html><body>';
$html .= '<h1>Your Modal Content Goes Here</h1>';
// Add the content of the modal here
$html .= '</body></html>';

// Instantiate the Dompdf class
$dompdf = new Dompdf();

// Load HTML content
$dompdf->loadHtml($html);

// (Optional) Set the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF
$dompdf->stream("invoice.pdf");
?>