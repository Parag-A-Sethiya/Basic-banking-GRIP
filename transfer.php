
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


     $sql = "UPDATE `customers` SET `Balance` = `Balance`- '$amm' WHERE `C_id` = '$sender_id'";
     $sqll = "UPDATE `customers` SET `Balance` = `Balance`+ '$amm' WHERE `C_id` = '$receiver_id'";
     $a = "INSERT INTO `transfer`(`C_id`, `Debit`, `Credit`, `Date`) VALUES ('$sender_id', '$amm', '$abc', now())";
     $b = "INSERT INTO `transfer`(`C_id`, `Debit`, `Credit`, `Date`) VALUES ('$receiver_id', '$abc', '$amm', now())";
     $result= mysqli_query($conn, $sql);
     $resultt= mysqli_query($conn, $sqll);
     $r= mysqli_query($conn, $a);
     $re= mysqli_query($conn, $b);
     
       if($result)
       { 
        echo "<h1>Amount Has Been Transfered successfully</h1>";
       }
       else{
        echo "we couldn't transfer";
       }

       if($resultt)
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
          h1{color: green;}
        </style>
      </head>
      <body style="background-color: lightblue">
      
      </body >
      </html>