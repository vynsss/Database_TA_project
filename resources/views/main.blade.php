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
    {{-- <tr>
        <td><a href="http://localhost:63342/dbta/bill_information.html?_ijt=rio8m8vnj73k5ut7jdsubhirra">12345</a></td>
        <td>12</td>
        <td>Vicky</td>
    </tr>
    <tr>
        <td><a href="http://localhost:63342/dbta/bill_information.html?_ijt=rio8m8vnj73k5ut7jdsubhirra">34578</a></td>
        <td>5</td>
        <td>stefan</td>
    </tr>
    <tr>
        <td><a href="http://localhost:63342/dbta/bill_information.html?_ijt=rio8m8vnj73k5ut7jdsubhirra">87654</a></td>
        <td>10</td>
        <td>Bahana</td>
    </tr> --}}
</table>

<button class=buttons id="addButton">Add Bill</button>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div>Branch: <span>
        <div class="dropdown">
            <button class="dropbtn">[  ]</button>
            <div class="dropdown-content">
                @foreach ($branches as $branch)
                    <a href = "#">{{$branch->name}}</a>
                @endforeach
                {{-- <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a> --}}
            </div>
        </div>
        </span>
        </div>
        <div>
            Table No: <span>
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
                <a href="#">13</a>
            </div>
        </div>
        </span>
        </div>
        <div>
            Service & Tax: <span>
        <div class="dropdown">
            <button class="dropbtn">[  ]</button>
            <div class="dropdown-content">
                @foreach ($servicesandtaxes as $snt)
                    <a href = "#">{{$snt->service}}%, {{$snt->tax}}%</a>
                @endforeach
                {{-- <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a> --}}
            </div>
        </div>
        </span>
        </div>
        <div>
            Cashier: <span>
        <div class="dropdown">
            <button class="dropbtn">[  ]</button>
            <div class="dropdown-content">
                @foreach ($cashiers as $cashier)
                    <a href = "#">{{$cashier->name}}</a>
                @endforeach
                {{-- <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a> --}}
            </div>
        </div>
        </span>
        </div>
        <div>
            Server: <span>
        <div class="dropdown">
            <button class="dropbtn">[  ]</button>
            <div class="dropdown-content">
                @foreach ($servers as $server)
                    <a href = "#">{{$server->name}}</a>
                @endforeach
                {{-- <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a> --}}
            </div>
        </div>
        </span>
        </div>
        <span class="close">add</span>
    </div>
</div>

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

