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
<div class = my-header>
    <h2>Restaurant Management (Bill)</h2>
<h3>Date: <span><script> document.write(new Date().toLocaleDateString()); </script></span></h3>
</div>

{{-- <button class=buttons id="editButton">Edit Bill</button>

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
            </tr>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{$transaction->name}}</td>
                    <td>{{$transaction->amount}}</td>
                    <td><button>+</button></td>
                    <td><button>-</button></td>
                </tr>
            @endforeach
        </table>
        <button class=buttons id="changeButton">Edit Bill</button>
    </div>
</div> --}}

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
        {{-- <div>Menu: <span>
        <div class="dropdown">
            <button class="dropbtn">[  ]</button>
            <div class="dropdown-content">
                @foreach ($items as $item)
                    <a href="#">{{$item->name}}</a>
                @endforeach
            </div>
        </div>
        </span>
        </div>
        <div>
            Quantity: <span>
        <div class="dropdown">
            <button class="dropbtn">[  ]</button>
            <div class="dropdown-content">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">7</a>
                <a href="#">8</a>
                <a href="#">9</a>
                <a href="#">10</a>
                <a href="#">11</a>
                <a href="#">12</a>
            </div>
        </div> --}}
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
        <th></th>
    </tr>
    @foreach ($transactions as $transaction)
        <tr>
            <td>{{$transaction->amount}}</td>
            <td>{{$transaction->name}}</td>
            <td>{{$transaction->price}}</td>
            <td>{{$transaction->price * $transaction->amount}}</td>
            <td style="text-align: center"><button>+</button><button>-</button><button>x</button>
        </tr>
    @endforeach
</table>

<form action="/billidk/{{$bill_id}}" method = "POST">
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

