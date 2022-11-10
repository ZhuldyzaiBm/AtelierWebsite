<?php
    //Connecting the header
    require_once("header.php");
//starting the session
session_start();
  require 'config.php';
?>
  <br>
  <br>
<!-- Displaying orders table -->
<div class='table-responsive'>
            <table class='table table-hover table-bordered'>
                <thead>
                    <tr>
                        <!-- Initializing table columns -->
                        <th>Имя</th>
                        <th>Номер телефона</th>
                        <th>Адрес</th>
                        <th>Дата заказа</th>
                        <th>Метод доставки</th>
                        <th>Сумма заказа</th>
                        <th>Статус заказа</th>
                    </tr>
                </thead> 
           <?php
           // getting user email from authorization session
          $email=$_SESSION['email'];
          // query to select specidic user's orders from all of the users order by email
          $result = mysqli_query($con,"SELECT *  FROM myorders WHERE email= '$email'");
            while($row = mysqli_fetch_array($result))
            {
            echo "<tr>
                <td>". $row['name'] ."</td>
                <td>". $row['phone'] ."</td>
                <td>". $row['address'] ."</td>
                <td>". $row['dt_added'] ."</td>
                <td>". $row['delivery_type'] ."</td>
                <td>". $row['cost'] ."</td>
                <td>". $row['order_status'] ."</td>
                </tr>";
}
?>
</table>
</div>
<?php          
    //Connecting the footer
    require_once("footer.php");
?>