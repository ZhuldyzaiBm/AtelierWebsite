<?php
    //Connecting the header
    require_once("header.php");
session_start();
  require 'config.php';
?>
  <section class="blog_area">
      <div class="container">
          <div class="row">
              <div class="col-lg-8">
                  <div class="blog_left_sidebar">
                  	<?php
          // getting user email from authorization session
          $email=$_SESSION['email'];
          // query to select specidic user's requests from all of the users' requests by email
          $result = mysqli_query($con,"SELECT *  FROM request WHERE email= '$email'");
          //displaying results as a table
      while($row = mysqli_fetch_array($result))
            {
            	echo "<article class='row blog_item'>
                          <div class='col-md-3'>
                              <div class='blog_info text-right'>      
                                  <ul class='blog_meta list'>
                                      <li>
                                          <h5 >"
                                        . $row['dt_added'] . 
                                             "<i class'lnr lnr-user'></i>
                                          </h5>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class='col-md-9'>
                              <div class='blog_post'>
                                  <div class='blog_details'>
                                      <p>Имя: " . $row['name'] . "</p>
                                      <br>
                                      <p>Телефонный номер: " . $row['phone'] . "</p>
                                      <br>
                                      <p>Описание работы: " . $row['work'] . "</p>
                                      <br>
                                      <p>Стоимость работы: " . $row['cost'] . "</p>
                                      <br>
                                      <p>Параметры: " . $row['parameters'] . "</p>
                                      <br>
                                      <p>Портниха: " . $row['seamstress'] . "</p>
                                      <br>
                                      <p>Заметки: " . $row['notes'] . "</p>
                                  </div>
                              </div>
                          </div>
                      </article> 
";
}
   ?>
</div>
</div>
</div>
</div>
</section>
  <?php
    //Connecting the footer
    require_once("footer.php");
?>