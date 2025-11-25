<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Print</title>

    <style>
        body {
            font-family: "Courier New", monospace;
            width: 280px;
            /* 80mm receipt */
            margin: 0 auto;
            background: #f6f6f6;
        }

        .receipt {
            background: white;
            padding: 20px;
            border: 1px solid #ddd;
        }

        h2,
        h3,
        p {
            text-align: center;
            margin: 3px 0;
        }

        .line {
            border-bottom: 1px dashed #000;
            margin: 8px 0;
        }

        table {
            width: 100%;
            font-size: 14px;
        }

        table tr td {
            padding: 4px 0;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        .total {
            font-size: 16px;
            font-weight: bold;
        }

        .btn-print {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: #6f4e37;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        @media print {
            .btn-print {
                display: none;
            }

            body {
                background: white;
            }

            .receipt {
                border: none;
            }
        }
    </style>
</head>

<body>

    <div class="receipt">

        <h2> Café House</h2>
        <p>#12, Phnom Penh, Cambodia</p>
        <p>Tel: 012-345-678</p>
        <div class="line"></div>

        <p>Receipt No: <strong>1025</strong></p>
        <p>Date: 2025-01-15 | Cashier: John</p>

        <div class="line"></div>

        <!-- Items Table -->
        <table>
            <tr>
                <td>Americano (2×)</td>
                <td class="right">$6.00</td>
            </tr>
            <tr>
                <td>Latte (1×)</td>
                <td class="right">$3.50</td>
            </tr>
            <tr>
                <td>Croissant (1×)</td>
                <td class="right">$1.50</td>
            </tr>
        </table>

        <div class="line"></div>

        <!-- Totals -->
        <table>
            <tr>
                <td>Subtotal</td>
                <td class="right">$11.00</td>
            </tr>
            <tr>
                <td>Tax (10%)</td>
                <td class="right">$1.10</td>
            </tr>
            <tr class="total">
                <td>Total</td>
                <td class="right">$12.10</td>
            </tr>
            <tr>
                <td>Cash</td>
                <td class="right">$20.00</td>
            </tr>
            <tr>
                <td>Change</td>
                <td class="right">$7.90</td>
            </tr>
        </table>

        <div class="line"></div>

        <p>Payment Method: Cash</p>

        <div class="line"></div>

        <p>Thank you for your order! 😊</p>
        <p class="center">Visit Again</p>
    </div>

    <!-- Print Button -->
    <button class="btn-print" onclick="window.print()">Print Receipt</button>

</body>

</html>