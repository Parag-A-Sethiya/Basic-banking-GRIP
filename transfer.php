
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


      $sender_id =  $_REQUEST['sender_id'];
      $receiver_id =  $_REQUEST['receiver_id'];
      $amm =  $_REQUEST['amm'];
      $abc = 0;

    
   

      
     $sql = "SELECT * FROM `customers` WHERE `C_id` = '$sender_id'";
     $res= mysqli_query($conn, $sql);
     $sql= mysqli_fetch_array($res);


      if($amm>$sql['Balance'])
      {
        echo "<h1>Insufficient Balance</h1>";
      }

     
         else
         {
   
     $sqlt = "UPDATE `customers` SET `Balance` = `Balance`- '$amm' WHERE `C_id` = '$sender_id'";
     $sqll = "UPDATE `customers` SET `Balance` = `Balance`+ '$amm' WHERE `C_id` = '$receiver_id'";

     $a = "INSERT INTO `transfer`(`C_id`, `Debit`, `Credit`, `Date`) VALUES ('$sender_id', '$amm', '$abc', now())";
     $b = "INSERT INTO `transfer`(`C_id`, `Debit`, `Credit`, `Date`) VALUES ('$receiver_id', '$abc', '$amm', now())";

       $resullt= mysqli_query($conn, $sqlt);
     $resultt= mysqli_query($conn, $sqll);
     $r= mysqli_query($conn, $a);
     $re= mysqli_query($conn, $b);
     
       
      
        if($resultt)
          { 
        echo " <br><br><h1>Amount have been sent successfully</h1>";
       }
       else{
        echo "we couldn't transfer";
       }

       if($resullt)
          { 
        echo " <br><br><h1>Amount received by Receiver successfully</h1>";
       }
       else{
        echo "we couldn't transfer";
       }

       if($r)
          { 
        echo " <br><br><h1>Data Inserted in Transfer table successfully</h1>";
       }
       else{
        echo "we couldn't transfer";
       } 

       }



    $s = "SELECT * FROM `transfer`";
     $resu= mysqli_query($conn, $s);
     $num = mysqli_num_rows($resu);



     mysqli_close($conn);

     ?>

      <!DOCTYPE html>
      <html>
      <head>
        <title>Trasaction statement</title>
        <style type="text/css">
          body{
            text-align: center;
          }
          h1{color: green;
             font-size: 70px;}


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
      <body style="background-color: lightblue">


        <table>
      <caption>Transcation Details</caption>
         <tr>
       <th>C-id</th>
       <th>Debit</th>
       <th>Credit</th>
       <th>Date</th>
      
      </tr>
       
       <?php
     if ($num > 0) {
         while ($row = mysqli_fetch_assoc($resu))
          {  
            ?>  
              <tr>
            <td><?php echo $row['C_id']; ?></td>
            <td><?php echo $row['Debit']; ?></td>    
            <td><?php echo $row['Credit']; ?></td>   
            <td><?php echo $row['Date']; ?></td>
           
              </tr>
                
         <?php }
      
     } 

     ?>

     </table>
   
      
      </body >
      </html>