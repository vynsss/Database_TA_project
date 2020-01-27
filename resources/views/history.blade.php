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
    <a href="#">History</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<div class = the-header>
    <h2>Histories</h2>
</div>

<table style="width:90%">
    <tr>
        <th>Date</th>
    </tr>
    @foreach ($dates as $date)
        <tr>
            <td><a href = "http://localhost:8000/historydate/{{$date->date}}">{{$date->date}}</a></td>
        </tr>
    @endforeach
    {{-- <tr>
        <td><a href="http://localhost:63342/dbta/history_per_date.html?_ijt=rio8m8vnj73k5ut7jdsubhirra">12/11/2020</a></td>
    </tr>
    <tr>
        <td><a href="http://localhost:63342/dbta/history_per_date.html?_ijt=rio8m8vnj73k5ut7jdsubhirra">13/11/2020</a></td>
    </tr>
    <tr>
        <td><a href="http://localhost:63342/dbta/history_per_date.html?_ijt=rio8m8vnj73k5ut7jdsubhirra">14/11/2020</a></td>
    </tr> --}}
</table>

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

