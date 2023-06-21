<!DOCTYPE html>
<html>
<head>
    <title>Daleview</title>
    <style>
        p{
            line-height: 3px;
        }
        .bg{
            background-color: #d3d3d3;
        }
        .head tr td{
            padding: 5px;
        }
        .f-big{
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <table width="100%"><tr>
        <td width="20%">
            <img src="./assets/img/daleview-logo.png" />
        </td>
        <td>
            <p class="f-big">THE DALE VIEW CARE POINT</p>
            <i>JOINING HANDS TO MAKE LIVES BETTER</i>
            <p>Punalal Post, Poovachal (via), Thiruvananthapuram, Kerala</p>
            <p>Ph: 0472-2882063, 2884939, 7907419020, 9809907030</p>
        </td>
    </tr></table>
    <center>        
        <h3><u>INVOICE</u></h3>
    </center>
    <br/>
    <table class="bordered" width="100%" cellspacing="0" cellpadding="0">
        <tbody class="head">
            <tr class="bg">
                <td>Name</td>
                <td>{{ $file->patient->first_name }}</td>
                <td>Date</td>
                <td>{{ $file->created_at->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td>Patient ID</td>
                <td>{{ $file->patient->id }}</td>
                <td>Invoice No</td>
                <td></td>
            </tr>
            <tr>
                <td>Address</td>
                <td colspan="3"></td>
            </tr>
        </tbody>
    </table>
    <br><br>
    <table class="bordered" width="100%" cellspacing="0" cellpadding="0">
        <thead class="bg"><tr><th>SL No</th><th>Particulars</th><th>Price</th><th>Item Qty</th><th>Item Total</th></tr></thead>
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