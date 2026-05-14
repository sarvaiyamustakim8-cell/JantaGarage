<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice - Janta Garage</title>
    <style>
        @page { margin: 0; }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 13px;
            color: #334155;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
        .container {
            padding: 40px;
            position: relative;
        }
        /* Top Decorative Bar */
        .top-bar {
            height: 8px;
            background: linear-gradient(90deg, #1e40af 0%, #3b82f6 100%);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .header-table td {
            vertical-align: middle;
        }
        .brand-name {
            font-size: 28px;
            font-weight: 800;
            color: #1e40af;
            letter-spacing: -1px;
            text-transform: uppercase;
        }
        .brand-sub {
            font-size: 11px;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .invoice-title {
            text-align: right;
            font-size: 32px;
            font-weight: 900;
            color: #e2e8f0;
            margin: 0;
        }
        .invoice-details {
            text-align: right;
            font-size: 12px;
            color: #475569;
        }
        .info-section {
            margin-top: 40px;
            margin-bottom: 30px;
        }
        .info-box {
            padding: 15px;
            background: #f8fafc;
            border-radius: 8px;
        }
        .info-label {
            font-size: 10px;
            font-weight: bold;
            color: #94a3b8;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .info-content {
            font-size: 13px;
            font-weight: 600;
            color: #1e293b;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .paid { background: #dcfce7; color: #166534; }
        .pending { background: #fef9c3; color: #854d0e; }

        /* Items Table */
        .items-table {
            margin-top: 20px;
        }
        .items-table th {
            background: #1e293b;
            color: #ffffff;
            text-align: left;
            padding: 12px;
            font-size: 11px;
            text-transform: uppercase;
        }
        .items-table td {
            padding: 12px;
            border-bottom: 1px solid #f1f5f9;
        }
        .items-table tr:nth-child(even) {
            background: #fafafa;
        }
        
        /* Summary Section */
        .summary-wrapper {
            margin-top: 30px;
        }
        .total-table {
            width: 250px;
            float: right;
        }
        .total-table td {
            padding: 8px;
            font-size: 14px;
        }
        .grand-total {
            background: #1e40af;
            color: white;
            border-radius: 4px;
            font-weight: bold;
        }

        .footer {
            margin-top: 100px;
            text-align: center;
            border-top: 1px solid #f1f5f9;
            padding-top: 20px;
            color: #94a3b8;
        }
    </style>
</head>
<body>
    <div class="top-bar"></div>
    <div class="container">
        
        <!-- Header -->
        <table class="header-table">
            <tr>
                <td width="50%">
                    <img src="{{ public_path('images/Janta_Garage_Logo.jpg') }}" width="70" style="margin-bottom:10px;">
                    <div class="brand-name">Janta Garage</div>
                    <div class="brand-sub">People Come. Repairs Happen.</div>
                </td>
                <td width="50%">
                    <h1 class="invoice-title">INVOICE</h1>
                    <div class="invoice-details">
                        <b>Invoice No:</b> #{{ $invoice->id }}<br>
                        <b>Date:</b> {{ $invoice->created_at->format('d M, Y') }}<br>
                        <b>Time:</b> {{ $invoice->created_at->format('h:i A') }}
                    </div>
                </td>
            </tr>
        </table>

        <!-- Client & Business Info -->
        <table class="info-section">
            <tr>
                <td width="48%">
                    <div class="info-box">
                        <div class="info-label">Customer Details</div>
                        <div class="info-content">{{ $invoice->name }}</div>
                        <div style="font-size:12px; color:#64748b;">
                            {{ $invoice->email }}<br>
                            {{ $invoice->contact }}
                        </div>
                        <div style="margin-top: 8px;">
                            @if($invoice->status=='paid')
                                <span class="status-badge paid">Payment Received</span>
                            @else
                                <span class="status-badge pending">Payment Pending</span>
                            @endif
                        </div>
                    </div>
                </td>
                <td width="4%"></td>
                <td width="48%">
                    <div class="info-box">
                        <div class="info-label">Service Provider</div>
                        <div class="info-content">Irshad Sarvaiya</div>
                        <div style="font-size:12px; color:#64748b;">
                            +91 95749 99860<br>
                            jantagarage@gmail.com<br>
                            Savarkundla, Gujarat
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <!-- Services Table -->
        @php
            $services = json_decode($invoice->services, true);
            $total = 0;
        @endphp

        <table class="items-table">
            <thead>
                <tr>
                    <th width="10%">#</th>
                    <th width="65%">Service Description</th>
                    <th width="25%" style="text-align: right;">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $key => $item)
                @php
                    $rate = is_array($item) ? ($item['price'] ?? 0) : 0;
                    $total += $rate;
                @endphp
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td style="font-weight: 500;">{{ is_array($item) ? $item['name'] : 'Service' }}</td>
                    <td style="text-align: right; font-weight: 600;">Rs. {{ number_format($rate, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Totals -->
        <div class="summary-wrapper">
            <table class="total-table">
                <tr>
                    <td style="color: #64748b;">Subtotal</td>
                    <td style="text-align: right;">Rs. {{ number_format($total, 2) }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 0;"><hr style="border: none; border-top: 1px solid #f1f5f9;"></td>
                </tr>
                <tr class="grand-total">
                    <td>Total Amount</td>
                    <td style="text-align: right;">Rs. {{ number_format($total, 2) }}</td>
                </tr>
            </table>
            <div style="clear: both;"></div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="font-weight: bold; color: #1e293b; margin-bottom: 4px;">Thank you for your business!</p>
            <p style="margin: 0;">Fast Service • Trusted Work • Customer Satisfaction</p>
        </div>
    </div>
</body>
</html>