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
<div class = my-header>
    <h2>SPICE PARADISE</h2>
    <h2>{{end($bills)->branch_name}}</h2>
    <h2>{{end($bills)->phone}}</h2>
<h3><span>{{end($bills)->date}}</span></h3>
<h3>Bills Table: <span> {{end($bills)->table_no}} </span></h3>
</div>

<button class=buttons id="editButton">Edit Bill</button>

<div id="theModal" class="modal">
    <div class="modal-content">
        <span class="close1">&times;</span>
        <h2 class="my-header">Bill</h2>
        <table style="width:90%">
            <tr>
                <th>Menu</th>
                <th>Quantity</th>
                <th>Add</th>
                <th>Subtract</th>
                <th>Remove</th>
            </tr>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{$transaction->name}}</td>
                    <td>{{$transaction->amount}}</td>
                    <td><form action="/billidk/add/{{$transaction->transaction_id}}" method = "POST">
                        <label value = "{{$transaction->transaction_id}}">
                        <input class = "buttons" type = "submit" value = " + ">
                    </form></td>
                    <td><form action="/billidk/min/{{$transaction->transaction_id}}" method = "POST">
                        <label value = "{{$transaction->transaction_id}}">
                        <input class = "buttons" type = "submit" value = " - ">
                    </form></td>
                    <td><form action="/billidk/remove/{{$transaction->transaction_id}}" method = "POST">
                        <label value = "{{$transaction->transaction_id}}">
                        <input class = "buttons" type = "submit" value = " x ">
                    </form></td>
                </tr>
            @endforeach
        </table>
        <button class=buttons id="changeButton">Edit Bill</button>
    </div>
</div>

<button class=buttons id="addButton">Add Menu</button>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action = "/billidk/{{$bill_id}}" method = "POST">
            <label value = "{{$bill_id}}">
            <label for="items">items </label>
            <select name = "item_id">
                @foreach ($items as $item)
                    <option value = "{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            <br>
            <label for="amount">amount </label>
            <select name = "amount">
                <option value = "1">1</option>
                <option value = "2">2</option>
                <option value = "3">3</option>
                <option value = "4">4</option>
                <option value = "5">5</option>
                <option value = "6">6</option>
                <option value = "7">7</option>
                <option value = "8">8</option>
                <option value = "9">9</option>
                <option value = "10">10</option>
                <option value = "11">11</option>
                <option value = "12">12</option>
                <option value = "13">13</option>
                <option value = "14">14</option>
                <option value = "15">15</option>
            </select>
            <input class = "buttons" type = "submit" value = "add">
        </form>
        </span>
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal1 = document.getElementById("theModal");

    // Get the button that opens the modal
    var btn1 = document.getElementById("editButton");

    // Get the <span> element that closes the modal
    var span1 = document.getElementsByClassName("close1")[0];

    // When the user clicks the button, open the modal
    btn1.onclick = function() {
        modal1.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span1.onclick = function() {
        modal1.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }
</script>

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
    <h3>Sub Total   : <span>{{round($calc[0]->sub_total, 0)}}</span></h3>
    <h3>Service     : <span>{{round($calc[0]->service_, 0)}}</span></h3>
    <h3>Tax         : <span>{{round($calc[0]->tax, 0)}}</span></h3>
    <h3>Total       : <span>{{round($calc[0]->total, 0)}}</span></h3>
</div>

<div class = my-header>
<h3>Cashier     : <span> {{end($bills)->cashier_name}} </span></h3>
<h3>Server      : <span> {{end($bills)->server_name}} </span></h3>
</div>

<form action="/billidk/close/{{$bill_id}}" method = "POST">
{{-- <input class=buttons id="closeButton"Close Bill> --}}
<input class = "buttons" type = "submit" value = "Close Bill">
</form>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("addButton");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<!--<button class=buttons id="addButton">Add Bill</button>-->

</body>
</html>

