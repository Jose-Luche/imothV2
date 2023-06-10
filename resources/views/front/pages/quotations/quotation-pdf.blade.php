<!DOCTYPE html>
<html>

<head>
    <title>Company Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 10px 0;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 50px;
            margin-right: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td,
        table th {
            padding: 10px;
            border: 1px solid #ccc;
        }

    

        h2 {
            text-align: center;
            color: #0031AA;
        }
        
    </style>
</head>

<body>
    <div class="section" style="text-align: center">
        <div class="logo">
            <img src="frontend/assets/images/imoth.jpeg" style="width: 120px; height:100px" alt="Company Logo">

        </div>
        <p>Imoth Insurance Brokers</p>
        <p>Salama House, Wabera street, suite 305.
            Nairobi, Kenya.</p>
        <p>+254 759 642797</p>
        <hr>
    </div>

    <div class="section">
        <h2>Quotation #000{{$applicationDetails->id}}</h2>
        <table style="width: 100%; border-collapse:collapse">
            <tr>
                <th>Name</th>
                <td>{{$applicationDetails->firstName}} {{$applicationDetails->lastName}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$applicationDetails->email}}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{$phone}}</td>
            </tr>
            <tr>
                <th>Expected Start Date</th>
                <td> {{date('d M Y', strtotime($startDate))}}</td>
            </tr>
            <tr>
                <th>Cover Type</th>
                <td>{!! $class!!}</td>
            </tr>

        </table>
    
        <hr>
    </div>

    <div class="section">
        <h2>Quotation Details</h2>
        {{--Display your table with Contents--}}
        {!! $table !!}
    </div>

    <div  class="section">
        
            {!! $html !!}
    </div>

    <div >
        
        {!! $details->details !!}


    </div>
</body>

</html>
