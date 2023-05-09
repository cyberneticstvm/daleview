<!DOCTYPE html>
<html>
<head>
    <title>Daleview</title>
    <style>
        table{
            border: 1px solid #e6e6e6;
            font-size: 12px;
        }
        thead{
            border-bottom: 1px solid #e6e6e6;
        }
        table thead th, table tbody td{
            padding: 5px;
        }
        .bordered td, .bordered th{
            border: 1px solid #e6e6e6;
        }
        .text-end{
            text-align: right;
        }
        .bg{
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <center>
        <img src="./assets/img/daleview-logo.png" /><br/>
        <p>THE DALE VIEW, PUNALAL.P.O, POOVACHAL (VIA), TRIVANDRUM - 695575, KERALA, INDIA. PH: 0472-2882063, 2882163</p>
        <h2>Medical Invoice</h2>
    </center>
    <br/>
    <table class="bordered" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td>Bill To</td>
                <td>{{ $file->patient->first_name }}</td>
                <td>Patient Contact</td>
                <td>{{ $file->patient->mobile }}</td>
            </tr>
            <tr>
                <td>Reg. Date</td>
                <td>{{ $file->patient->registration_date->format('d-m-Y') }}</td>
                <td>Counsellor</td>
                <td>{{ $file->counsellor->name }}</td>
            </tr>
            <tr>
                <td>File number</td>
                <td>{{ $file->id }}</td>
                <td>Invoice Number</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <br><br>
    <table class="bordered" width="100%" cellspacing="0" cellpadding="0">
        <thead class="bg"><tr><th>SL No</th><th>Services Performed</th><th>Price</th><th>Qty</th><th>Total</th></tr></thead>
        <tbody>
            @php $c = 1; @endphp
            @forelse($file->bills as $key => $value)
            <tr>
                <td>{{ $c++ }}</td>
                <td>{{ $value->service->name }}</td>
                <td class="text-end">{{ $value->fee }}</td>
                <td class="text-end">{{ $value->qty }}</td>
                <td class="text-end">{{ $value->total }}</td>
            </tr>
            @empty
            @endforelse
        </tbody>
        <tfoot><tr><th colspan="4" class="text-end">Total</th><th class="text-end">{{ number_format($file->bills->sum('total'), 2) }}</th></tr></tfoot>
    </table>
</body>
</html>