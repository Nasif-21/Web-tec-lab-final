<html>
    <head>
      
       <style>
        body
        {
            background-image:url("hz.jpg");
            background-repeat:no-repeat;
            background-size:cover;
        }

        table, th,tr
        {
            border: 1px solid;
            background-color:white;
            
        
        }
        table
        {
            width:100%;
        }
        th td
        {
            padding: 15px;
            
        }
        td{text-align:center;}
        
        tr:hover {background-color: #7FFF00;}
        th
        {
            background-color:#7FFFD4;
            color:white;
        }
        h2
        {
            color:white;
        }

        </style>
</head>

<body >
    <center><h2 >Labbayek Allahumma Labbayek</h2></center>

</body>
</html>
<?php
//include ("../Model/Hazzdb.php");
$servername="localhost";
$username="root";
$password="";
$dbname="Hazz";
$con=mysqli_connect($servername,$username,$password,$dbname);
if($con->connect_error)
{
    die("Connection failed".$con->connect_error);
}
else
{
    
    $q="select* from flight";
    $result=$con->query($q);
    
    if($result->num_rows>0){
        echo "<table>";    
        echo "
        <th>Plane name:</th>
        <th>ID:</th><th>Seat Availablity:</th>
        <th>Time:</th>
        <th>Gate:</th>";
        while($row=$result->fetch_assoc()){
        
          
    echo "<tr>";
    echo '<td>'. $row['Plane Name']. '</td>';
    echo "<td>"; echo $row["ID"]; echo"</td>";
    echo "<td>"; echo $row["Seat Availability"]; echo"</td>";
    echo "<td>"; echo$row["Time"];echo"</td>";
    echo "<td>"; echo $row["Gate"];echo"</td>";
    echo "</tr>";
   
    
    
    
    }
    echo "</table>";
    
}


    
   // echo "<script>alert("Complain filed");</script>";
    else{
    echo "Data not posted";
		
    }
        

}
$con->close();
?>
