<?php
    //Connecting the header
    require_once("header.php");
?>
<br>
<br>
  <section class="blog_area">
      <div class="container">
          <div class="row">
              <div class="col-lg-8">
                  <div class="blog_left_sidebar">
                <?php 
  session_start();
  require 'config.php';
            // getting user email from authorization session
            $email=$_SESSION['email'];
             //selecting the specific user's comments by email 
            $result = mysqli_query($con,"SELECT * FROM poll WHERE email= '$email' ");
            //displaying results as a table
            while($row = mysqli_fetch_array($result))
            {
            echo "<article class='row blog_item'>
                          <div class='col-md-3'>
                              <div class='blog_info text-right'>
                                                                      
                                  <ul class='blog_meta list'>
                                      <li>
                                          <h5 >"
                                        . $row['name'] . 
                                             "<i class'lnr lnr-user'></i>
                                          </h5>
                                      </li> 
                                  </ul>
                              </div>
                          </div>
                          <div class='col-md-9'>
                              <div class='blog_post'>
                                  <div class='blog_details'>
                                      <p>" . $row['feedback'] . "</p>
                                  </div>
                              </div>
                          </div>
                      </article> 
";
}
   ?>
   </div>
  </div>
<?php
//Check if the user is authorized
 if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
?>
      <!-- If not authorized, warn about the need to authorization  -->
        <div class="section-intro pb-60px">
          <p></p>
          <h2>Необходимо войти для <span class="section-intro__style">добавления отзыва</span></h2>
        </div>
            <?php
                }else{
                    //if the user is logged in, then display a comment input form
            ?> 
        <div class="col-md-8 col-lg-9">
          <form action="feedback.php" class="form-contact contact_form" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-7">
                <div class="form-group">
                  <!-- Username field  -->
                	<input class="form-control" name="name" id="name" type="text" placeholder="Имя" >
                	<br>
                  <!-- displaying email from authrization session  -->
                  <input class="form-control" name="email" value="<?php echo $_SESSION["email"]; ?>" id="email" type="email" placeholder="Имя" readonly>
                  <!-- Feedback text field  -->
                    <textarea class="form-control different-control w-100" name="comments" cols="30" rows="8" placeholder="Отзыв" required=""></textarea>
                </div>
              </div>
            </div>
            <!-- Submitting the feedback  -->
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm" name="komment">Отправить отзыв</button>
            </div>
          </form>
        </div>             
            </ul>
            <?php
             }
            ?>
            </div>
             <div class="clear"></div>
          </div>
      </div>
  </section>
  <?php
    //Connecting the footer
    require_once("footer.php");
?>