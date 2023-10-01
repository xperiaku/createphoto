<?php

include '../components/connect.php';
require_once '../dompdf/vendor/autoload.php'; // Load composer autoload file

use Dompdf\Dompdf;

// Get filter parameters from URL
$from = $_GET['from'];
$to = $_GET['to'];
$payment_status = 'completed';

// Prepare SQL statement with filter parameters
$select_orders = $conn->prepare("SELECT * FROM `orders` WHERE placed_on BETWEEN ? AND ? AND payment_status = ?");
$select_orders->execute([$from, $to, $payment_status]);

// Create HTML table with filtered orders
$html = '<html><head><style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style></head><body>';
$html .= '<center><h1>Undangan Yang Telah Terjual</h1></center>';
$html .= '<center><h3>' . $from . ' sampai ' . $to . '</h3></center>';
$html .= '<table>';
$html .= '<thead><tr><th>No</th><th>Tanggal</th><th>Nama</th><th>Jumlah</th><th>Total Harga</th><th>Harga Promo</th><th>Status</th></tr></thead>';
$html .= '<tbody>';
$total_price = 0;
$no = 1;
while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
    $html .= '<tr>';
    $html .= '<td>' . $no++ . '</td>';
    $html .= '<td>' . $fetch_orders['placed_on'] . '</td>';
    $html .= '<td>' . $fetch_orders['name'] . '</td>';
    $html .= '<td>' . $fetch_orders['total_products'] . '</td>';
    $html .= '<td>' . 'Rp ' . number_format($fetch_orders['total_price'], 0, ',', '.') . '</td>';
    $html .= '<td>' . 'Rp ' . number_format($fetch_orders['grand_total'], 0, ',', '.') . '</td>';
    $html .= '<td>' . $fetch_orders['payment_status'] . '</td>';
    $html .= '</tr>';
    $total_price += $fetch_orders['total_price'];
}
$html .= '<tfoot><tr><td colspan="4" style="text-align: center;"><strong>Total Harga:</strong></td><td colspan="3" style="text-align: center;">Rp ' . number_format($total_price, 0, ',', '.') . '</td></tr></tfoot>';
$html .= '</tbody></table>';
$html .= '</body></html>';

// Create new PDF document
$dompdf = new Dompdf();

// Load HTML into PDF document
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render PDF document
$dompdf->render();

// Output PDF document
$dompdf->stream("Semua Produk yang Terjual dari " . $from . " sampai " . $to . ".pdf");
