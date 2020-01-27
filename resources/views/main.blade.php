<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('style.css') }} ">
</head>
<body>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">Today</a>
    <a href="http://localhost:8000/histories">History</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<div class = my-header>
    <h2>Restaurant Management</h2>
    <h3>Date: <script> document.write(new Date().toLocaleDateString()); </script></span></h3>
</div>


<button class=buttons id="addButton">Add Bill</button>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>

        <form action = "" method = "POST">
            <label for="branchid">Branch </label>
            <select name = "branchid">
                @foreach ($branches as $branch)
                    <option value = "{{$branch->id}}">{{$branch->name}}</option>
                @endforeach
            </select>
            <br>
            <label for="table_no">Table </label>
            <select name = "table_no">
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
            <br>
            <label for="service_tax_id">Service & Tax </label>
            <select name = "service_tax_id">
                @foreach ($servicesandtaxes as $snt)
                    <option value = "{{$snt->id}}">{{$snt->service}}%, {{$snt->tax}}%</option>
                @endforeach
            </select>
            <br>
            <label for="cashier_id">Cashier </label>
            <select name = "cashier_id">
                @foreach ($cashiers as $cashier)
                    <option value = "{{$cashier->id}}">{{$cashier->name}}</option>
                @endforeach
            </select>
            <br>
            <label for="server_id">Server </label>
            <select name = "server_id">
                @foreach ($servers as $server)
                    <option value = "{{$server->id}}">{{$server->name}}</option>
                @endforeach
            </select>
            <input class = "buttons" type = "submit" name = "add">
        </form>
        </span>
        </div>
        <span class="close">add</span>
    </div>
</div>


<table style="width:90%">
    <tr>
        <th>Bill ID</th>
        <th>Table No.</th>
        <th>Cashier</th>
    </tr>
    @foreach ($bills as $bill)
        <tr>
            <td><a href = "http://localhost:8000/billidk/{{$bill->id}}">{{$bill->id}}</a></td>
            <td>{{$bill->table_no}}</td>
            <td>{{$bill->cashier_id}}</td>
        </tr>
    @endforeach
</table>


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

</body>
</html>

