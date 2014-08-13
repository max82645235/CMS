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
                <!--<embed src="http://www.xiami.com/widget/39943821_1770159571,_235_346_ea827f_bfe5e8_1/multiPlayer.swf" type="application/x-shockwave-flash" width="235" height="346" wmode="opaque" style="z-index: 1;"></embed>-->
                <li><img src="<?=Yii::app()->baseUrl?>/photo/slider_1.jpg" alt="photo 1" /></li>
                <li><img src="<?=Yii::app()->baseUrl?>/photo/slider_4.jpg" alt="photo 4" /></li>
                <li><img src="<?=Yii::app()->baseUrl?>/photo/slider_2.jpg" alt="photo 2" /></li>
                <li><img src="<?=Yii::app()->baseUrl?>/photo/slider_3.jpg" alt="photo 3" /></li>
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
                    <p>欢迎来到我们的结婚纪念小站，时间见证了我们这六年的成长，一路走来，有妳真好！</p>
                </div><!-- /.col-md-12-->

                <!-- READMORE BUTTON -->
                <a href="#ourstory" class="btn btn-primary btn-lg">开始阅读</a>
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
                                       "GALLERY" section
==============================================================================================================
============================================================================================================== -->
<?php $this->renderPartial('/site/gallery');?>









<!-- =========================================================================================================
==============================================================================================================
                                       "Contact Us" form
==============================================================================================================
============================================================================================================== -->
<?php
    $guestInfo = unserialize(Yii::app()->request->cookies['guestInfo']);
?>
<!-- CONTACT US FORM -->
<?php if($guestInfo){?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="closeBtn">&times;</button>
                <h4 class="modal-title" id="myModalLabel">婚庆请帖</h4>
            </div>

            <!-- the actual form begins -->
            <form id="contact_form" method="post" action="" role="form">

                <div class="modal-body">

                    <p>欢迎你的到来，<span style="color:#dd1144;font-size:16px;font-weight:bold;"><?=$guestInfo['name']?></span>.很高兴你对我们的婚礼邀请函做出及时的回应，果断留下你的联系方式和参与反馈吧，亲！我们2014年10月1日甜蜜大婚，诚邀您共同见证我们的幸福时刻!报名从速，请于当日18点00分(时间)前到达。</p>

                    <!-- NAME -->
                    <div class="form-group">
                        <label for="contactname">联系电话</label>
                        <input type="text" class="form-control" id="contact_us_tel" name="form_tel" placeholder="电话号码"  style="width: 300px;">
                        <span style="color: red;display: none;">亲，请输入正确联系方式！</span>
                    </div><!-- /.form-group -->

                    <!-- EMAIL -->
                    <div class="form-group">
                        <label for="contactemail">是否有空参加</label>
                        <select class="form-control" style="width: 300px;"  name='form_select' id="contact_us_select">
                            <option value="1" selected="selected">没问题，准时到！</option>
                            <option value="2" >额，可能会到，看情况咯！</option>
                            <option value="3">不好意思，应该没空...</option>
                        </select>
                        <span style="color: red;display: none;">亲，做个选择吧！</span>
                    </div><!-- /.form-group -->

                    <!-- MESSAGE -->
                    <div class="form-group">
                        <label for="contactmessage">友情留言</label>
                        <textarea class="form-control" rows="3" placeholder="送上你的祝福吧！" id="contact_us_message" name="form_message"></textarea>
                        <span style="color: red;display: none;">亲，做个选择吧！</span>
                    </div><!-- /.form-group -->

                </div><!-- /.modal-body -->

                <div class="modal-footer" id='cf_submit_m'>

                    <!-- SUBMIT BUTTON -->
                    <input type="submit" value="Send Message" id="send_contact_message" class="btn btn-primary">
                </div><!-- /.modal-footer -->
                <div id='contact_success' class='alert alert-success'>你的祝福留言已经传达，感谢你的反馈！</div><!-- /. SUCCESS MESSAGE -->
                <div id='contact_fail' class='alert alert-danger'> 服务器貌似出现问题，请重新提交试试！</div><!-- /. ERROR MESSAGE -->
            </form><!-- /.contactus -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
        window.onload=function(){
            $('#contact_li a').trigger('click');
        }
</script>
<?php }?>
