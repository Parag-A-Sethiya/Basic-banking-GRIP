
   <?php
     $servername = "localhost";
     $username = "root";
     $database = "banking";
     $password = "";
   
     $conn = mysqli_connect($servername, $username, $password, $database);

     if (!$conn) {

     	die("we are sorry to connect.". mysqli_connect_error());
     }

     else{
     	echo "connection was successful<br>";
     }

     $sql = "SELECT * FROM `customers`";
     $result= mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);

     mysqli_close($conn);

     ?>

     <!DOCTYPE html>
<html>
<head>
	<title>All Customer</title>
	<style type="text/css">
		table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
            border-collapse: collapse;
            width: 50%;
        }
  
        
  
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 3px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }

        caption{
        	font-size: 50px;
        	color: brown;
        }
		
	</style>
</head>
<body style="background-color: #f2f2f2">

     <table>
     	<caption>Customer Details</caption>
         <tr>
       <th>C-id</th>
       <th>F_name</th>
       <th>L_name</th>
       <th>Balance</th>
       <th>Phone_no</th>
      </tr>
       
       <?php
     if ($num > 0) {
         while ($row = mysqli_fetch_assoc($result))
          {  
          	?>  
              <tr>
          	<td><?php echo $row['C_id']; ?></td>
            <td><?php echo $row['F_name']; ?></td>    
            <td><?php echo $row['L_name']; ?></td>   
            <td><?php echo $row['Balance']; ?></td>
            <td><?php echo $row['Phone_no']; ?></td>
              </tr>
          	  	
         <?php }
     	
     } 

     ?>

     </table>
   
</body>
</html>