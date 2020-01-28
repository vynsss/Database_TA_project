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
    <h2>Information</h2>
    <h3>Date: <span>{{end($bill)->date}}</span></h3>
    <h3>Bill ID: <span>{{end($bill)->id}}</span></h3>
    <h3>Table No: <span>{{end($bill)->table_no}}</span></h3>
    <h3>Cashier: <span>{{end($cashier)->name}}</span></h3>
</div>

<table style="width:90%">
    <tr>
        <th>Quantity</th>
        <th>Menu</th>
        <th>price</th>
        <th>total price</th>
    </tr>
    @foreach ($transactions as $transaction)
        <tr>
            <td>{{$transaction->amount}}</td>
            <td>{{$transaction->name}}</td>
            <td>{{$transaction->price}}</td>
            <td>{{$transaction->price * $transaction->amount}}</td>
        </tr>
    @endforeach
</table>

<div class = the-total>
    <h3>Sub Total: <span>{{end($bill)->date}}</span></h3>
    <h3>Service: <span>{{end($bill)->id}}</span></h3>
    <h3>Tax: <span>{{end($bill)->table_no}}</span></h3>
    <h3>Total: <span>{{end($bill)->table_no}}</span></h3>
</div>

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
