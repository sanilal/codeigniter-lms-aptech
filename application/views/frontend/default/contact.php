<?php /* <section class="home-banner-area" id="home-banner-area">
    <!-- <div class="cropped-home-banner" ></div> -->
    <div class="">
        <div class="row">
            <div class="col position-relative">

                <!-- Carousel -->
                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">

                        <div class="carousel-item active">

                            <!-- <img src="" alt="" class="img-fluid"> -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
    $banner_size = getimagesize("uploads/system/" . get_frontend_settings('banner_image'));
    $banner_ratio = $banner_size[0] / $banner_size[1];
    ?>
    <script type="text/javascript">
        /*   var border_bottom = $('.home-banner-wrap').height() + 242;
        $('.cropped-home-banner').css('border-bottom', border_bottom + 'px solid #f1f7f8');
        mRight = Number("<?php //echo $banner_ratio; ?>") * $('.home-banner-area').outerHeight();
        $('.cropped-home-banner').css('right', (mRight - 65) + 'px'); */
        /*
    </script>
</section>*/ ?>
<section class="blank_space p-2 p-md-5"></section>




<section class="container mt-5">
    <div class="row m-0">

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <h3 class="specialfont">Contact Us</h3> 
                <form role="form" id="frmenquiry" name="frmenquiry" action="<?php echo base_url('home/contact') ?>" method="post">
                
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="wrap-input100 validate-input">
                            <?php echo form_input('inputName',set_value('inputName',$this->form_data->inputName), ['class'=>'form-control input100','placeholder'=>'Your Name', 'id'=>'inputName']);?>
                            <!-- <input type="text" class="input100" id="inputName" name="inputName" required
                                value="<?php// echo set_value('inputName',$this->form_data->inputName); ?>" > -->
                                <?php echo form_error('inputName'); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wrap-input100 validate-input">
                        <?php
                            echo form_input(
                                array(
                                    'name' => 'inputEmail',
                                    'id' => 'inputEmail',
                                    'class' => 'form-control input100',
                                    'value' => set_value('inputEmail', $this->form_data->inputEmail),
                                    'placeholder' => 'Your Email',
                                    'type' => 'email' // Set the type attribute to 'email'
                                )
                            );
                        ?>
                                                    <!-- <input type="text" class="input100" id="inputEmail" name="inputEmail"
                                value="<?php// echo set_value('inputEmail',$this->form_data->inputEmail); ?>" required> -->
                                <?php echo form_error('inputEmail'); ?>
                        </div>
                    </div>
                        </div>
                        <div class="row">
                    <div class="col-lg-6">
                        <div class="wrap-input100 validate-input">
                        <?php
                            echo form_input(
                                array(
                                    'name' => 'inputPhone',
                                    'id' => 'inputPhone',
                                    'class' => 'form-control input100',
                                    'value' => set_value('inputPhone', $this->form_data->inputPhone),
                                    'placeholder' => 'Contact Number',
                                    'type' => 'tel' 
                                )
                            );
                        ?>
                                <?php echo form_error('inputPhone'); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="wrap-input100 validate-input">
                        <?php
                            echo form_input(
                                array(
                                    'name' => 'inputCompany',
                                    'id' => 'inputCompany',
                                    'class' => 'form-control input100',
                                    'value' => set_value('inputCompany', $this->form_data->inputCompany),
                                    'placeholder' => 'Company Name',
                                    'type' => 'tel' 
                                )
                            );
                        ?>
                                <?php echo form_error('inputCompany'); ?>
                        </div>
                    </div>
                        </div>
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="wrap-input100 validate-input">
                        <?php
                            echo form_input(
                                array(
                                    'name' => 'inputSubject',
                                    'id' => 'inputSubject',
                                    'class' => 'form-control input100',
                                    'value' => set_value('inputSubject', $this->form_data->inputSubject),
                                    'placeholder' => 'Subject',
                                    'type' => 'tel' 
                                )
                            );
                        ?>
                           
                                <?php echo form_error('inputSubject'); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="wrap-input100 validate-input">
                        <?php
                            echo form_input(
                                array(
                                    'name' => 'inputLocation',
                                    'id' => 'inputLocation',
                                    'class' => 'form-control input100',
                                    'value' => set_value('inputLocation', $this->form_data->inputLocation),
                                    'placeholder' => 'Location',
                                    'type' => 'tel' 
                                )
                            );
                        ?>
                            
                                <?php echo form_error('inputLocation'); ?>
                        </div>
                    </div>
                        </div>
                    <div class="col-lg-12">
                        <div class="wrap-input100 validate-input">
                            <?php
                            echo form_textarea(
                                array(
                                    'name' => 'inputMessage',
                                    'id' => 'inputMessage',
                                    'class' => 'form-control input100',
                                    'value' => set_value('inputMessage', $this->form_data->inputMessage),
                                    'placeholder' => 'Your Message',
                                    'type' => 'tel' 
                                )
                            );
                        ?>
                            
                                <?php echo form_error('inputMessage'); ?>
                        </div>
                    </div>
                    <div class="msg-error" style="color:red;"></div>
                    <!-- <div class="g-recaptcha" data-sitekey="6LcYbZEUAAAAAM-UQj_J9QedWO8_4bM5DylLsr7B" id="recaptcha"
                        style="margin-top: 1em;"></div>   send-button button-01 -->
                    <button type="submit" class="send-button button-01">Send Now</button>
                    <div class="col-xs-12 no-side-pad">
                        <p class="mail_response"><?php echo isset($message)?$message:'';?></p>
                    </div>

                </form>

            <div class=" col-xs-12 no-side-margin no-side-pad ">
                <div class="map-block no-side-margin no-side-pad wow fadeInUp" data-wow-delay="0.6s">
                    <div class="mapouter mt-5">
                        <div class="spacing-20"></div>
                        <div class="gmap_canvas">
                            <!--                          <iframe width="100%" height="500px" id="gmap_canvas" src="https://maps.google.com/maps?q=apex%20medical%2C%20calgary&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
--> <iframe src="https://www.google.com/maps/d/embed?mid=1cXjed2VkPXBnZi8jcVOGAbH7zC0wEsj1&z=11" width="100%"
                                height="350px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe> </div>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                height: 350px;
                                width: 100%;
                            }

                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                height:350px;
                                width: 100%
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="sidebar-right" id="booker">
            <h5>Find us on Coursetakers</h5>
                        <img src="<?php echo base_url('assets/frontend/default/img/coursetakers-badge-150x150.png'); ?>" alt="Coursetakers">
            <h5>Contact Info</h5>
            <h4 class="specialfont">APTECH COMPUTER TRAINING</h4>
        <div class="row m-0">
            <div class="col-md-12 contact-box wow fadeInUp"
                data-wow-delay="0.2s">
                
                <h5>DUBAI CENTRE</h5>
                <p class="special-p"><i class="fa fa-map-marker"></i>
                7th Floor, 702, Al Tawhidi Building II, <br>
Opp. Al Khaleej Centre,<br>
Near Sharaf DG Metro Station (Exit 1)<br>
Al Mankhool Road, Dubai<br>
P.O.Box 50028</p>
                <p class="special-p"><i class="fa fa-phone"></i><a href="tel:+971 55 6448331">+971 55 6448331</a></p>
                <p class="special-p"><i class="fa fa-phone"></i><a href="tel:+971 4 3553545">+971 4 3553545</a></p>
                <p class="special-p"><i class="fa fa-clock"></i> 9.00 a.m to 9.00 p.m</p>
                <p class="special-p"><i class="fa fa-envelope"></i><a href="mailto:enquiry@aptech.ae">enquiry@aptech.ae</a></p>

            </div>

            <div class=" col-md-12 contact-box wow fadeInUp"
                        data-wow-delay="0.2s">
                        
                        
                        <h5>SHARJAH CENTRE</h5>
                        <p class="special-p"><i class="fa fa-map-marker"></i>M Floor, Office No 3, HSBC Building,<br>
Next to Safeer Market,<br>
King Faisal Street, <br>
Sharjah<br>
P.O.Box 25096<br></p>
                        <p class="special-p"><i class="fa fa-phone"></i><a href="tel:+971 54 3903209">+971 54
                                3903209</a></p>
                        <p class="special-p"><i class="fa fa-phone"></i><a href="tel:+971 6 5551191">+971 6 5551191</a>
                        </p>
                        <p class="special-p"><i class="fa fa-clock"></i> 9.00 a.m to 9.00 p.m</p>
                        <p class="special-p"><i class="fa fa-envelope"></i><a
                                href="mailto:enquiry@aptech.ae">enquiry@aptech.ae</a></p>
            </div>
</div>
                
            </div>
        </div>
    </div>
</section>
<script>
    /* $("#frmenquiry").submit(function (e) {
        var $captcha = $('#recaptcha'),
            response = grecaptcha.getResponse();
        if (response.length === 0) {
            $('.msg-error').text("reCAPTCHA is mandatory");
            return false;
        } else {
            grecaptcha.reset();
            return true;

        }
    }); */
</script> <!-- end-->


<script type="text/javascript">
    function handleWishList(elem) {
        $.ajax({
            url: '<?php echo site_url('home/handleWishList'); ?>',
            type: 'POST',
            data: {
                course_id: elem.id
            },
            success: function (response) {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                } else {
                    if ($(elem).hasClass('active')) {
                        $(elem).removeClass('active')
                    } else {
                        $(elem).addClass('active')
                    }
                    $('#wishlist_items').html(response);
                }
            }
        });
    }

    function handleCartItems(elem) {
        url1 = '<?php echo site_url('home/handleCartItems'); ?>';
        url2 = '<?php echo site_url('home/refreshWishList'); ?>';
        $.ajax({
            url: url1,
            type: 'POST',
            data: {
                course_id: elem.id
            },
            success: function (response) {
                $('#cart_items').html(response);
                if ($(elem).hasClass('addedToCart')) {
                    $('.big-cart-button-' + elem.id).removeClass('addedToCart')
                    $('.big-cart-button-' + elem.id).text("<?php echo site_phrase('add_to_cart'); ?>");
                } else {
                    $('.big-cart-button-' + elem.id).addClass('addedToCart')
                    $('.big-cart-button-' + elem.id).text("<?php echo site_phrase('added_to_cart'); ?>");
                }
                $.ajax({
                    url: url2,
                    type: 'POST',
                    success: function (response) {
                        $('#wishlist_items').html(response);
                    }
                });
            }
        });
    }

    function handleEnrolledButton() {
        $.ajax({
            url: '<?php echo site_url('home/isLoggedIn'); ?>',
            success: function (response) {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                }
            }
        });
    }
    $(document).ready(function () {
        if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            if ($(window).width() >= 840) {
                $('a.has-popover').webuiPopover({
                    trigger: 'hover',
                    animation: 'pop',
                    placement: 'horizontal',
                    delay: {
                        show: 500,
                        hide: null
                    },
                    width: 330
                });
            } else {
                $('a.has-popover').webuiPopover({
                    trigger: 'hover',
                    animation: 'pop',
                    placement: 'vertical',
                    delay: {
                        show: 100,
                        hide: null
                    },
                    width: 335
                });
            }
        }
        if ($(".course-carousel")[0]) {
            $(".course-carousel").slick({
                dots: false,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                swipe: false,
                touchMove: false,
                responsive: [{
                        breakpoint: 840,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        },
                    },
                    {
                        breakpoint: 620,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        },
                    },
                ],
            });
        }
        if ($(".top-istructor-slick")[0]) {
            $(".top-istructor-slick").slick({
                dots: false
            });
        }
    });
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"> </script>
<script>
    /*  for more info : http://owlcarousel2.github.io/OwlCarousel2/docs/api-options.html */

    var owl = $(".instructor-carousel");
    owl.owlCarousel(

        {
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,

            items: 4,
            loop: true,
            center: false,
            rewind: false,

            mouseDrag: true,
            touchDrag: true,
            pullDrag: true,
            freeDrag: false,

            margin: 15,
            stagePadding: 10,

            merge: false,
            mergeFit: true,
            autoWidth: false,

            startPosition: 0,
            rtl: false,

            smartSpeed: 250,
            fluidSpeed: false,
            dragEndSpeed: false,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            navContainer: '.owl-carousel-parent .custom-nav',
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                480: {
                    items: 1,
                    nav: false
                },
                768: {
                    items: 1,
                    nav: true,
                    loop: false
                },
                992: {
                    items: 1,
                    nav: true,
                    loop: false
                },
                1280: {
                    items: 4,
                    nav: true,
                    loop: false
                }

            },
            responsiveRefreshRate: 200,
            responsiveBaseElement: window,

            fallbackEasing: 'swing',

            info: false,

            nestedItemSelector: false,
            itemElement: 'div',
            stageElement: 'div',

            refreshClass: 'owl-refresh',
            loadedClass: 'owl-loaded',
            loadingClass: 'owl-loading',
            rtlClass: 'owl-rtl',
            responsiveClass: 'owl-responsive',
            dragClass: 'owl-drag',
            itemClass: 'owl-item',
            stageClass: 'owl-stage',
            stageOuterClass: 'owl-stage-outer',
            grabClass: 'owl-grab',
            autoHeight: false,
            lazyLoad: false

        }
        //     {
        //     stagePadding: 2,
        //     loop: true,
        //     margin: 3,
        //   nav: true,
        //     navText: [
        //         '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        //         '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        //     ],
        //     navContainer: '.owl-carousel-parent .custom-nav',
        //   responsive: {
        //     0: {
        //       items: 1
        //     },
        //     768: {
        //       items: 4
        //     }
        //   }
        // }
    );
</script>

<script>
    /*  for more info : http://owlcarousel2.github.io/OwlCarousel2/docs/api-options.html */

    var owl2 = $(".association-carousel");
    owl2.owlCarousel(

        {
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,

            items: 6,
            loop: true,
            center: false,
            rewind: false,

            mouseDrag: true,
            touchDrag: true,
            pullDrag: true,
            freeDrag: false,

            margin: 15,
            stagePadding: 10,

            merge: false,
            mergeFit: true,
            autoWidth: false,

            startPosition: 0,
            rtl: false,

            smartSpeed: 250,
            fluidSpeed: false,
            dragEndSpeed: false,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            navContainer: '.assoc-carousel-parent .custom-nav',
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                480: {
                    items: 1,
                    nav: false
                },
                768: {
                    items: 3,
                    nav: true,
                    loop: false
                },
                992: {
                    items: 3,
                    nav: true,
                    loop: false
                },
                1200: {
                    items: 6,
                    nav: true,
                    loop: false
                }
            },
            responsiveRefreshRate: 200,
            responsiveBaseElement: window,

            fallbackEasing: 'swing',

            info: false,

            nestedItemSelector: false,
            itemElement: 'div',
            stageElement: 'div',

            refreshClass: 'owl-refresh',
            loadedClass: 'owl-loaded',
            loadingClass: 'owl-loading',
            rtlClass: 'owl-rtl',
            responsiveClass: 'owl-responsive',
            dragClass: 'owl-drag',
            itemClass: 'owl-item',
            stageClass: 'owl-stage',
            stageOuterClass: 'owl-stage-outer',
            grabClass: 'owl-grab',
            autoHeight: false,
            lazyLoad: false

        }
        //     {
        //     stagePadding: 2,
        //     loop: true,
        //     margin: 3,
        //   nav: true,
        //     navText: [
        //         '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        //         '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        //     ],
        //     navContainer: '.owl-carousel-parent .custom-nav',
        //   responsive: {
        //     0: {
        //       items: 1
        //     },
        //     768: {
        //       items: 4
        //     }
        //   }
        // }
    );
</script>

<script>
    //$(document).ready(function() {
    $('.flexslider').flexslider({
        animation: "fade",
        start: function (slider) {
            $('body').removeClass('loading');
        }
    });
    // });
</script>