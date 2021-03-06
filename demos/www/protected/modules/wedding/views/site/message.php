<!-- =========================================================================================================
   ==============================================================================================================
                                           "GUEST BOOK" section
   ==============================================================================================================
   ============================================================================================================== -->

<section id="guestbook">

    <!-- "GUEST BOOK" SECTION MAIN TITLE -->
    <div id="guestbookphoto" class="parallax-hook parallax-guestbook parallax-background">
        <div class="section-overlay">
            <div class="container">
                <div class="row">
                    <header class="col-md-6 col-md-offset-3 hide">
                        Guest Book
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing</span>
                    </header>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.section-overlay -->

    </div><!-- /#guestbookphoto -->

    <!-- "GUEST BOOK" ACTUAL CONTENT -->
    <div class="container">
        <h3 class="text-center">Some Lovely People Had This To Say:</h3>

        <div class="border">
            <div class="row">

                <!-- "GUEST BOOK" COMMENT -->
                <div class="col-md-4">
                    <div>
                        <img src="img/guestbook-guest.png" alt="guest 1">
                        <h5>Michael Fields<span>January 12, 2013 at 3:59 PM</span></h5>
                        <p>You two truly are the perfect couple. Words can��t describe how happy we all are for you guys. Enjoy this special moment!</p>
                    </div>
                </div><!-- /.col-md-4 -->

                <!-- "GUEST BOOK" COMMENT -->
                <div class="col-md-4">
                    <div>
                        <img src="img/guestbook-guest.png" alt="guest 2">
                        <h5>Michael Fields<span>January 12, 2013 at 3:59 PM</span></h5>
                        <p>Congratulations, you crazy kids!</p>
                    </div>
                </div><!-- /.col-md-4 -->

                <!-- "GUEST BOOK" COMMENT -->
                <div class="col-md-4">
                    <div>
                        <img src="img/guestbook-guest.png" alt="guest 3">
                        <h5>Michael Fields<span>January 12, 2013 at 3:59 PM</span></h5>
                        <p>Best wishes. You two are perfect for each other!</p>
                    </div>
                </div><!-- /.col-md-4 -->

                <!-- "GUEST BOOK" COMMENT -->
                <div class="col-md-4">
                    <div>
                        <img src="img/guestbook-guest.png" alt="guest 4">
                        <h5>Michael Fields<span>January 12, 2013 at 3:59 PM</span></h5>
                        <p>Plaudits to both of you on this fine occasion!</p>
                    </div>
                </div><!-- /.col-md-4 -->

                <!-- "GUEST BOOK" COMMENT -->
                <div class="col-md-4">
                    <div>
                        <img src="img/guestbook-guest.png" alt="guest 5">
                        <h5>Michael Fields<span>January 12, 2013 at 3:59 PM</span></h5>
                        <p>THIS WEDDING BETTER HAVE CUPCAKES!</p>
                    </div>
                </div><!-- /.col-md-4 -->

                <!-- "GUEST BOOK" COMMENT -->
                <div class="col-md-4">
                    <div>
                        <img src="img/guestbook-guest.png" alt="guest 6">
                        <h5>Michael Fields<span>January 12, 2013 at 3:59 PM</span></h5>
                        <p>I remember when you first met, and you hated each other. Ah, seventh grade. Remember when she poured chocolate pudding in his locker? I��ll be sure to get the incriminating photos to Jack for inclusion in the rehearsal dinner slideshow!</p>
                    </div>
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.border -->

        <!-- SIGN OUR GUESTBOOK SECTION -->
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-left">Sign Our Guest Book!</h3>
                <p>Leave us a thought, a good wish or a congratulation and you��ll make us so happy. After the wedding we will organize all the good wishes into an album for everyone to read and enjoy!</p>
            </div>
            <div class="col-md-6">

                <!-- "GUEST BOOK" FORM -->
                <form role="form" action="sign_questbook.php" method="post" id="signguestbook">
                    <div class="form-group">
                        <input type="text" placeholder="Name..." id="guest-name" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="email" placeholder="Email..." id="guest-email" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea id="guest-message" placeholder="Leave your message here..." rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="send_guestbook" value="Send Message">
                    </div>
                </form><!-- /.signguestbook-->
            </div><!-- /.col-md-6-->
        </div><!-- /.row-->

    </div><!-- /.container -->

</section><!-- guestbook -->