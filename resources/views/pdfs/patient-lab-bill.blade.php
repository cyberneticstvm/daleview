<!DOCTYPE html>
<html>
<head>
    <title>Daleview Lab Prescription</title>
    <style>
        th{
            text-align: left;
        }
        thead{
            background-color: #d3d3d3;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td><strong>Patient Name</strong>: {{ $file->patient->first_name }}</td><td><strong>Age</strong>: {{ $file->patient->age }}</td><td><strong>Gender</strong>: {{ $file->patient->gendername->name }}</td>
        </tr>
        <tr><td><strong>Date</strong>: {{ $file->created_at->format('d/m/Y') }}</td></tr>
    </table>
    <hr><br>
    <strong>Investigations</strong><br><br>
    @foreach($cats as $key1 => $cat)
    <p>{{ $cat->name }}</p>
    <table width="100%">
        <thead><tr><th>Test Name</th><th>Result</th><th>Normal Range</th></tr></thead>
        <tbody>
            @foreach($labs->where('category_id', $cat->id) as $key => $la)
            <tr>
                <td>{{ $la->lab->name }}</td>
                <td>{{ $la->result }}</td>
                <td>{{ $la->normal_range }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach
    <p>Results relate only to the sample as received. Please Correlate Clinically with findings.</p>
    <hr>
</body>
</html>