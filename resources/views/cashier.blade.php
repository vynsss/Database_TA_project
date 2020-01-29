<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
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
    <h2>Cashier</h2>
</div>

<table style="width:90%">
    <tr>
        <th>ID</th>
        <th>Cashier Name</th>
    </tr>
    @foreach ($cashiers as $cashier)
        <tr>
            <td>{{$cashier->id}}</td>
            <td>{{$cashier->name}}</td>
        </tr>
    @endforeach
</table>

<button class=buttons id="addButton">Add Cashier</button>

<div id="myModal" class="modal">
    <div class="modal-content">
        <form action = "/cashier" method="POST">
        <span class="close">&times;</span>
            Name:<br>
            <input type="text" name="name"><br>
            <input class = "close" type = "submit" value = "Add">
        </form>
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
