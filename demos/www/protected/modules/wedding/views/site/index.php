<body class="index">
<div class="bghide">&nbsp;</div>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<!-- =========================================================================================================
==============================================================================================================
                                          Header Menu
==============================================================================================================
============================================================================================================== -->

<?php $this->renderPartial('/site/header');?>


<!-- =========================================================================================================
==============================================================================================================
                                          Silder Photos
==============================================================================================================
============================================================================================================== -->


<div class="jumbotron" id="thetop">

    <section class="slider">

        <div class="flexslider" id="slider1">

            <!-- THE ACTUAL PHOTO SLIDES -->
            <ul class="slides">
                <li><img src="<?=Yii::app()->baseUrl?>/photo/test.jpg" alt="photo 1" /></li>
                <li><img src="img/wedding/slider/photo2.jpg" alt="photo 2" /></li>
                <li><img src="img/wedding/slider/photo3.jpg" alt="photo 3" /></li>
                <li><img src="img/wedding/slider/photo4.jpg" alt="photo 4" /></li>
            </ul><!-- /.slides -->

        </div><!-- /.flexslider -->

    </section><!-- /.slider-->

</div><!-- /.jumbotron -->


<!-- =========================================================================================================
==============================================================================================================
                                    The First Area Under The Slider
==============================================================================================================
============================================================================================================== -->


<section id="home">
    <div class="container">

        <div class="row">

            <!-- THE TITLE -->
            <div class="col-md-12">
                <h2>简述</h2>
            </div><!-- /.col-md-12-->

            <div class="col-md-12">
                <!-- SMALL INTRODUCTORY TEXT -->
                <div class="col-md-12">
                    <p>欢迎来到我们的结婚纪念站，时间见证了我们这六年一路走来，在这长长的坡道上，我们经历的太多的考验和挫折，然而这些并没能让我们停止去思考，去展望，去相守，这一切</p>
                </div><!-- /.col-md-12-->

                <!-- READMORE BUTTON -->
                <a href="#ourstory" class="btn btn-primary btn-lg">Start Reading</a>
            </div><!-- /.rows-->
        </div><!-- /.col-md-12-->

    </div> <!-- /container -->
</section><!-- /# home -->

<!-- =========================================================================================================
==============================================================================================================
                                        "OUR STORY" section
==============================================================================================================
============================================================================================================== -->

<?php $this->renderPartial('/site/loveStory');?>



<!-- =========================================================================================================
==============================================================================================================
                                        "WEDDING LOCATION" section
==============================================================================================================
============================================================================================================== -->
<?php $this->renderPartial('/site/weddingLocation');?>



<!-- =========================================================================================================
==============================================================================================================
                                       "BLOG" section
==============================================================================================================
============================================================================================================== -->
<?php $this->renderPartial('/site/blog');?>




<!-- =========================================================================================================
==============================================================================================================
                                       "GALLERY" section
==============================================================================================================
============================================================================================================== -->
<?php $this->renderPartial('/site/gallery');?>




<!-- =========================================================================================================
==============================================================================================================
                                       "Message" section
==============================================================================================================
============================================================================================================== -->
<?php $this->renderPartial('/site/message');?>


<!-- =========================================================================================================
==============================================================================================================
                                       "EVENTS CALENDAR / RSVP" section
==============================================================================================================
============================================================================================================== -->

<section id="rsvp">

    <!-- "RSVP" SECTION MAIN TITLE -->
    <div id="rsvpphoto" class="parallax-hook parallax-rsvp parallax-background">
        <div class="section-overlay">
            <div class="container">
                <div class="row">
                    <header class="col-md-6 col-md-offset-3 hide">
                        Events Calendar &#38; RSVP
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing</span>
                    </header>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.section-overlay -->

    </div><!-- /#rsvpphoto -->

    <!-- "RSVP" SECTION actual content -->
    <div class="container">

        <!-- "RSVP" INTERMEDIARY TITLE AND CONTENT -->
        <h3 class="text-center">Here Are The Most Important Events. Please RSVP Below!</h3>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


        <!-- "RSVP" EVENTS -->
        <div class="row calendar">
            <h4 class="text-center">Please click on the events where you want to participate.</h4>
            <div class="col-md-4">

                <!-- THE MONTH -->
                <h4 class="sectionmaintitle">May, 2014</h4>

                <div class="border">

                    <div class="row">

                        <!-- RSVP EVENT -->
                        <div class="col-md-4">
                            <div class="date">
                                5<span>th</span>
                            </div><!-- /.date-->
                            <h5 class="bachelorsParty">Bachelors Party</h5>
                        </div><!-- /.col-md-4 -->

                        <!-- RSVP EVENT -->
                        <div class="col-md-4">
                            <div class="date">
                                23<span>rd</span>
                            </div><!-- /.date-->
                            <h5 class="theGirlsParty">The Girls Party</h5>
                        </div><!-- /.col-md-4 -->

                        <!-- RSVP EVENT -->
                        <div class="col-md-4">
                            <div class="date">
                                31<span>st</span>
                            </div><!-- /.date-->
                            <h5 class="dinnerRehearsal">Dinner Rehearsal</h5>
                        </div><!-- /.col-md-4 -->
                    </div><!-- /.row -->
                </div><!-- /.border -->
            </div><!-- /.col-md-4 -->

            <!-- THE MONTH -->
            <div class="col-md-4">
                <h4 class="sectionmaintitle">June, 2014</h4>
                <div class="border">
                    <div class="row">

                        <!-- RSVP EVENT -->
                        <div class="col-md-6">
                            <div class="date">
                                8<span>th</span>
                            </div><!-- /.date-->
                            <h5 class="weddingRehearsal">Wedding Rehearsal</h5>
                        </div><!-- /.col-md-6 -->

                        <!-- RSVP EVENT -->
                        <div class="col-md-6">
                            <div class="date">
                                22<span>nd</span>
                            </div><!-- /.date-->
                            <h5 class="familyDinner">Dinner In The Family</h5>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                </div><!-- /.border -->
            </div><!-- /.col-md-4 -->

            <!-- THE MONTH -->
            <div class="col-md-4">
                <h4 class="sectionmaintitle">July, 2014</h4>
                <div class="border">
                    <div class="row">

                        <!-- RSVP EVENT -->
                        <div class="col-md-12">
                            <div class="date">
                                25<span>th</span>
                            </div><!-- /.date-->
                            <h5 class="theWedding">The Weding</h5>
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                </div><!-- /.border --><!-- /.row -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->

        <!-- THE RSVP FORM -->
        <div class="row">
            <div class="col-md-4">
                <h4 class="sectionmaintitle">Please Use The RSVP Form</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div class="col-md-8">

                <!-- the actual form begins -->
                <form role="form" action="send_rsvp.php" method="post" id="rsvpform">

                    <!-- EVENTS ATTENDING -->
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Events Attending <span>(please click on the events above):</span></h5>
                        </div>
                        <div class="col-md-6" id="thecheckboxes"></div>
                    </div><!--/.row-->

                    <div class="row">
                        <div class="col-md-6">

                            <!-- NAME -->
                            <div class="form-group">
                                <label for="rsvp-name" class="sr-only">Name</label>
                                <input type="text" name="rsvp-name" placeholder="Your Name" id="rsvp-name" class="form-control">
                            </div><!-- /.form-group -->

                            <!-- EMAIL -->
                            <div class="form-group">
                                <label for="rsvp-email" class="sr-only">Email address</label>
                                <input type="email" name="rsvp-email" placeholder="Your Email" id="rsvp-email" class="form-control">
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->

                        <div class="col-md-6">

                            <!-- EXTRA REQUIREMENTS -->
                            <div class="form-group">
                                <label for="rsvp-extra" class="sr-only">Extra Requirements</label>
                                <textarea id="rsvp-extra" name="rsvp-extra" placeholder="Extra Requirements (gluten free, vegetarian etc)" rows="3" class="form-control"></textarea>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->


                    </div><!--/.row-->

                    <div class="row">
                        <div class="col-md-12">

                            <!-- MESSAGE -->
                            <div class="form-group">
                                <label for="rsvp-message" class="sr-only">Your Message</label>
                                <textarea id="rsvp-message" name="rsvp-message" placeholder="Please Enter Your Message" rows="3" class="form-control"></textarea>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-12-->
                    </div><!--/.row-->

                    <div class="row" id='cf_submit_p'>

                        <!-- SUBMIT BUTTOM -->
                        <input type="submit" value="Send Message" class="btn btn-primary btn-lg alignright" id="send_message">

                    </div><!--/.row-->

                    <!-- ERROR/SUCCESS -->
                    <div id='mail_success' class='alert alert-success'>Thank you. Your RSVP has been sent.</div><!-- /. SUCCESS MESSAGE -->
                    <div id='mail_fail' class='alert alert-danger'> Sorry, don't know what happened. Try later.</div><!-- /. ERROR MESSAGE -->
                </form>
            </div>
        </div>
    </div><!-- /.container -->

</section><!-- rsvp -->



<!-- =========================================================================================================
==============================================================================================================
                                       "Contact Us" form
==============================================================================================================
============================================================================================================== -->

<!-- CONTACT US FORM -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Send Us a Message</h4>
            </div>

            <!-- the actual form begins -->
            <form id="contactus" method="post" action="send_mail.php" role="form">

                <div class="modal-body">

                    <p>Have any question of message for us? We'll always try to get back to you as soon as possible. Please use the form below and we'll receive your message in our inbox, only for us to see</p>

                    <!-- NAME -->
                    <div class="form-group">
                        <label for="contactname">Name</label>
                        <input type="text" class="form-control" id="contactname" name="contactname" placeholder="Your Name">
                    </div><!-- /.form-group -->

                    <!-- EMAIL -->
                    <div class="form-group">
                        <label for="contactemail">Email address</label>
                        <input type="email" class="form-control" id="contactemail" name="contactemail" placeholder="Your Email">
                    </div><!-- /.form-group -->

                    <!-- MESSAGE -->
                    <div class="form-group">
                        <label for="contactmessage">Your Message</label>
                        <textarea class="form-control" rows="3" placeholder="Please Enter Your Message" id="contactmessage" name="contactmessage"></textarea>
                    </div><!-- /.form-group -->

                </div><!-- /.modal-body -->

                <div class="modal-footer" id='cf_submit_m'>

                    <!-- SUBMIT BUTTON -->
                    <input type="submit" value="Send Message" id="send_contact_message" class="btn btn-primary">
                </div><!-- /.modal-footer -->

                <!-- SUCCESS/ERROR FIELDS -->
                <div id='contact_success' class='alert alert-success'>Thank you. Your message has been sent.</div><!-- /. SUCCESS MESSAGE -->
                <div id='contact_fail' class='alert alert-danger'> Sorry, don't know what happened. Try later.</div><!-- /. ERROR MESSAGE -->
            </form><!-- /.contactus -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


