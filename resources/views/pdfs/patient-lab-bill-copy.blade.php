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
        <h2>Investigations</h2>
    </center>
    <br/>
    <table class="bordered" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td>Patient Name</td>
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
                <td>Presciption Number</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <br><br>   
    <table class="bordered" width="100%" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Category</th>
                <th>Test Name</th>
                <th>Result</th>
                <th>Normal Range</th>
            </tr>
        </thead>
        <tbody>
            @foreach($labs as $key => $la)
            <tr>
                <td>{{ $la->lab->category->name }}</td>
                <td>{{ $la->lab->name }}</td>
                <td>{{ $la->result }}</td>
                <td>{{ $la->normal_range }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <p>Results relate only to the sample as received. Please Correlate Clinically with findings.</p>
</body>
</html>