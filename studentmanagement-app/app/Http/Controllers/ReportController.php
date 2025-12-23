<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function report1($pid)
    {
        $payment = Payment::findOrFail($pid);
        
        $print = "
        <style>
            body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; line-height: 1.6; }
            .receipt-container { width: 100%; max-width: 800px; margin: 0 auto; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
            .header { text-align: center; margin-bottom: 30px; }
            .header h1 { margin: 0; color: #2c3e50; font-size: 28px; text-transform: uppercase; letter-spacing: 2px; }
            .info-section { border-bottom: 2px solid #3498db; padding-bottom: 20px; margin-bottom: 20px; }
            .info-row { display: table; width: 100%; margin-bottom: 10px; }
            .info-col { display: table-cell; width: 50%; }
            .label { font-weight: bold; color: #7f8c8d; }
            .value { color: #2c3e50; font-weight: 600; }
            .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            .table th { background-color: #f8f9fa; color: #2c3e50; text-align: left; padding: 12px; border-bottom: 2px solid #dee2e6; }
            .table td { padding: 12px; border-bottom: 1px solid #dee2e6; vertical-align: middle; }
            .amount-section { margin-top: 30px; text-align: right; }
            .total { font-size: 24px; color: #e74c3c; font-weight: bold; }
            .footer { margin-top: 50px; text-align: center; font-size: 12px; color: #95a5a6; border-top: 1px solid #eee; padding-top: 20px; }
        </style>

        <div class='receipt-container'>
            <div class='header'>
                <h1>Student Management System</h1>
                <p>Payment Receipt</p>
            </div>

            <div class='info-section'>
                <table style='width: 100%;'>
                    <tr>
                        <td style='width: 50%;'>
                            <span class='label'>Receipt No:</span> <span class='value'>#{$pid}</span><br>
                            <span class='label'>Date:</span> <span class='value'>{$payment->paid_date}</span>
                        </td>
                        <td style='width: 50%; text-align: right;'>
                            <span class='label'>Enrollment No:</span> <span class='value'>" . ($payment->enrollment?->enroll_no ?? 'N/A') . "</span><br>
                            <span class='label'>Student Name:</span> <span class='value'>" . ($payment->enrollment?->student?->name ?? 'N/A') . "</span>
                        </td>
                    </tr>
                </table>
            </div>

            <table class='table'>
                <thead>
                    <tr>
                        <th>Description / Batch</th>
                        <th style='text-align: right;'>Amount (LKR)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>" . ($payment->enrollment?->batch?->name ?? 'Course Payment') . "</td>
                        <td style='text-align: right; font-weight: bold;'>LKR " . number_format($payment->amount, 2) . "</td>
                    </tr>
                </tbody>
            </table>

            <div class='amount-section'>
                <p style='margin-bottom: 5px;'>Total Amount Paid</p>
                <span class='total'>LKR " . number_format($payment->amount, 2) . "</span>
            </div>

            <div class='footer'>
                <p>Thank you for your payment!</p>
                <p>This is a computer-generated receipt. Printed on: " . date('Y-m-d H:i:s') . "</p>
            </div>
        </div>";
        
        if (ob_get_length()) ob_end_clean();

      
            $pdf = Pdf::loadHTML($print);
            return $pdf->stream('payment_receipt_' . $pid . '.pdf');
        
    }
}