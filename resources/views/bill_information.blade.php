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
    <div class="dropdown">
        <button class="but">Update
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="http://localhost:8000/items">Menu</a>
            <a href="http://localhost:8000/cashiers">Cashier</a>
            <a href="http://localhost:8000/servicestaxes">Service & Tax</a>
            <a href="http://localhost:8000/branches">Branch</a>
            <a href="http://localhost:8000/servers">Server</a>
        </div>
    </div>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<div class = the-header>
    <h2>SPICE PARADISE</h2>
    <h2>{{end($bill)->branch_name}}</h2>
    <h2>{{end($bill)->phone}}</h2>
    <h3><span>{{end($bill)->date}}</span></h3>
    <h3>Bills Table: <span> {{end($bill)->table_no}}</span></h3>
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
    <h3>Sub Total: <span>{{round($calc[0]->sub_total, 0)}}</span></h3>
    <h3>Service: <span>{{round($calc[0]->service_, 0)}}</span></h3>
    <h3>Tax: <span>{{round($calc[0]->tax, 0)}}</span></h3>
    <h3>Total: <span>{{round($calc[0]->total, 0)}}</span></h3>
</div>

<div class = my-header>
    <h3>Cashier     : <span> {{end($bill)->cashier_name}} </span></h3>
    <h3>Server      : <span> {{end($bill)->server_name}} </span></h3>
    </div>

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
