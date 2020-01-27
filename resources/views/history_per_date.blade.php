<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('style.css') }}">
</head>
<body>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="http://localhost:8000/bills">Today</a>
    <a href="http://localhost:8000/histories">History</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<div class = the-header>
    <h2>History</h2>
    <h3>Date: <span>{{$date}}</span></h3>
</div>

<table style="width:90%">
    <tr>
        <th>Bill ID</th>
        <th>Table No.</th>
        <th>Cashier</th>
    </tr>
    @foreach ($bills as $bill)
    <tr>
        <td><a href="http://localhost:8000/billidk/{{$bill->id}}">{{$bill->id}}</a></td>
        <td>{{$bill->table_no}}</td>
        <td>{{$bill->name}}</td>
    </tr>
    @endforeach
    {{-- <tr>
        <td><a href="http://localhost:63342/dbta/bill_information.html?_ijt=rio8m8vnj73k5ut7jdsubhirra">12345</a></td>
        <td>12</td>
        <td>Vicky</td>
    </tr>
    <tr>
        <td><a href="http://localhost:63342/dbta/bill_information.html?_ijt=rio8m8vnj73k5ut7jdsubhirra">34578</a></td>
        <td>5</td>
        <td>stefan mw marc pnya input tentang last year</td>
    </tr>
    <tr>
        <td><a href="http://localhost:63342/dbta/bill_information.html?_ijt=rio8m8vnj73k5ut7jdsubhirra">87654</a></td>
        <td>10</td>
        <td>ini bahas ap sih</td>
    </tr> --}}
</table>

<button class=buttons id="backButton">Back</button>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

</body>
</html>

