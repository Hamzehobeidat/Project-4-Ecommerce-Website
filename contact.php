<?php
session_start();
include('connection.php');
include('header.php');
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Contact</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->


<!-- <div class="map spad">
    <div class="container">
        <div class="map-inner">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48158.305462977965!2d-74.13283844036356!3d41.02757295168286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2e440473470d7%3A0xcaf503ca2ee57958!2sSaddle%20River%2C%20NJ%2007458%2C%20USA!5e0!3m2!1sen!2sbd!4v1575917275626!5m2!1sen!2sbd" height="610" style="border:0" allowfullscreen="">
            </iframe>
            <div class="icon">
                <i class="fa fa-map-marker"></i>
            </div>
        </div>
    </div>
</div> -->


<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-title">
                    <h4>Contacts Us</h4>
                    <p>Contrary to popular belief, Lorem Ipsum is simply random text. It has roots in a piece of
                        classical Latin literature from 45 BC, maki years old.</p>
                </div>
                <div class="contact-widget">
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="ci-text">
                            <span>Address:</span>
                            <p>Jordan _ Amman Mecca St.60</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <span>Phone:</span>
                            <p>+962 (77 _ 5500 _ 555)</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-email"></i>
                        </div>
                        <div class="ci-text">
                            <span>Email:</span>
                            <p>elegant.shop@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="contact-form">
                    <div class="leave-comment">
                        <h4>Leave A message</h4>
                        <p>Our staff will call back later and answer your questions.</p>
                        <form action="message.php" class="comment-form" method="post" enctype="multipart/form-data>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Like : John Smath" name="com_name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="example@gmail.com" name="com_email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Enter Your message" name="com_message"></textarea>
                                    <button type="submit" name="sendmsg" class="site-btn">Send message</button>
                                    <?php if (isset($_POST['sendmsg'])) {
                                        echo "<div class='alert alert-success' role='alert'>
                                        This is a success alert—check it out!
                                      </div>"?>
                                      <?php }; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->



<!-- Partner Logo Section Begin -->
<?php
include('footer.php');
?>