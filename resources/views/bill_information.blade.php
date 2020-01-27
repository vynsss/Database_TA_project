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
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<div class = the-header>
    <h2>Information</h2>
    <h3>Date: <span><script> document.write(new Date().toLocaleDateString()); </script></span></h3>
    <h3>Bill ID: <span>12345</span></h3>
    <h3>Table No: <span>07</span></h3>
    <h3>Cashier: <span>Vicky</span></h3>
</div>

<table style="width:90%">
    <tr>
        <th>Menu</th>
        <th>Quantity</th>
        <th>Total Price</th>
    </tr>
    <tr>
        <td>Chicken</td>
        <td>12</td>
        <td>350,000</td>
    </tr>
    <tr>
        <td>Lobster</td>
        <td>5</td>
        <td>1,450,000</td>
    </tr>
    <tr>
        <td>Mushroom</td>
        <td>2</td>
        <td>65,000</td>
    </tr>
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

