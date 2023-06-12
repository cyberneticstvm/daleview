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
        .head tr td, .body tr td{
            padding: 5px;
        }
        th{
            text-align: left;
        }
        .underline{
            border-bottom: 1px solid #d3d3d3;
        }
        .underline td{
            padding: 5px;
        }
    </style>
</head>
<body>
    <center>
        <img src="./assets/img/daleview-logo.png" /><br/>
        <p>THE DALE VIEW CARE POINT</p>
        <p>JOINING HANDS TO MAKE LIVES BETTER</p>
        <p>Punalal Post, Poovachal (via), Thiruvananthapuram, Kerala</p>
        <p>Ph: 0472-2882063, 2884939, 7907419020, 9809907030</p>
        <h3><u>DOCTOR PRESCRIPTION</u></h3>
    </center>
    <br/>
    <table class="bordered" width="100%" cellspacing="0" cellpadding="0">
        <tbody class="head">
            <tr class="bg">
                <td>Name</td>
                <td>{{ $file->patient->first_name }}</td>
                <td>Age</td>
                <td>{{ $file->patient->age }}</td>
            </tr>
            <tr>
                <td>Date</td>
                <td>{{ $file->created_at->format('d/m/Y') }}</td>
                <td>Patient ID</td>
                <td>{{ $file->patient->id }}</td>                
            </tr>
            <tr>
                <td>Address</td>
                <td colspan="3"></td>
            </tr>
        </tbody>
    </table>
    <h3>Diagnosis:</h3>
    <h3>Rx.</h3>
    <table class="bordered" width="100%" cellspacing="0" cellpadding="0">
        <thead class="bg"><tr><th>SL No</th><th>Medicine</th><th>Molecule</th><th>Dosage</th><th>Frequency</th><th>Instructions</th></tr></thead>
        <tbody class="body">
            @php $c = 1; @endphp
            @forelse($medicines as $key => $value)
            <tr class="underline">
                <td>{{ $c++ }}</td>
                <td>{{ $value->medicine->name }}</td>
                <td class="text-end">{{ $value->medicine->molecule }}</td>
                <td class="text-end">{{ $value->dosage }}</td>
                <td></td>
                <td class="text-end">{{ $value->notes }}</td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <br>
    <p>Next Follow Date:</p>
    <p>Time:</p>
</body>
</html>