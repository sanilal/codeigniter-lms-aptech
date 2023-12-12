<section class="home-banner-area" id="home-banner-area">
    <!-- <div class="cropped-home-banner" ></div> -->
    <div class="">
        <div class="row">
            <div class="col position-relative">

                <!-- Carousel -->
                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <?php $get_latest_banners = $this->crud_model->get_latest_banners(50);
                        // var_dump($banners); die(); 
                        ?>
                        <?php $banner_count = 1;
                        foreach ($get_latest_banners->result_array() as $latest_banner) : ?>
                            <div class="carousel-item <?php echo $banner_count == 1 ? 'active' : ''; ?>">
                                <?php $banner = 'uploads/banners/' . $latest_banner['banner']; ?>
                                <?php if (file_exists($banner) && is_file($banner)) : ?>
                                    <img src="<?php echo base_url($banner); ?>" class="card-img-top radius-top-10 d-block" alt="<?php echo $latest_banner['title']; ?>" style="width:100%">
                                <?php else : ?>
                                    <img src="<?php echo base_url('uploads/banners/placeholder.png'); ?>" class="card-img-top radius-top-10 d-block" alt="<?php echo $latest_banner['title']; ?>" style="width:100%">
                                <?php endif; ?>
                            </div>

                        <?php $banner_count++;
                        endforeach; ?>

                    </div>
                    <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <?php
    $banner_size = getimagesize("uploads/system/" . get_frontend_settings('banner_image'));
    $banner_ratio = $banner_size[0] / $banner_size[1];
    ?>
    <script type="text/javascript">
        var border_bottom = $('.home-banner-wrap').height() + 242;
        $('.cropped-home-banner').css('border-bottom', border_bottom + 'px solid #f1f7f8');
        mRight = Number("<?php echo $banner_ratio; ?>") * $('.home-banner-area').outerHeight();
        $('.cropped-home-banner').css('right', (mRight - 65) + 'px');
    </script>
</section>
<section class="home-fact-area">
    <div class="container-lg">
        <div class="row grid-divider">
            <?php $courses = $this->crud_model->get_courses(); ?>
            <div class="col-lg-3 col-md-6 col-sm-12 col-12 d-flex justify-content-center flex-column flex-md-row align-items-center justify-content-md-start">
                <div class="home-fact-box mr-md-auto mr-auto">
                    <!-- <i class="fas fa-bullseye float-start"></i> -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                        <image id="image0" width="100" height="100" x="0" y="0" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAMAAABHPGVmAAAAAXNSR0IArs4c6QAAAlVQTFRF////
                        zbkyzLkxzLkxzLkxzLkxzLkxzLoxyrowzLkxzLkyzLkxzLkxzLkxzLkxzLoxy7gvyrkwy7kwzbky
                        zrUxzbkwzLgxyrgv/4AAzLkxzLgxzLkxy7gxxsY5zLowzbgxzLkxzLkxzLowz78wzLszzbgyzLkx
                        zLkxzLoxy7cuy7kwzLkxzLkxy7cw1b8rzLgwzLkwzLkxzLkxzLoxzLkxzbkxy7oxyLYuzboyzLkw
                        y7kxxrgr0bkuzboyzbkxzLkxy7oyzLkwzLkxy7oxy7kxxLEn1aorzrkxy7kyzLMzzbkyzLkwy7sv
                        zLYzzLoxzLkxzbkwzLkxzLkxzLkxy7gwzLkxzboxzLowzbgyybkuzLkxzbkxzbsyzLkxzLkxzLsz
                        zroxzbkwzLkxzLgwyrk1zLkyy7kxzbcy0rQtzLkyy7gyzbkxzLkxy7gxzLkxzbgyzLkxzLkxzLkw
                        y7kxyrU1y7oyzLkxy7kyy7kuzLgxzbkxzbowyrcwzLgxzLkyzLszyLws0L0vzMwzzLkxy7kxzLox
                        zboxzLkwzbkw27YkzbkyzroxqqpVzLoxzLkxzLkxy7kyy7gyy7kxzboyzLgxzLgxzLkzzrYxzLgz
                        zLgxy7w1y7kxyroxy7owy7owzLkwzLkxv79Av79A//8Ay7kxzLkxzLkxzLoyzbowzLoxy7oxzLkx
                        yLY3zbkyzLkxzLkxzLgxzLgxzLkwzLkxzbcyzLkxzLkyzLgzzLkxz7cwzbgyzLgxzLkxzbsyzLkx
                        y7gwzLkxy7gxzLkxzrcxzLkxzLkx////LnD5hgAAAMV0Uk5TADPE7enq7L8wvbno9/HzcjY6RU0f
                        dX4rApbrpUQJVbH2/WQQHnDS230nj+KcQAxLru/a1fS7WRxryMESC1y2+nZ59a1JDQY+igpm3TEj
                        gfh/ae7ClP7KbyQh/MUp3OM8NI7ewx3Yt1IR8mzAzbzkYebRX1gYZ8lxLNmsYDWNmg8XGwVuxuCi
                        UFsHVxoDl/DWe4VUUXObNxUydyKoP55Ks8wECAHLsLW0eoxOxw5Mh8+4aGrXLpGkGecgPaarON9P
                        bV3lOdDE57/VAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAAWJQAAFiUBSVIk8AAAAAd0SU1FB+YDAwgK
                        DKSWchgAAAABb3JOVAHPoneaAAAD4ElEQVRo3mNgGAWjYBSMgiEPGJmYWSgGrGzsHPgs4TxKHcCF
                        zxIWKlnCTQ9LWPBZwg1UwMPLRwng5SHkE5Al/AKClAABfmIsEaIwhQoRY4kwhZYIU8ESEVExcdpa
                        IiEoKXX0KJ+0jCzNLJGVk1eAJFFFTiVlmliioqqmiJQV1DU0qW6JgJY2eo6T0tGlpiV6+gaGcLON
                        jOFME1MzZSpZYm5hiXC+lYW1ja2dPZyv5qBJBUskHNXhJjo5u7iCxNzcdZjhgtoenhRb4gU3zVvL
                        ByHs66cGlxCj2BIDqEn+AeaoEsqBQVCpYIotCYGaFBoWHoEsHhloFQWViqbYkphYeLDEScbDRBMS
                        kxCJIZliSxhSNFIRMZ+WngFM0S4GmcgZhgqWMDBkZJkgTAyzUMpG8HJyqWUJg1serno234tqllgX
                        ACOesxDV/DyQ94osqGrJ0eKS0jJECWlcXlEJ8kkWdS0pAgabcBU4byikmekxuKnTwJJqMLOmNo61
                        zl0CyKqPhVnCRD1LzKCchkYI3QQOrmYg0UIVS5RbgeJtNqiC7aC80gEyso0qlnQygUuPru4emEh9
                        TS+oEXdUt8m5r7+CKpYwTICW6s4TvSZNnmw7ZWoZpNwydmVwm9bAQB1LpiNqw9CoKDgbHk9UsYRh
                        BqLmQoComQxUtYRh1uwodDtSixmobAkDw5y5RkhNIjarLGvs6ihs3InMm6kzP3hBC+dsj+qEhbhU
                        UaEtvHCR5yK3xfhUEGUJXboOiWZFlACzRGIsoQYYtYS6lixZugw3WI5EYgdLlxBjyTwKk/A8YizR
                        xy0tskJrJQhorRDBrUifGEtw5/iMHHig52TgVEVhsbIKKWpxqxoKligjunWr11BmyVrc0uYr1k0E
                        gXUTzHErWkuhJUQBoixZv8GUErBh/aAoVqSoZIkUPktSqWRJKj5LAhVw6AolQRTYtdiIN2noZm3C
                        BsJBw6ybNwXCBQI3bQaKsDRjVZ01h6xkyeEENHIKipADUMRpC1mm4QBbgSbyoY7UxIDsTaSiHfWg
                        lvAG1ObcQi6gmNEaMk3EAtpBsemFJgge2VlFPUu2AY1j3Y4muJ31KHoniyzQtBAEJCJ3AI2bu3gh
                        Klg8FyhasFMCzGki14pdu+WXgkAVuDNXuGcpKtgDHjxIrgJz5KX3kmVH9z6SMnllAzmWzCOxKHEh
                        x5J2Ei1pJ8eS/SRasp9cS/oOdBwkDDoO9FFiySEJopRKHKLEEjaXw0RM/hx2YaPEklCTTCKmsTJN
                        Qsm1hC6paxWJlpDVlNrZR5IdQSLkWMJQfCRJnViQtL6YLDtGwSgYBaOAHAAAumsgEqJur7QAAAEy
                        ZVhJZk1NACoAAAAIAAcBEgADAAAAAQABAAABGgAFAAAAAQAAAGIBGwAFAAAAAQAAAGoBKAADAAAA
                        AQACAAABMQACAAAAHwAAAHIBMgACAAAAFAAAAJGHaQAEAAAAAQAAAKgAAADUAAAAkAAAAAEAAACQ
                        AAAAAUFkb2JlIFBob3Rvc2hvcCAyMi4zIChXaW5kb3dzKQAyMDIyOjAzOjAzIDEyOjA5OjUwAAAA
                        AAADoAEAAwAAAAEAAQAAoAIABAAAAAEAAABkoAMABAAAAAEAAABkAAAAAAAAAAYBAwADAAAAAQAG
                        AAABGgAFAAAAAQAAASIBGwAFAAAAAQAAASoBKAADAAAAAQACAAACAQAEAAAAAQAAATICAgAEAAAA
                        AQAAAAAAAAAAAAAASAAAAAEAAABIAAAAAXU8VzQAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjItMDMt
                        MDNUMDg6MTA6MTIrMDA6MDBo6oAzAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIyLTAzLTAzVDA4OjEw
                        OjEyKzAwOjAwGbc4jwAAACl0RVh0ZGM6Zm9ybWF0AGFwcGxpY2F0aW9uL3ZuZC5hZG9iZS5waG90
                        b3Nob3DkrZ9UAAAAEXRFWHRleGlmOkNvbG9yU3BhY2UAMQ+bAkkAAAAhdEVYdGV4aWY6RGF0ZVRp
                        bWUAMjAyMjowMzowMyAxMjowOTo1MBcc+s4AAAATdEVYdGV4aWY6RXhpZk9mZnNldAAxNjjFzWc/
                        AAAAGHRFWHRleGlmOlBpeGVsWERpbWVuc2lvbgAxMDBGMkBtAAAAGHRFWHRleGlmOlBpeGVsWURp
                        bWVuc2lvbgAxMDDbPaEbAAAALHRFWHRleGlmOlNvZnR3YXJlAEFkb2JlIFBob3Rvc2hvcCAyMi4z
                        IChXaW5kb3dzKdXPHBYAAAAcdEVYdGV4aWY6dGh1bWJuYWlsOkNvbXByZXNzaW9uADb5ZXBXAAAA
                        KHRFWHRleGlmOnRodW1ibmFpbDpKUEVHSW50ZXJjaGFuZ2VGb3JtYXQAMzA2QkmuRAAAACx0RVh0
                        ZXhpZjp0aHVtYm5haWw6SlBFR0ludGVyY2hhbmdlRm9ybWF0TGVuZ3RoADDWPa3AAAAAH3RFWHRl
                        eGlmOnRodW1ibmFpbDpSZXNvbHV0aW9uVW5pdAAyJUBe0wAAAB90RVh0ZXhpZjp0aHVtYm5haWw6
                        WFJlc29sdXRpb24ANzIvMdqHGCwAAAAfdEVYdGV4aWY6dGh1bWJuYWlsOllSZXNvbHV0aW9uADcy
                        LzF074m9AAAAOHRFWHRpY2M6Y29weXJpZ2h0AENvcHlyaWdodCAoYykgMTk5OCBIZXdsZXR0LVBh
                        Y2thcmQgQ29tcGFueflXeTcAAAAhdEVYdGljYzpkZXNjcmlwdGlvbgBzUkdCIElFQzYxOTY2LTIu
                        MVet2kcAAAAmdEVYdGljYzptYW51ZmFjdHVyZXIASUVDIGh0dHA6Ly93d3cuaWVjLmNoHH8ATAAA
                        ADd0RVh0aWNjOm1vZGVsAElFQyA2MTk2Ni0yLjEgRGVmYXVsdCBSR0IgY29sb3VyIHNwYWNlIC0g
                        c1JHQkRTSKkAAAAVdEVYdHBob3Rvc2hvcDpDb2xvck1vZGUAM1YCs0AAAAAmdEVYdHBob3Rvc2hv
                        cDpJQ0NQcm9maWxlAHNSR0IgSUVDNjE5NjYtMi4xHC9sCwAAABd0RVh0dGlmZjpYUmVzb2x1dGlv
                        bgAgICAxNDToBTo7AAAAF3RFWHR0aWZmOllSZXNvbHV0aW9uACAgIDE0NAdXjNoAAAAodEVYdHht
                        cDpDcmVhdGVEYXRlADIwMjItMDMtMDNUMTI6MDk6NTArMDQ6MDCnr7G4AAAALnRFWHR4bXA6Q3Jl
                        YXRvclRvb2wAQWRvYmUgUGhvdG9zaG9wIDIyLjMgKFdpbmRvd3MpteXUCAAAACp0RVh0eG1wOk1l
                        dGFkYXRhRGF0ZQAyMDIyLTAzLTAzVDEyOjA5OjUwKzA0OjAwL/XePwAAACh0RVh0eG1wOk1vZGlm
                        eURhdGUAMjAyMi0wMy0wM1QxMjowOTo1MCswNDowMBNRjYEAAAA9dEVYdHhtcE1NOkRvY3VtZW50
                        SUQAeG1wLmRpZDowZTc0ZTU5Ni02NzQzLTUxNDktYTY0Yy0xMjk2MzY1MGI2OTPDhYd8AAAAPXRF
                        WHR4bXBNTTpJbnN0YW5jZUlEAHhtcC5paWQ6MGU3NGU1OTYtNjc0My01MTQ5LWE2NGMtMTI5NjM2
                        NTBiNjkztaIQdgAAAEV0RVh0eG1wTU06T3JpZ2luYWxEb2N1bWVudElEAHhtcC5kaWQ6MGU3NGU1
                        OTYtNjc0My01MTQ5LWE2NGMtMTI5NjM2NTBiNjkzz1jpjwAAAABJRU5ErkJggg==" />
                    </svg>
                    <div class="text-box">
                        <h2><?php echo site_phrase('500+');
                            // $status_wise_courses = $this->crud_model->get_status_wise_courses();
                            // $number_of_courses = $status_wise_courses['active']->num_rows();
                            // echo $number_of_courses . ' ' . site_phrase('online_courses'); 
                            ?></h2>
                        <p><?php echo site_phrase('Online Courses'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-12 d-flex justify-content-center flex-column flex-md-row align-items-center justify-content-md-start">
                <div class="home-fact-box mr-md-auto mr-auto">
                    <!-- <i class="fa fa-check float-start"></i> -->

                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                        <image id="image0" width="100" height="100" x="0" y="0" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAMAAABHPGVmAAAAAXNSR0IArs4c6QAAAvdQTFRF////
                        y7gxzLkyzLkxy7kxyrgvybkuzLoxzLkxzbkxy7cwzbgyzLkxzLgyzbsyzLovy7oxzLkxzLkxy7ow
                        zLkxzLkxyLwszboyy7kxzboxzLkxzLgzzLgxzLkwzLkx0L0vzLkxy7kxzLkyzbkxzLkyybwvy7oy
                        y7kyzLkxzLkxzLkxzLkxzLowzLkxy7kuy7kxy7kwzbowzLkzzrkxy7owzbkxzLoxzLgwzLkxz78w
                        zLkxqqpVzLkxybw2z7cw/4AAzLkxzLkx1aory7w1zLkxzLkxzLkxzLkxzLkwyrU1zLkxzLkxyrkw
                        zLkxzLkxzbkyzLow1b8r0bkuzbkxzLkxzLkxzLgyzLkxzLkxxLEnzLgyzLkxzLkxy7kxzrYxzLkx
                        zLgwzLkxy7kwzLsz//8AzbgwzLkxyroxzLkxzLgxzMwzzroxzLkwzroxy7cuzbcyzLszzrcxzLkx
                        zLkxzbkxzLgxzLkxzLkxzLkyy7owzLgxzbkyzLMzxrgry7gvzbsyzLkyzbgyzbkxzbkyzLkwy7ky
                        zLgxzLkxzbgyzbkxzLkxzLkxzLkyzLgvy7kxyrcwzLkxzbgyy7oxy7oxzLgxy7kxzLkxzLkxzLkx
                        zrUxy7kwzboxzLkxyLYuy7kxzLkxzLoyzLowzLkxyrk1v79Azbkw0rQtzLkxzLoxzbgwzrYxzLgz
                        y7kxzLkxzLoxzbgyy7svxsY5zLkyzLkxzrgxzLgxzbkwzbcyzbkwzbkxzLgxzLkwzLkxy7gxy7kx
                        zbkwzbkwy7gxzLkxy7gy27YkzLkxzLkxyLY3y7gwzLkyzLkxy7gxzL8zy7kwzLkxzLgxzLoxzLkx
                        y7kyzLoxzLkwzLkzzLYzz7owzLkxy7kxzbgxv79AyrowzLoxzbgyzbkyzLszzboyy7gwzLoxzboy
                        zLkxzLkxzboxzbkyzLkyzLkwy7gyzbowzbsyy7gxzLox0bkuy7oyzroxzLgxzLkyzbkyzLkwy7ky
                        zLszzLkwzLgwzLkx////mMWhegAAAPt0Uk5TAETY/sYrIeD9xUBw/JBHRlnP+56R3BdrspPXGWiu
                        khuGqKSnlSZncfrz+JxvgyximWA3PkqYl0tuEOYDaRMgAuzxBiK69vXisxjp1DrQ7WZVDAvA3snO
                        6HgNn9vfwSrHw4ejDwFl0T+wjQVDahonUh458Oq2c5Ztqju4MwoSNimaPbtCX4CbfEis7vTyQWM1
                        5FatTtlY+bX3H4/K1hzL4bRkwh0EWxHv1YkVMrfEv2ExCbm9L+uOLn+dfsjaXUl1hLyhhQeg4w6U
                        08xeFEWlgn3Ne3JQKCMl51SxCDCMJEwtUU+BXNLlok2L3Wx6OFOIFnY0pq9XeYo8dFrdRMbXAAAA
                        AWJLR0QAiAUdSAAAAAlwSFlzAAAWJQAAFiUBSVIk8AAAAAd0SU1FB+YDAQcyGuaI9AQAAAABb3JO
                        VAHPoneaAAAIMUlEQVRo3u3ZfVhUVR4H8JNjOeqEMQpJKCgYjqj4QmAwITAyCqRoGsiLBsWIMsiL
                        Q6sBihqQCoilMGK+4SsZ+YJpoOu2JuT6ilvpVtambVqbpe5Lu+Z+/9lzZ+YOc2fuzNyB7vPU8/j7
                        A845c+75zL3nnnvOuUPIg3gQ/PFQD3Q1JD0fFmY80ovWlkq6EFJ6YO8+gpC+kD3q1q9L8Zg75P0F
                        IQPg4dnVK/04MFBQRS884d1VZBAwWFBFH/Tw7caZ/BYRzyFD/fz8/Ic9KSYSYBocj4qJDAcUIwKB
                        kWIio4DRQWPkGCsyMo6MV4iOBJBgcZCnQkJCQ0NCJpCnxUPCwo33VLjyGcGIMmLixLBIFxDvKEgU
                        CgmiVYMEIpOGx4SrJ0+JHeQtGImLx7NTp05DglBkugc727jPcIo8N3PmzOciiXc8ehMySyii9KGt
                        q59PTJpN/8uTHSAqQlJSe6Wlpc2Z+0JYPNIJyRCKvEiny5fcMonmkXlZgCzALjJ/QbZq6mTjKQ/X
                        uoTkKKBYqDGmcwcCCXl2kPwooGCRDoULegJ9XUJUL0P6O3MuIh1YzI8sUQOvKIt0KCY5UoxyCSlJ
                        QMbSzqybDOHLrJDS5bTjRtPlwYpMslKHV0mZxEWknF5fi2xkEhRlHERboYvPT3mNdtxoJTEiOa4i
                        q6BebZkfCZRbIr5raDdX0l6oWsKUdg2pQPVayzy9n2sskHXTTCPo9TeIc0RjB1kI+QzL/HrINpiQ
                        2jhSx4ydlzPon+nEMaKnSJ+Nq5byImX1lvMmiQiHbpMJyfJMphOe5E2t72Zgy3jnCB0Ag7fyIcu2
                        4fU8yy5CLHvdtjfQM4jeQdNbdwJZu0xIDPfu2h3AnOZKBULInmpg2lQehF4vxOxlM081Qv+QMTnA
                        0BVvBRsy+yjyNpNoqsQ7pEhKv3s49hNyAFHkIDMzluoxjJBDSXQwH+RBmg8D7x4xJJU1R4FhSmP5
                        e4wxuIBJho2Vwj2opbWiddWxeoT3j6H9VFGFKcePb4fej47f368oluLEsVSvAxK6qtgXGWDz7Nq0
                        jd6jqX/Ief+P+2mzAzONpcEnaPWTu5nkpA+A4lxVouCdw/w9to/63FMK9uOEtnZDkfYgPad444Ap
                        egL4cC9JGSigeUNDp+NqbJA/xR0ZySpbzpxa3/BqRvpZ+hA5V2r4+HwCpG3MGV246GwnEdyHXkic
                        O2TdJxfqxrrrZHqJ7ZfqiGM+b6+QQVdDhEVmqAzw97bqeM0Yd97dWGBV1CXDdYt4CZjyvkBDGUuv
                        15/brW7h5lTDA+Ojd9b4HVucffLjTxaOq7vsNr/0yJW/5BoqfLrTcPYCQ7sNn31uSFki2ZS4Wr78
                        C3tHrU2jY6hAqEFIUPKXxoTlJigagYNU9o+ZVw31X4UTFtHXYjsHDLFfsXkfs3o5X3fQ5Tj/dC1k
                        qWZENoEfeHtSs6d/l3fxTKSXmRE5L/JVx9HqtFpg9mcKmVRmDrmcWTKZMk6MxBbSiVzjMcI+Mlbc
                        ef365fyvO+ManR4X/82QvJw/F5Ve37QZooIupA60tnXGkG9u7CVOkHHAzVNbRnQssyqP+xaFF9jM
                        dzhh/vzvoHOM3eBHQiFfR1JadluX0xvhezatHIpbu9gMHR+8DTlCTqFxF0/x1h5oLLFECswfTafD
                        IpLYCX6kP3QTeYrpKPY3Z7hIbi10i1xDvHiRpecQ2PkQ4yLkJDBAQ/jDgGjyrHrYB408yAagZ2c3
                        WSEvRKFwF79hRH6Qp3Nf1Hih6iubqko6U9wg9hDaj/jREbIAsttWiOKKTdWVatRa3PzWyG05asMc
                        IOtRv84K0dsgGroWTib2EeVGduHJj6wRgiwvxOlPHSDkjgzvzuwmQtd8ZyzzNkhmIhRuLiA+tsje
                        XqhqcoiQURIMdQG5a4vQme4qp8AW+ccUqIOEI23Q53HrtSdC4uYEod8NXsKRIVAs59a7o8fOZmfI
                        lWh8u4kXoYtrf1tEUsIp0K4HdhBniIYuff7Jizwe1FJsi+BfnIJ1arxl/Yr43/DItSrKqce0CB4E
                        0bML9VCMd4wsBi5xD2z3/glzmlK4hV/QJ89/+BBDqFscIpsq0ci92C2b4wMhO9prD7e5x4BZts/i
                        7I5jHnSrUcNde71ohVwCQrnHlZu+nT+3uPkspGWEJ+iO2vQrxBH2fI5zEc9noS7lHhTn9UFxcXHM
                        K1bFzDs83gFJbwnjUF49IrrIWJTMRcbQ3YnNRYjU0LBpLPcWog7xIB+yLd41P2b/C5hv4fbS1emQ
                        tgr9+eEeXWvwrKxZREP3CGPNSBH7he9F19OdxOS0PCHEzxmnJahPm1ViD2mnm4QYLYuw7yh2N5i6
                        eKUQ5D1T5Y/tISl0l3DTl0XMvxW13D3j4+NzZrpKCNJ0OCspKels7HV7yMQRQFSTDeJaRGqZsL0h
                        WKSI7hqlxuX3j11G7AWL1DEXc5Sh6L5oSDKDGGfYH0RDQhnksMqEzBcHaYBMCo8wE1LWvUbtINok
                        3NyOwCsm5Fo3W+VHfOfgO7o+myAqUlKIVvr0ui8qMiEQNTeA15iiJWIhO4ANt4G5zGh9RizkOOp/
                        9g3ELWarcl4sZAXCH272QBTzbqRcJEQVSxc9msOQ3xERubAZvbXMqP/EiOSLgUzazrw6um9cllDk
                        DTGQQ/XwIeRrKTaqRELos2StYRVxuxI36dNrhhjIwn79siGhq8GCLYied/HivV8c6aCLEQkzKwbT
                        e6wn+ybpf78s8r2p2XBmL39PasxUL+p2u5zos9+drjCSsiqYFzAlfld/otFwN6Xb7T6IX2n8Hxis
                        1x0II5N6AAABMmVYSWZNTQAqAAAACAAHARIAAwAAAAEAAQAAARoABQAAAAEAAABiARsABQAAAAEA
                        AABqASgAAwAAAAEAAgAAATEAAgAAAB8AAAByATIAAgAAABQAAACRh2kABAAAAAEAAACoAAAA1AAA
                        AJAAAAABAAAAkAAAAAFBZG9iZSBQaG90b3Nob3AgMjIuMyAoV2luZG93cykAMjAyMjowMzowMSAx
                        MTo1MDoxMgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAAZKADAAQAAAABAAAAZAAAAAAAAAAG
                        AQMAAwAAAAEABgAAARoABQAAAAEAAAEiARsABQAAAAEAAAEqASgAAwAAAAEAAgAAAgEABAAAAAEA
                        AAEyAgIABAAAAAEAAAAAAAAAAAAAAEgAAAABAAAASAAAAAEB/EMtAAAAJXRFWHRkYXRlOmNyZWF0
                        ZQAyMDIyLTAzLTAxVDA3OjUwOjI1KzAwOjAwM8s6igAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0w
                        My0wMVQwNzo1MDoyNiswMDowMHN+mKsAAAApdEVYdGRjOmZvcm1hdABhcHBsaWNhdGlvbi92bmQu
                        YWRvYmUucGhvdG9zaG9w5K2fVAAAABF0RVh0ZXhpZjpDb2xvclNwYWNlADEPmwJJAAAAIXRFWHRl
                        eGlmOkRhdGVUaW1lADIwMjI6MDM6MDEgMTE6NTA6MTIdi1S8AAAAE3RFWHRleGlmOkV4aWZPZmZz
                        ZXQAMTY4xc1nPwAAABh0RVh0ZXhpZjpQaXhlbFhEaW1lbnNpb24AMTAwRjJAbQAAABh0RVh0ZXhp
                        ZjpQaXhlbFlEaW1lbnNpb24AMTAw2z2hGwAAACx0RVh0ZXhpZjpTb2Z0d2FyZQBBZG9iZSBQaG90
                        b3Nob3AgMjIuMyAoV2luZG93cynVzxwWAAAAHHRFWHRleGlmOnRodW1ibmFpbDpDb21wcmVzc2lv
                        bgA2+WVwVwAAACh0RVh0ZXhpZjp0aHVtYm5haWw6SlBFR0ludGVyY2hhbmdlRm9ybWF0ADMwNkJJ
                        rkQAAAAsdEVYdGV4aWY6dGh1bWJuYWlsOkpQRUdJbnRlcmNoYW5nZUZvcm1hdExlbmd0aAAw1j2t
                        wAAAAB90RVh0ZXhpZjp0aHVtYm5haWw6UmVzb2x1dGlvblVuaXQAMiVAXtMAAAAfdEVYdGV4aWY6
                        dGh1bWJuYWlsOlhSZXNvbHV0aW9uADcyLzHahxgsAAAAH3RFWHRleGlmOnRodW1ibmFpbDpZUmVz
                        b2x1dGlvbgA3Mi8xdO+JvQAAADh0RVh0aWNjOmNvcHlyaWdodABDb3B5cmlnaHQgKGMpIDE5OTgg
                        SGV3bGV0dC1QYWNrYXJkIENvbXBhbnn5V3k3AAAAIXRFWHRpY2M6ZGVzY3JpcHRpb24Ac1JHQiBJ
                        RUM2MTk2Ni0yLjFXrdpHAAAAJnRFWHRpY2M6bWFudWZhY3R1cmVyAElFQyBodHRwOi8vd3d3Lmll
                        Yy5jaBx/AEwAAAA3dEVYdGljYzptb2RlbABJRUMgNjE5NjYtMi4xIERlZmF1bHQgUkdCIGNvbG91
                        ciBzcGFjZSAtIHNSR0JEU0ipAAAAFXRFWHRwaG90b3Nob3A6Q29sb3JNb2RlADNWArNAAAAAJnRF
                        WHRwaG90b3Nob3A6SUNDUHJvZmlsZQBzUkdCIElFQzYxOTY2LTIuMRwvbAsAAAAXdEVYdHRpZmY6
                        WFJlc29sdXRpb24AICAgMTQ06AU6OwAAABd0RVh0dGlmZjpZUmVzb2x1dGlvbgAgICAxNDQHV4za
                        AAAAKHRFWHR4bXA6Q3JlYXRlRGF0ZQAyMDIyLTAzLTAxVDExOjE1OjUwKzA0OjAwRnfHWwAAAC50
                        RVh0eG1wOkNyZWF0b3JUb29sAEFkb2JlIFBob3Rvc2hvcCAyMi4zIChXaW5kb3dzKbXl1AgAAAAq
                        dEVYdHhtcDpNZXRhZGF0YURhdGUAMjAyMi0wMy0wMVQxMTo1MDoxMiswNDowMIsID8kAAAAodEVY
                        dHhtcDpNb2RpZnlEYXRlADIwMjItMDMtMDFUMTE6NTA6MTIrMDQ6MDC3rFx3AAAAS3RFWHR4bXBN
                        TTpEb2N1bWVudElEAGFkb2JlOmRvY2lkOnBob3Rvc2hvcDo5MDEzZGYzNy1iYWQ0LWNkNDgtYjUx
                        MS1hYjJhM2JjNWZlMjanb2TeAAAAPXRFWHR4bXBNTTpJbnN0YW5jZUlEAHhtcC5paWQ6NTU1YTgy
                        M2QtNmRjOC1jMzRjLWE0YTYtZTVkOWQ1OTE3ZWEyCEQVMgAAAEV0RVh0eG1wTU06T3JpZ2luYWxE
                        b2N1bWVudElEAHhtcC5kaWQ6YmY1OGM1MmYtMDZmMS0xMTRlLTk5YWUtOWIxOWQ5YjBlNTAyG+/H
                        lQAAAABJRU5ErkJggg==" />
                    </svg>
                    <div class="text-box">
                        <h2><?php echo site_phrase('100+'); ?></h2>
                        <p><?php echo site_phrase('Expert Instructors'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-12 d-flex justify-content-center flex-column flex-md-row align-items-center justify-content-md-start">
                <div class="home-fact-box mr-md-auto mr-auto">
                    <!-- <i class="fa fa-clock float-start"></i> -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                        <image id="image0" width="100" height="100" x="0" y="0" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAMAAABHPGVmAAAAAXNSR0IArs4c6QAAAtZQTFRF////
                        yrk1zLgvy7kxzLkxy7kwy7gxzLkxzLkxzLkxzLkxzLkxzLkxzLkwzLkxzLkxzLkyy7kwy7gyy7kx
                        y7cuzMwzyLYuzbkyzLkyzLkxzLkxzLkxzLkxy7owzLkwzbgyqqpVzrYxy7gxzLkxzLkxzLkxzLkx
                        zLoxz7owzroxzbkwzLkxzLgxy7ow//8AzbkyzbkxzLkxy7kx0bkuzbsyzLkwzLkxzLkxzLkxzbkx
                        zbgwzbkwzLgxzLowzbgwy7oyzLkwzbkwzbkxy7kxzLkxzLkyzLkxzbcyyrU1zLkxzLgxzLowzbsy
                        zLsz/4AA1b8rz7cwzbsyzLgxzbkxzLkyyrgvy7kxy7gxzrUxy7gxzLkxzLkxzLkx27Ykz78wy7gw
                        zLkxzLowzLgyybwvzLgwzboxzLowxLEnzLkxy7kwzLkxy7kyzLoxzLkxzbkyzLkyyrkwzLoxzLkx
                        zLgxzboyzLkxy7kyv79AzLoxzLkxy7oxzLoxzLgwy7kxzLkyy7w1y7cwy7kxyLY3zLkxzLkzzLkx
                        zLoxzroxzLszv79AzLkxzLkwy7kxybw2yLwszLgxzrYxy7kxzLgxy7kwzLgyzLkxzLMzzLov1aor
                        zLoyzLkxzbkxzLkxzLkxzLgxyrowzLkyzLkxy7gwzLkxzbgxzLkxxsY5y7gyzLkxzbkyzLkyzLkx
                        zLgxzLkxzbgyzLkwy7kyy7svzLszzLkxzLkxy7kyzLkxzbgyzLoxzLkwybkuzboyy7oyzLky0rQt
                        zroxzLkwzbkxzLgxzboyzLkxy7kxy7gvzbkyy7gxzbgyzLkxzbkxzbkwzLkxzLkxzLgzzrcxyrcw
                        zLoxzLkxzbgyzL8zzLkxy7ow0L0vzLkzzLkxzrgxzbkxzbowzLkxxrgrzbcyzLgyy7oxzboxzLgx
                        zLkyzLszy7kuzLkxy7kxzLkxzLYzzLkyyroxzLkxy7oxzLkx////hgZc9AAAAPB0Uk5TAB1BYoaj
                        vM/b4ufo5N3SwqqPbEknBRxNi8T76tCeXyQDFV2r5fG6ciU0ju+mSgFCrPTGCziu/vjanYl1aGRl
                        Z3SEmLLR8sdSGJGNVSkPAgwgR362rytUXh9Tpe14BxCU32/OJsPKqQ3MRfaKiGlXvjqMh5tc94AI
                        faBZ4EtjuSJAyw6hKN6/GjwE+VDBExfrKrdzmZ+9CkYGtNa7fM3ZMKSDT/2x5gmF6WbT4bhucLNx
                        MS3unHv8VpfIIVF22BFDecV3a/OoNjNESNTAf+xtGTk1gfVhFNc7GzfJL6d6lhIukK2igpUeLPpY
                        4yOaP7BOi2gGfAAAAAFiS0dEAIgFHUgAAAAJcEhZcwAAFiUAABYlAUlSJPAAAAAHdElNRQfmAwMI
                        Biekn8RUAAAAAW9yTlQBz6J3mgAABwNJREFUaN7tWelDFVUUH9xYVVxY3BDJByKC5BMQAwUURQWf
                        G4JaCKhoYIoSoaJgpCiYiSKWKYuigLiDPsEUcElxJbOMjBZNzahs/oR4597Z3szcGUA/9c6H9+ae
                        +7vzm7lz7rnnnEtRJjGJSUxiks6JWZeu3br3MLewtLK26dmrt22fvv36271OAnsHxwE2A2ljGTR4
                        iNNQ59fCMMzlreG0rGhc3UZ0msJ9pCWtIB6jPDszb16jvd9WogAZ46LtKMdYH1/+nfzGufqPfycg
                        cMLEoOCQSZNDBTRTpnaIImwa/y2sps8Ij+DNykzdrNlz5tpwAN95ke3nmD9O8KRRkqDoBQutWcii
                        d99rH0XMYsFM0bGycx4dF8+iXJe0hyN8KTPOYhn8JRDAy6NWsM/ioJ7jfWauE5PC5sDFSiJe+0FP
                        xjj6quVY5YGHrE6mqDVwtVZhiFkK8zLB6jg+9EPw1I/S2lrr4Hq94qgNzNsnzVTzHqkInL4Rmpug
                        keGlOC6zB2YZr8yxWYOg5tjsHaD1sYrHy/oEs7gpIbdsRcDsbVixHRmZmiWQ0weNzd1Bxuk+Rbje
                        OxlNZCIstM9UkFAUZtmVR0SNR6h4M1ZjHwua3cFue4LzE7yH9A0jDJ+5F40v2EcAfY4++nCeG/pi
                        v5HH/TKZNBMHEOigPCSrEC1BwZy6GPv1IjMCy6x0wGiKZRF70F0cBcqcEmOWQ6QJP1wKmCNy/fZH
                        kfEuF6rLyiuEJBZZJJYQwJRulOk+hAxQ3J15LKRHZXpsZcF+MDV6O4nE7DhgTqRJ9m5DS8RHct3Z
                        aSMitHZlqwFykkRCnQLMwC6SnRORHx1LusFIwJQQSZYXyYO8BkDfaeINAgFjTd6cziADy5PoOgtr
                        xPcwcXxVNdzgHBGUiRxyvkTXeeip3EkcT6F9Q3+BCKoBUK1O1JEzF3qmkTmooWhDqzhLwGhPo704
                        U9RzEWxL/5UCCXUJrZXLVbKIOh8E8e0n6hqthyfcRilIGnpM2rJeBrCEDUIaRH0BoL+ixNG22HBA
                        Fnq1TKp7swXrGbqLOh1Bn6JMQrkzIfiVqWKPfu06535qRb1fg/6MChLqxlbmNsvOuwtex64P38el
                        i0Yih7F02spT82/qFFiq2GiOHljYldPHJGCtBtbcINHAWu4JQsf5N5IDh5iaUg7OxnMxu7Em+xbs
                        KhUkEoN425NfZscyFnobr1/dEaxYH1EXq4qEdlVIa7QBd3Lx1OOdEjlPWn+XCQyUSeiNlII04r3M
                        Owea/fTIiwe2XUdbSZOgD29ecPsenu77VFOxfGRit70GR4HXvwFFWQbigESmf6j0h0cmHJSzrykZ
                        ebEUx4pE65AHkhQPvl2Ry5gXtq5itEDuQiNZxoR5i7EBuR74fZjx3fciCp+HnCUyFuwJzUdo2WyQ
                        WYw8t9JV+HEsGiIEyAvVXN/gH9BcRc635d83GBolIhLsIJvbLn/0M7KBxzd5wJ+4tHdR+bA2RXhA
                        yyNGdxzZ5Alo/Cwi4bn6fdnGlnY8nAOWYF1pfIOhFtF/yD2+4cMiDoNs1feWiIS/aTXiV9EwWRr9
                        C4trKsKq3FGNMRRVLyhYaFCIMgNmxVK8aVEHAdYLlu8qiJ1iPX+NykDf+DHrZn7jcupSq9o7gopF
                        /GyAePlDa5KzmKSYH0jYx7UkuBm+D+UGA8awJE3C/J6R3EFTnjhgx3rRBi80seCQyDiIRVY3j1N0
                        EzPcazlZ38whUHTnES1BIhPcPQFtEqdIq0k04qgURhW6y6AdJcXBhKlPhTkoMqZyvurGpcUh5eW1
                        +HOEphjFBXGg1o+WJMEBt5/QM/6OzCZQhM6pcnqW7z994hYjfTN61gzpgFs6dcA5i/4+pVKeI7xs
                        AUQqCWoyx/a6SR2HA/L4R2QTf8l0LvoEXmj1ygwU9QJNloYQYeLE1CaPr9TaIpbJdcocWvxE60gg
                        nGIXCnJP3VOkXaXI4XUOIbOJe7e4WGCQusegXKhIgkpK9K4/yDBR2QPECXSxCmUJZxxKvFSM2o0L
                        OCAjwNfmehJHZuFyBB2k+MZsKSqWf0sUZhwjjbuIixF8FyQvwqIaSCTyqy6EUX+2MhzOaki48uAd
                        JmFHSZz1X7JDzP5mvKXK8iCv0Jm6Bvx1/UtoPZfDc4XOVNWFTorKY7Ol1oMvqJgxcFk9VBqs40q2
                        6e0o2QqKz0eT/jkMe/AzSWR0XCG7sRzY0h6ONplRxI71iDdErr0lyjbRC0q4Lb+6oZ1ldMr4QICm
                        144gHwi8qmo3hUHGvuIX7Ev9LA7sXXP12oRNAUHl+cZHG7UdO9poE6/6pyoPaaI6fEhjEPcnrUoM
                        Hi2dOm4CGeZk+6YPzkCa/51+ZbjUEaD/6zoCxPKiS+DakgJzi9Y3dZhpEpOYxCT/R/kPuy+7zT2s
                        iooAAAEyZVhJZk1NACoAAAAIAAcBEgADAAAAAQABAAABGgAFAAAAAQAAAGIBGwAFAAAAAQAAAGoB
                        KAADAAAAAQACAAABMQACAAAAHwAAAHIBMgACAAAAFAAAAJGHaQAEAAAAAQAAAKgAAADUAAAAkAAA
                        AAEAAACQAAAAAUFkb2JlIFBob3Rvc2hvcCAyMi4zIChXaW5kb3dzKQAyMDIyOjAzOjAzIDEyOjA2
                        OjAyAAAAAAADoAEAAwAAAAEAAQAAoAIABAAAAAEAAABkoAMABAAAAAEAAABkAAAAAAAAAAYBAwAD
                        AAAAAQAGAAABGgAFAAAAAQAAASIBGwAFAAAAAQAAASoBKAADAAAAAQACAAACAQAEAAAAAQAAATIC
                        AgAEAAAAAQAAAAAAAAAAAAAASAAAAAEAAABIAAAAAUrWvKAAAAAldEVYdGRhdGU6Y3JlYXRlADIw
                        MjItMDMtMDNUMDg6MDY6MzkrMDA6MDDkWHwzAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIyLTAzLTAz
                        VDA4OjA2OjM5KzAwOjAwlQXEjwAAACl0RVh0ZGM6Zm9ybWF0AGFwcGxpY2F0aW9uL3ZuZC5hZG9i
                        ZS5waG90b3Nob3DkrZ9UAAAAEXRFWHRleGlmOkNvbG9yU3BhY2UAMQ+bAkkAAAAhdEVYdGV4aWY6
                        RGF0ZVRpbWUAMjAyMjowMzowMyAxMjowNjowMtwGf/EAAAATdEVYdGV4aWY6RXhpZk9mZnNldAAx
                        NjjFzWc/AAAAGHRFWHRleGlmOlBpeGVsWERpbWVuc2lvbgAxMDBGMkBtAAAAGHRFWHRleGlmOlBp
                        eGVsWURpbWVuc2lvbgAxMDDbPaEbAAAALHRFWHRleGlmOlNvZnR3YXJlAEFkb2JlIFBob3Rvc2hv
                        cCAyMi4zIChXaW5kb3dzKdXPHBYAAAAcdEVYdGV4aWY6dGh1bWJuYWlsOkNvbXByZXNzaW9uADb5
                        ZXBXAAAAKHRFWHRleGlmOnRodW1ibmFpbDpKUEVHSW50ZXJjaGFuZ2VGb3JtYXQAMzA2QkmuRAAA
                        ACx0RVh0ZXhpZjp0aHVtYm5haWw6SlBFR0ludGVyY2hhbmdlRm9ybWF0TGVuZ3RoADDWPa3AAAAA
                        H3RFWHRleGlmOnRodW1ibmFpbDpSZXNvbHV0aW9uVW5pdAAyJUBe0wAAAB90RVh0ZXhpZjp0aHVt
                        Ym5haWw6WFJlc29sdXRpb24ANzIvMdqHGCwAAAAfdEVYdGV4aWY6dGh1bWJuYWlsOllSZXNvbHV0
                        aW9uADcyLzF074m9AAAAOHRFWHRpY2M6Y29weXJpZ2h0AENvcHlyaWdodCAoYykgMTk5OCBIZXds
                        ZXR0LVBhY2thcmQgQ29tcGFueflXeTcAAAAhdEVYdGljYzpkZXNjcmlwdGlvbgBzUkdCIElFQzYx
                        OTY2LTIuMVet2kcAAAAmdEVYdGljYzptYW51ZmFjdHVyZXIASUVDIGh0dHA6Ly93d3cuaWVjLmNo
                        HH8ATAAAADd0RVh0aWNjOm1vZGVsAElFQyA2MTk2Ni0yLjEgRGVmYXVsdCBSR0IgY29sb3VyIHNw
                        YWNlIC0gc1JHQkRTSKkAAAAVdEVYdHBob3Rvc2hvcDpDb2xvck1vZGUAM1YCs0AAAAAmdEVYdHBo
                        b3Rvc2hvcDpJQ0NQcm9maWxlAHNSR0IgSUVDNjE5NjYtMi4xHC9sCwAAABd0RVh0dGlmZjpYUmVz
                        b2x1dGlvbgAgICAxNDToBTo7AAAAF3RFWHR0aWZmOllSZXNvbHV0aW9uACAgIDE0NAdXjNoAAAAo
                        dEVYdHhtcDpDcmVhdGVEYXRlADIwMjItMDMtMDNUMTI6MDY6MDIrMDQ6MDCJ2/V4AAAALnRFWHR4
                        bXA6Q3JlYXRvclRvb2wAQWRvYmUgUGhvdG9zaG9wIDIyLjMgKFdpbmRvd3MpteXUCAAAACp0RVh0
                        eG1wOk1ldGFkYXRhRGF0ZQAyMDIyLTAzLTAzVDEyOjA2OjAyKzA0OjAwAYGa/wAAACh0RVh0eG1w
                        Ok1vZGlmeURhdGUAMjAyMi0wMy0wM1QxMjowNjowMiswNDowMD0lyUEAAAA9dEVYdHhtcE1NOkRv
                        Y3VtZW50SUQAeG1wLmRpZDoyMTU5MzMxNi0xY2IxLTIyNGUtOGFjYy0zNDcyZDI3ODZjZmT9JK49
                        AAAAPXRFWHR4bXBNTTpJbnN0YW5jZUlEAHhtcC5paWQ6MjE1OTMzMTYtMWNiMS0yMjRlLThhY2Mt
                        MzQ3MmQyNzg2Y2ZkiwM5NwAAAEV0RVh0eG1wTU06T3JpZ2luYWxEb2N1bWVudElEAHhtcC5kaWQ6
                        MjE1OTMzMTYtMWNiMS0yMjRlLThhY2MtMzQ3MmQyNzg2Y2Zk8fnAzgAAAABJRU5ErkJggg==" />
                    </svg>

                    <div class="text-box">

                        <h2><?php echo site_phrase('Global'); ?></h2>
                        <p><?php echo site_phrase('Learn From Any Where'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-12 d-flex justify-content-center flex-column flex-md-row align-items-center justify-content-md-start">
                <div class="home-fact-box mr-md-auto mr-auto">
                    <!-- <i class="fa fa-clock float-start"></i> -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                        <image id="image0" width="100" height="100" x="0" y="0" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAMAAABHPGVmAAAAAXNSR0IArs4c6QAAAmFQTFRF////
                        zbgyzLkxzLkxzLkxzLkxzLkxzboyzLkxzLkxzLkxzLkxzLkxy7kxzboxzLkxzLkxzLgx/4AA//8A
                        zLkxzbkwzLoxzLkzzLgzyrowzbkyz7owy7kxzLkxzLkxzLkxy7owzLszzLoyzLgwzbkxzLkxzLky
                        y7w1yLYuzroxy7svzLgzzL8zzLkyzLkx0bkuzLkxzLkxzLky1aorv79A27Ykybw2zLYzybku0rQt
                        zLkxzLMzzLgxy7kxzLkwzbkwv79AzbgyzLszxrgrzLgyzLkxzLkxy7kwzLkxzLgxy7oyybwvzLkx
                        zLkxzLkxxsY51b8rzLkxzLgyzroxzbgwzLkxy7kxzbkwzbgyzLgwzbkxzLgvzLkxy7kyzLkyzLkx
                        zLkxzLgxzbkwzLgxy7oy0bkuzLkxzbgwzbcyzLkyzLkxy7kwyrcwzLkxy7kwzLgxyrU1zLkwzLkx
                        zbgyzLkxzLoxzLkxqqpVzLgxzboyy7kyzLkwzLkyy7kxzLkyzLoxzbgyzbkyzLkxzLkwy7gxzLkx
                        y7gwy7gwzLkxzrYxzbkxzbkxzLkwzLkyy7cwz7cwzLkxyLwszLkxzLkxzLgxy7cuzLkxzLkyzLgx
                        zLkxzLkxzLkxzLkyy7kxzboxzrcxzLkxzLkyyrgvzboxzbkyzbkxzLszzbkxzLoxzrkxzLkxzLkx
                        zLkxzbgxzbkwzbkxzLowzLoxzLgxzLkxzLkxzLkxy7gyy7kxzbsyzrgxzLoxy7kxz78wzLkxzLow
                        zLszzbowy7kxzLoxzLkwxLEnzLkxzLgwzLkxzbcyzLkx////2SXqRwAAAMl0Uk5TAGHX4d/i0lHl
                        6drn48bKx+ZzAgGGdYgoMjAzJUn7/vY7LbTDwMSvIhw0MRkU0/0LlsKLBggHEyMhEc8Km8vIjgQk
                        DxLO+YeZzI12JvPxvQkMyZBDibq3hD1Lu0H4e5reoX5/pmcW6mUu8uijNe6PaBhq5FacjKADuFxx
                        s75jqoFwQvWuvIOUT5IVnafd2EAg0RfQ9+snbpWC9NbtpFSTOfq5K6JMrDzFfT78tc2xW5ipv9nw
                        1OyFWCkv1bIQkW8eYGJyUA3cWm1SlJqq0wAAAAFiS0dEAIgFHUgAAAAJcEhZcwAAFiUAABYlAUlS
                        JPAAAAAHdElNRQfmAwMIDDjTeCErAAAAAW9yTlQBz6J3mgAAA9JJREFUaN7tmfk/FGEYwCdJB0t2
                        sK6ldaQiK2vtrk12oyKkopvuY7uULkqllEqpTRQ6lUpJKd33fTz/Ve+YYffd0jQz7/j4Yb4/mPd5
                        5/F8P+N9593XuxSloKAwnBnhNdJbMKN8RguSjAFR+AiSjBUnGSdI4gvgp/IXRMB4AC+hkkBKLQSa
                        ChIlEYgYSbBQSYgiUSQSJJrQMI7wCLkkkVqI4oDoCTJJdDGxcRzxExPk+nP9G0VCUZMmT+FlcqI0
                        SdLUZC0vySq9JIk+JX4aL7GpBoljkmbkJU3qmAhgmEvSTWZeTBZpEksG8M8uiLNKkuinZ87gJTPL
                        JnFM1DQvaqljIoBhLrHYE3ixz5Qmyc6Z9R/E9b3zs8VKrHNyA3jJzZO6dg3FmMgsmTt0kiRNPi8a
                        8WtXnyTdv6CQl4J5RUyumNnVJ5k/3Z9/di1YKHp2cWNiLeLFKnVMBEBSYrPJLCkqLlmUkbF4yVLD
                        X26KHnicZdP6TwWWr5DpSQwlWtfZQ2mZWg6JeiVTfNXqNWvX+TGtVDkkc1HhUeuzmeaGwI0o2ERe
                        4tgMkJPfH4WOA9hiwjMIDPxWgDEaV7htO0A56SeJKATY4d5RBuC7k7CkAlWwunck7QLYTViyB2Av
                        nrIPIISspLIKYD+ecgBgHVlJWizAMjxlP0A1TVRiOAjgcVR6CGAi2SehD/9xlBcEsJKshKoBiME6
                        aBXAEcKSo8lQG4Z1aCF6CmGJMQfgmNs4G+MAjmPjTmLtQuMMda7wBApP4hkE1i7DclT2VD0bTDqN
                        gjOVeAaJpd7cgAqfLTvnNBfXeaPm+UaPBCKfjKEXmM+qpo3NpcxVddHzPpmNRI372f+lP24TkTi3
                        uEsa6mWRtOBfY7TKIdG1scUzLrPXK2YZJFfZ2lHF17hHuU5ecqOdLX2TNixgW7W3pEs8/p2rZiu3
                        o63jSe5ROvAMMW88PkdvR7GF76A2PY/bRd7FUlpFSDrzTnCklFvUnWzdaIct6B51v4uNHlCJLS1c
                        0vWsbqES7JWAh/QjrtVDjWAWxsdcGGl7giX2CpI0u//q0wj9M7b13GnpRZPY6Chg4wB1eKl4SUjT
                        wFFtF7xgdl3cCxgMWi3aBfe/mC+pHugaOLotFPZlm/qVbgBHWr03W3JkImUP0+nCnJSJe9Spev1r
                        V6JJkMMDtGfY3ATYVuIFMwsKRJxbDIbmzdsKeweaO+9cfY1ol/r+4oeq7o+EJIl29OMTwGf3zi8A
                        X9Elv15czb/jiOo2usffvrcliK01KFavH3jHTx9aXKV/cc2Kx9m/yDsUFBTk5TcRC1L8z7Z36AAA
                        ATJlWElmTU0AKgAAAAgABwESAAMAAAABAAEAAAEaAAUAAAABAAAAYgEbAAUAAAABAAAAagEoAAMA
                        AAABAAIAAAExAAIAAAAfAAAAcgEyAAIAAAAUAAAAkYdpAAQAAAABAAAAqAAAANQAAACQAAAAAQAA
                        AJAAAAABQWRvYmUgUGhvdG9zaG9wIDIyLjMgKFdpbmRvd3MpADIwMjI6MDM6MDMgMTI6MTI6NDIA
                        AAAAAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAGSgAwAEAAAAAQAAAGQAAAAAAAAABgEDAAMAAAAB
                        AAYAAAEaAAUAAAABAAABIgEbAAUAAAABAAABKgEoAAMAAAABAAIAAAIBAAQAAAABAAABMgICAAQA
                        AAABAAAAAAAAAAAAAABIAAAAAQAAAEgAAAABUwAdWwAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAyMi0w
                        My0wM1QwODoxMjo1NiswMDowMBwaeucAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMjItMDMtMDNUMDg6
                        MTI6NTYrMDA6MDBtR8JbAAAAKXRFWHRkYzpmb3JtYXQAYXBwbGljYXRpb24vdm5kLmFkb2JlLnBo
                        b3Rvc2hvcOStn1QAAAARdEVYdGV4aWY6Q29sb3JTcGFjZQAxD5sCSQAAACF0RVh0ZXhpZjpEYXRl
                        VGltZQAyMDIyOjAzOjAzIDEyOjEyOjQyCmgEEgAAABN0RVh0ZXhpZjpFeGlmT2Zmc2V0ADE2OMXN
                        Zz8AAAAYdEVYdGV4aWY6UGl4ZWxYRGltZW5zaW9uADEwMEYyQG0AAAAYdEVYdGV4aWY6UGl4ZWxZ
                        RGltZW5zaW9uADEwMNs9oRsAAAAsdEVYdGV4aWY6U29mdHdhcmUAQWRvYmUgUGhvdG9zaG9wIDIy
                        LjMgKFdpbmRvd3Mp1c8cFgAAABx0RVh0ZXhpZjp0aHVtYm5haWw6Q29tcHJlc3Npb24ANvllcFcA
                        AAAodEVYdGV4aWY6dGh1bWJuYWlsOkpQRUdJbnRlcmNoYW5nZUZvcm1hdAAzMDZCSa5EAAAALHRF
                        WHRleGlmOnRodW1ibmFpbDpKUEVHSW50ZXJjaGFuZ2VGb3JtYXRMZW5ndGgAMNY9rcAAAAAfdEVY
                        dGV4aWY6dGh1bWJuYWlsOlJlc29sdXRpb25Vbml0ADIlQF7TAAAAH3RFWHRleGlmOnRodW1ibmFp
                        bDpYUmVzb2x1dGlvbgA3Mi8x2ocYLAAAAB90RVh0ZXhpZjp0aHVtYm5haWw6WVJlc29sdXRpb24A
                        NzIvMXTvib0AAAA4dEVYdGljYzpjb3B5cmlnaHQAQ29weXJpZ2h0IChjKSAxOTk4IEhld2xldHQt
                        UGFja2FyZCBDb21wYW55+Vd5NwAAACF0RVh0aWNjOmRlc2NyaXB0aW9uAHNSR0IgSUVDNjE5NjYt
                        Mi4xV63aRwAAACZ0RVh0aWNjOm1hbnVmYWN0dXJlcgBJRUMgaHR0cDovL3d3dy5pZWMuY2gcfwBM
                        AAAAN3RFWHRpY2M6bW9kZWwASUVDIDYxOTY2LTIuMSBEZWZhdWx0IFJHQiBjb2xvdXIgc3BhY2Ug
                        LSBzUkdCRFNIqQAAABV0RVh0cGhvdG9zaG9wOkNvbG9yTW9kZQAzVgKzQAAAACZ0RVh0cGhvdG9z
                        aG9wOklDQ1Byb2ZpbGUAc1JHQiBJRUM2MTk2Ni0yLjEcL2wLAAAAF3RFWHR0aWZmOlhSZXNvbHV0
                        aW9uACAgIDE0NOgFOjsAAAAXdEVYdHRpZmY6WVJlc29sdXRpb24AICAgMTQ0B1eM2gAAACh0RVh0
                        eG1wOkNyZWF0ZURhdGUAMjAyMi0wMy0wM1QxMjoxMjo0MiswNDowMMX0hDgAAAAudEVYdHhtcDpD
                        cmVhdG9yVG9vbABBZG9iZSBQaG90b3Nob3AgMjIuMyAoV2luZG93cym15dQIAAAAKnRFWHR4bXA6
                        TWV0YWRhdGFEYXRlADIwMjItMDMtMDNUMTI6MTI6NDIrMDQ6MDBNruu/AAAAKHRFWHR4bXA6TW9k
                        aWZ5RGF0ZQAyMDIyLTAzLTAzVDEyOjEyOjQyKzA0OjAwcQq4AQAAAD10RVh0eG1wTU06RG9jdW1l
                        bnRJRAB4bXAuZGlkOmRhYmVmMjY2LTEzMmUtMDA0ZC1hNTNlLTI2NzNmMjJkNmM1OMRXqwEAAAA9
                        dEVYdHhtcE1NOkluc3RhbmNlSUQAeG1wLmlpZDpkYWJlZjI2Ni0xMzJlLTAwNGQtYTUzZS0yNjcz
                        ZjIyZDZjNTiycDwLAAAARXRFWHR4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQAeG1wLmRpZDpkYWJl
                        ZjI2Ni0xMzJlLTAwNGQtYTUzZS0yNjczZjIyZDZjNTjIisXyAAAAAElFTkSuQmCC" />
                    </svg>

                    <div class="text-box">
                        <h2><?php echo site_phrase('Certificate'); ?></h2>
                        <p><?php echo site_phrase('Goverment Certificates'); ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section class=" gray-bg mb-5 pt-5">
    <div class="container-lg">

        <div class="row justify-content-center">


            <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
            <?php foreach ($top_10_categories as $top_10_category) : ?>
                <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array();
                ?>


                <div class="col-md-6 col-lg-4 col-xl-4 mb-3 ps-5 pe-5 p-sm-2">
                    <div class="card-container">
                        <img src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $category_details['thumbnail']); ?>" alt="Notebook" style="width:100%;">
                        <div class="content text-center">
                            <h3><a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>"> <?php echo $category_details['name']; ?></a></h3>
                            <p><?php echo 'Over ' . $top_10_category['course_number'] . ' ' . site_phrase('courses'); ?></p>
                        </div>
                    </div>

                </div>


            <?php endforeach; ?>

            <?php /* $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
            <?php foreach ($top_10_categories as $top_10_category) : ?>
                <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array();
                //var_dump( base_url('uploads/thumbnails/category_thumbnails/'.$category_details['thumbnail']) ); 
                ?>
                <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
                    <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="top-categories">
                        <div class="course-image">
                            <img src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $category_details['thumbnail']); ?>" class="img-fluid">
                        </div>
                        <div class="category-icon">
                            <i class="<?php echo $category_details['font_awesome_class']; ?>"></i>
                        </div>
                        <div class="category-title">
                            <?php echo $category_details['name']; ?>
                            <p><?php echo $top_10_category['course_number'] . ' ' . site_phrase('courses'); ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div> */ ?>
        </div>
</section>

<section class="course-carousel-area p-5 p-sm-3">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h3 class="course-carousel-title sec-title mb-4"><?php echo site_phrase('top_courses'); ?></h3>
                <!-- page loader -->
                <div class="animated-loader">
                    <div class="spinner-border text-secondary" role="status"></div>
                </div>


                <div class="col-12  text-end">
                    <a class="btn yellow-btn mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="btn yellow-btn mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div id="carouselExampleIndicators2" class="carousel slide top-course-carousel" data-ride="carousel">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <?php $top_course_count = 1;
                                    $top_courses = $this->crud_model->get_top_courses()->result_array();
                                    $cart_items = $this->session->userdata('cart_items');
                                    foreach ($top_courses as $top_course) : ?>
                                        <?php //echo $top_course_count; 
                                        if ($top_course_count % 5 == 0) { ?>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                <?php } ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                                   
                                        <div class="card">
                                            <div class="card-img-header">
                                                <div class="row">
                                                    <div class="offset-md-10 col-md-2 text-start">
                                                        <a class="wishlist-btn <?php if ($this->crud_model->is_added_to_wishlist($top_course['id'])) echo 'active'; ?>" title="Add to wishlist" onclick="handleWishList(this)" id="<?php echo $top_course['id']; ?>"><i class="fas fa-heart"></i></a>
                                                        <!-- <i class="far fa-heart"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="img-cnt" style=" position: relative;
  text-align: center;
  color: white;">
                                                      <img class="img-fluid" src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>">
                                            <!-- card img header -->

                                            <!-- card img footer -->
                                            <div class="card-img-footer">



                                                <div class="row">
                                                    <div class="offset-md-2 col-md-10 text-start">
                                                        <?php if ($top_course['multi_instructor']) :
                                                            $instructor_details = $this->user_model->get_multi_instructor_details_with_csv($top_course['user_id']);
                                                            $margin = 0;
                                                            foreach ($instructor_details as $key => $instructor_detail) {
                                                                echo $instructor_detail['first_name'] . ' ' . $instructor_detail['last_name'];
                                                            }
                                                        else :
                                                            $user_details = $this->user_model->get_all_user($top_course['user_id'])->row_array();
                                                            //var_dump($user_details);
                                                            echo $user_details['first_name'] . ' ' . $user_details['last_name'];
                                                        endif; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="floating-user d-inline-block">
                                                            <?php if ($top_course['multi_instructor']) :
                                                                $instructor_details = $this->user_model->get_multi_instructor_details_with_csv($top_course['user_id']);
                                                                $margin = 0;
                                                                foreach ($instructor_details as $key => $instructor_detail) { ?>
                                                                    <img style="margin-left: <?php echo $margin; ?>px;" class="position-absolute" src="<?php echo $this->user_model->get_user_image_url($instructor_detail['id']); ?>" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $instructor_detail['first_name'] . ' ' . $instructor_detail['last_name']; ?>" onclick="return check_action(this,'<?php echo site_url('home/instructor_page/' . $instructor_detail['id']); ?>');">
                                                                    <?php $margin = $margin + 17; ?>
                                                                <?php } ?>
                                                            <?php else : ?>
                                                                <?php $user_details = $this->user_model->get_all_user($top_course['user_id'])->row_array(); ?>
                                                                <img src="<?php echo $this->user_model->get_user_image_url($user_details['id']); ?>" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?>" onclick="return check_action(this,'<?php echo site_url('home/instructor_page/' . $user_details['id']); ?>');">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="rating d-inline-block">
                                                            <?php
                                                            $total_rating =  $this->crud_model->get_ratings('course', $top_course['id'], true)->row()->rating;
                                                            $number_of_ratings = $this->crud_model->get_ratings('course', $top_course['id'])->num_rows();
                                                            if ($number_of_ratings > 0) {
                                                                $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                                            } else {
                                                                $average_ceil_rating = 0;
                                                            }
                                                            for ($i = 1; $i < 6; $i++) : ?>
                                                                <?php if ($i <= $average_ceil_rating) : ?>
                                                                    <i class="fas fa-star filled"></i>
                                                                <?php else : ?>
                                                                    <i class="far fa-star"></i>
                                                                <?php endif; ?>
                                                                <?php endfor; ?>/<span class="text-dark text-12px text-white ms-2 d-inline-block">(<?php echo $number_of_ratings . ' ' . site_phrase('reviews'); ?>)</span>
                                                                <!-- <div class="d-inline-block">
                                                        <span class="text-dark ms-1 text-15px">(<?php //echo $average_ceil_rating; 
                                                                                                ?>)</span> -->

                                                                <!-- </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            </div>
                                     

                                            <!-- card header end -->
                                            <div class="card-body">
                                                 <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>">
                                                <h4 class="card-title"><?php echo $top_course['title']; ?></h4>
                                                </a>
                                                <p class="card-text"><?php echo word_limiter($top_course['short_description'], 11); ?></p>


                                                <!-- <div class="d-block"> -->


                                                <!-- </div> -->
                                            </div>

                                            <div class="card-footer border-top border-bottom">
                                                <div class="row">
                                                    <div class="col-6 col-md-7">
                                                        <p class="student-count text-left d-inline-block float-start">
                                                        <?php $student_count = $this->crud_model->get_student_count_by_course($top_course['id']);
                                                       //var_dump($student_count); die();
                                                         ?>
                                                        
                                                            <i class="fas fa-users"></i>&nbsp;&nbsp;<b><?php echo $student_count['student_count']; ?></b> Student
                                                        </p>
                                                    </div>
                                                    <div class="col-6 col-md-5">
                                                        <?php if ($top_course['is_free_course'] == 1) : ?>
                                                            <p class="price text-right d-inline-block float-end"><?php echo site_phrase('free'); ?></p>
                                                        <?php else : ?>
                                                            <?php /*if ($top_course['discount_flag'] == 1) : ?>
                                                    <p class="price text-right d-inline-block float-end"><small><?php echo currency($top_course['price']); ?></small><?php echo currency($top_course['discounted_price']); ?></p>
                                                <?php else : ?>*/ ?>
                                                            <p class="price text-right d-inline-block float-end"><?php echo currency($top_course['price']); ?></p>
                                                            <?php //endif; 
                                                            ?>
                                                        <?php endif; ?>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    
                                </div>



                            <?php $top_course_count++;
                                    endforeach; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php /* <div class="course-carousel shown-after-loading" style="display: none;">
                    <?php $top_courses = $this->crud_model->get_top_courses()->result_array();
                    $cart_items = $this->session->userdata('cart_items');
                    foreach ($top_courses as $top_course) : ?>
                        <?php
                        $lessons = $this->crud_model->get_lessons('course', $top_course['id']);
                        $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($top_course['id']);
                        ?>
                        <div class="course-box-wrap">
                            <a onclick="return check_action(this);" href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>" class="has-popover">
                                <div class="course-box">
                                    <div class="course-image">
                                        <img src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>" alt="" class="img-fluid">
                                    </div>
                                    <div class="course-details">
                                        <h5 class="title"><?php echo $top_course['title']; ?></h5>
                                        <div class="rating">
                                            <?php
                                            $total_rating =  $this->crud_model->get_ratings('course', $top_course['id'], true)->row()->rating;
                                            $number_of_ratings = $this->crud_model->get_ratings('course', $top_course['id'])->num_rows();
                                            if ($number_of_ratings > 0) {
                                                $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                            } else {
                                                $average_ceil_rating = 0;
                                            }
                                            for ($i = 1; $i < 6; $i++) : ?>
                                                <?php if ($i <= $average_ceil_rating) : ?>
                                                    <i class="fas fa-star filled"></i>
                                                <?php else : ?>
                                                    <i class="fas fa-star"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                            <div class="d-inline-block">
                                                <span class="text-dark ms-1 text-15px">(<?php echo $average_ceil_rating; ?>)</span>
                                                <span class="text-dark text-12px text-muted ms-2">(<?php echo $number_of_ratings . ' ' . site_phrase('reviews'); ?>)</span>
                                            </div>
                                        </div>
                                        <div class="d-flex text-dark">
                                            <div class="">
                                                <i class="far fa-clock text-14px"></i>
                                                <span class="text-muted text-12px"><?php echo $course_duration; ?></span>
                                            </div>
                                            <div class="ms-3">
                                                <i class="far fa-list-alt text-14px"></i>
                                                <span class="text-muted text-12px"><?php echo $lessons->num_rows() . ' ' . site_phrase('lectures'); ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <span class="badge badge-sub-warning text-11px"><?php echo site_phrase($top_course['level']); ?></span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button class="brn-compare-sm" onclick="return check_action(this, '<?php echo site_url('home/compare?course-1=' . rawurlencode(slugify($top_course['title'])) . '&&course-id-1=' . $top_course['id']); ?>');"><i class="fas fa-balance-scale"></i> <?php echo site_phrase('compare'); ?></button>
                                            </div>
                                        </div>
                                        <hr class="divider-1">
                                        <div class="d-block">
                                            <div class="floating-user d-inline-block">
                                                <?php if ($top_course['multi_instructor']) :
                                                    $instructor_details = $this->user_model->get_multi_instructor_details_with_csv($top_course['user_id']);
                                                    $margin = 0;
                                                    foreach ($instructor_details as $key => $instructor_detail) { ?>
                                                        <img style="margin-left: <?php echo $margin; ?>px;" class="position-absolute" src="<?php echo $this->user_model->get_user_image_url($instructor_detail['id']); ?>" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $instructor_detail['first_name'] . ' ' . $instructor_detail['last_name']; ?>" onclick="return check_action(this,'<?php echo site_url('home/instructor_page/' . $instructor_detail['id']); ?>');">
                                                        <?php $margin = $margin + 17; ?>
                                                    <?php } ?>
                                                <?php else : ?>
                                                    <?php $user_details = $this->user_model->get_all_user($top_course['user_id'])->row_array(); ?>
                                                    <img src="<?php echo $this->user_model->get_user_image_url($user_details['id']); ?>" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?>" onclick="return check_action(this,'<?php echo site_url('home/instructor_page/' . $user_details['id']); ?>');">
                                                <?php endif; ?>
                                            </div>
                                            <?php if ($top_course['is_free_course'] == 1) : ?>
                                                <p class="price text-right d-inline-block float-end"><?php echo site_phrase('free'); ?></p>
                                            <?php else : ?>
                                                <?php if ($top_course['discount_flag'] == 1) : ?>
                                                    <p class="price text-right d-inline-block float-end"><small><?php echo currency($top_course['price']); ?></small><?php echo currency($top_course['discounted_price']); ?></p>
                                                <?php else : ?>
                                                    <p class="price text-right d-inline-block float-end"><?php echo currency($top_course['price']); ?></p>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="webui-popover-content">
                                <div class="course-popover-content">
                                    <?php if ($top_course['last_modified'] == "") : ?>
                                        <div class="last-updated fw-500"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $top_course['date_added']); ?></div>
                                    <?php else : ?>
                                        <div class="last-updated"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $top_course['last_modified']); ?></div>
                                    <?php endif; ?>
                                    <div class="course-title">
                                        <a class="text-decoration-none text-15px" href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>"><?php echo $top_course['title']; ?></a>
                                    </div>
                                    <div class="course-meta">
                                        <?php if ($top_course['course_type'] == 'general') : ?>
                                            <span class=""><i class="fas fa-play-circle"></i>
                                                <?php echo $this->crud_model->get_lessons('course', $top_course['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                                            </span>
                                            <span class=""><i class="far fa-clock"></i>
                                                <?php echo $course_duration; ?>
                                            </span>
                                        <?php elseif ($top_course['course_type'] == 'scorm') : ?>
                                            <span class="badge bg-light"><?= site_phrase('scorm_course'); ?></span>
                                        <?php endif; ?>
                                        <span class=""><i class="fas fa-closed-captioning"></i><?php echo ucfirst($top_course['language']); ?></span>
                                    </div>
                                    <div class="course-subtitle"><?php echo $top_course['short_description']; ?></div>
                                    <div class="what-will-learn">
                                        <ul>
                                            <?php
                                            $outcomes = json_decode($top_course['outcomes']);
                                            foreach ($outcomes as $outcome) : ?>
                                                <li><?php echo $outcome; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="popover-btns">
                                        <?php if (is_purchased($top_course['id'])) : ?>
                                            <div class="purchased">
                                                <a href="<?php echo site_url('home/my_courses'); ?>"><?php echo site_phrase('already_purchased'); ?></a>
                                            </div>
                                        <?php else : ?>
                                            <?php if ($top_course['is_free_course'] == 1) :
                                                if ($this->session->userdata('user_login') != 1) {
                                                    $url = "#";
                                                } else {
                                                    $url = site_url('home/get_enrolled_to_free_course/' . $top_course['id']);
                                                } ?>
                                                <a href="<?php echo $url; ?>" class="btn green radius-10" onclick="handleEnrolledButton()"><?php echo site_phrase('get_enrolled'); ?></a>
                                            <?php else : ?>
                                                <button type="button" class="btn red add-to-cart-btn <?php if (in_array($top_course['id'], $cart_items)) echo 'addedToCart'; ?> big-cart-button-<?php echo $top_course['id']; ?>" id="<?php echo $top_course['id']; ?>" onclick="handleCartItems(this)">
                                                    <?php
                                                    if (in_array($top_course['id'], $cart_items))
                                                        echo site_phrase('added_to_cart');
                                                    else
                                                        echo site_phrase('add_to_cart');
                                                    ?>
                                                </button>
                                            <?php endif; ?>
                                            <button type="button" class="wishlist-btn <?php if ($this->crud_model->is_added_to_wishlist($top_course['id'])) echo 'active'; ?>" title="Add to wishlist" onclick="handleWishList(this)" id="<?php echo $top_course['id']; ?>"><i class="fas fa-heart"></i></button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>*/ ?>
            </div>
        </div>
    </div>
</section>
<?php /*
<section class="course-carousel-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h3 class="course-carousel-title mb-4"><?php echo site_phrase('top') . ' 10 ' . site_phrase('latest_courses'); ?></h3>
                <!-- page loader -->
                <div class="animated-loader">
                    <div class="spinner-border text-secondary" role="status"></div>
                </div>
                <div class="course-carousel shown-after-loading" style="display: none;">
                    <?php
                    $latest_courses = $this->crud_model->get_latest_10_course();
                    foreach ($latest_courses as $latest_course) : ?>
                        <?php
                        $lessons = $this->crud_model->get_lessons('course', $latest_course['id']);
                        $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($latest_course['id']);
                        ?>
                        <div class="course-box-wrap">
                            <a onclick="return check_action(this);" href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" class="has-popover">
                                <div class="course-box">
                                    <div class="course-image">
                                        <img src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>" alt="" class="img-fluid">
                                    </div>
                                    <div class="course-details">
                                        <h5 class="title"><?php echo $latest_course['title']; ?></h5>
                                        <div class="rating">
                                            <?php
                                            $total_rating =  $this->crud_model->get_ratings('course', $latest_course['id'], true)->row()->rating;
                                            $number_of_ratings = $this->crud_model->get_ratings('course', $latest_course['id'])->num_rows();
                                            if ($number_of_ratings > 0) {
                                                $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                            } else {
                                                $average_ceil_rating = 0;
                                            }
                                            for ($i = 1; $i < 6; $i++) : ?>
                                                <?php if ($i <= $average_ceil_rating) : ?>
                                                    <i class="fas fa-star filled"></i>
                                                <?php else : ?>
                                                    <i class="fas fa-star"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                            <div class="d-inline-block">
                                                <span class="text-dark ms-1 text-15px">(<?php echo $average_ceil_rating; ?>)</span>
                                                <span class="text-dark text-12px text-muted ms-2">(<?php echo $number_of_ratings . ' ' . site_phrase('reviews'); ?>)</span>
                                            </div>
                                        </div>
                                        <div class="d-flex text-dark">
                                            <div class="">
                                                <i class="far fa-clock text-14px"></i>
                                                <span class="text-muted text-12px"><?php echo $course_duration; ?></span>
                                            </div>
                                            <div class="ms-3">
                                                <i class="far fa-list-alt text-14px"></i>
                                                <span class="text-muted text-12px"><?php echo $lessons->num_rows() . ' ' . site_phrase('lectures'); ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <span class="badge badge-sub-warning text-11px"><?php echo site_phrase($latest_course['level']); ?></span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button class="brn-compare-sm" onclick="return check_action(this, '<?php echo site_url('home/compare?course-1=' . rawurlencode(slugify($latest_course['title'])) . '&&course-id-1=' . $latest_course['id']); ?>');"><i class="fas fa-balance-scale"></i> <?php echo site_phrase('compare'); ?></button>
                                            </div>
                                        </div>
                                        <hr class="divider-1">
                                        <div class="d-block">
                                            <div class="floating-user d-inline-block">
                                                <?php if ($latest_course['multi_instructor']) :
                                                    $instructor_details = $this->user_model->get_multi_instructor_details_with_csv($latest_course['user_id']);
                                                    $margin = 0;
                                                    foreach ($instructor_details as $key => $instructor_detail) { ?>
                                                        <img style="margin-left: <?php echo $margin; ?>px;" class="position-absolute" src="<?php echo $this->user_model->get_user_image_url($instructor_detail['id']); ?>" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $instructor_detail['first_name'] . ' ' . $instructor_detail['last_name']; ?>" onclick="return check_action(this,'<?php echo site_url('home/instructor_page/' . $instructor_detail['id']); ?>');">
                                                        <?php $margin = $margin + 17; ?>
                                                    <?php } ?>
                                                <?php else : ?>
                                                    <?php $user_details = $this->user_model->get_all_user($latest_course['user_id'])->row_array(); ?>
                                                    <img src="<?php echo $this->user_model->get_user_image_url($user_details['id']); ?>" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?>" onclick="return check_action(this,'<?php echo site_url('home/instructor_page/' . $user_details['id']); ?>');">
                                                <?php endif; ?>
                                            </div>
                                            <?php if ($latest_course['is_free_course'] == 1) : ?>
                                                <p class="price text-right d-inline-block float-end"><?php echo site_phrase('free'); ?></p>
                                            <?php else : ?>
                                                <?php if ($latest_course['discount_flag'] == 1) : ?>
                                                    <p class="price text-right d-inline-block float-end"><small><?php echo currency($latest_course['price']); ?></small><?php echo currency($latest_course['discounted_price']); ?></p>
                                                <?php else : ?>
                                                    <p class="price text-right d-inline-block float-end"><?php echo currency($latest_course['price']); ?></p>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="webui-popover-content">
                                <div class="course-popover-content">
                                    <?php if ($latest_course['last_modified'] == "") : ?>
                                        <div class="last-updated fw-500"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $latest_course['date_added']); ?></div>
                                    <?php else : ?>
                                        <div class="last-updated"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $latest_course['last_modified']); ?></div>
                                    <?php endif; ?>
                                    <div class="course-title">
                                        <a class="text-decoration-none text-15px" href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>"><?php echo $latest_course['title']; ?></a>
                                    </div>
                                    <div class="course-meta">
                                        <?php if ($latest_course['course_type'] == 'general') : ?>
                                            <span class=""><i class="fas fa-play-circle"></i>
                                                <?php echo $this->crud_model->get_lessons('course', $latest_course['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                                            </span>
                                            <span class=""><i class="far fa-clock"></i>
                                                <?php echo $course_duration; ?>
                                            </span>
                                        <?php elseif ($latest_course['course_type'] == 'scorm') : ?>
                                            <span class="badge bg-light"><?= site_phrase('scorm_course'); ?></span>
                                        <?php endif; ?>
                                        <span class=""><i class="fas fa-closed-captioning"></i><?php echo ucfirst($latest_course['language']); ?></span>
                                    </div>
                                    <div class="course-subtitle"><?php echo $latest_course['short_description']; ?></div>
                                    <div class="what-will-learn">
                                        <ul>
                                            <?php
                                            $outcomes = json_decode($latest_course['outcomes']);
                                            foreach ($outcomes as $outcome) : ?>
                                                <li><?php echo $outcome; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="popover-btns">
                                        <?php if (is_purchased($latest_course['id'])) : ?>
                                            <div class="purchased">
                                                <a href="<?php echo site_url('home/my_courses'); ?>"><?php echo site_phrase('already_purchased'); ?></a>
                                            </div>
                                        <?php else : ?>
                                            <?php if ($latest_course['is_free_course'] == 1) :
                                                if ($this->session->userdata('user_login') != 1) {
                                                    $url = "#";
                                                } else {
                                                    $url = site_url('home/get_enrolled_to_free_course/' . $latest_course['id']);
                                                } ?>
                                                <a href="<?php echo $url; ?>" class="btn green radius-10" onclick="handleEnrolledButton()"><?php echo site_phrase('get_enrolled'); ?></a>
                                            <?php else : ?>
                                                <button type="button" class="btn red add-to-cart-btn <?php if (in_array($latest_course['id'], $cart_items)) echo 'addedToCart'; ?> big-cart-button-<?php echo $latest_course['id']; ?>" id="<?php echo $latest_course['id']; ?>" onclick="handleCartItems(this)">
                                                    <?php
                                                    if (in_array($latest_course['id'], $cart_items))
                                                        echo site_phrase('added_to_cart');
                                                    else
                                                        echo site_phrase('add_to_cart');
                                                    ?>
                                                </button>
                                            <?php endif; ?>
                                            <button type="button" class="wishlist-btn <?php if ($this->crud_model->is_added_to_wishlist($latest_course['id'])) echo 'active'; ?>" title="Add to wishlist" onclick="handleWishList(this)" id="<?php echo $latest_course['id']; ?>"><i class="fas fa-heart"></i></button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>*/ ?>
<!-- new start -->
<!-- <div class="row justify-content-center"> -->
<!-- design : https://www.screencast.com/t/cGptu0FF8v  -->
<section class="featured-instructor gray-bg p-5 p-sm-3">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h3 class="sec-title mb-5"><?php echo site_phrase('featured_instructor'); ?></h3>
            </div>
        </div>

        <div class="row justify-content-center flex-column flex-md-row align-items-center justify-content-md-start">
            <!-- <div class="container-fluid">  -->
            <div class="owl-carousel-parent ">
                <div class="instructor-carousel owl-carousel">
                    <?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
                    <?php foreach ($top_instructor_ids as $top_instructor_id) : ?>
                        <?php $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array(); ?>
                        <div class="item">
                            <a class="text-decoration-none" href="<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>">
                                <div class="owl_img">
                                    <img src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>" alt="Instructor Image">
                                </div>
                                <div class="text">
                                    <h2><?php echo $top_instructor['first_name'] . ' ' . $top_instructor['last_name']; ?></h2>
                                    <p><?php echo ellipsis($top_instructor['title'], 60); ?></p>
                                </div>
                            </a>
                        </div>




                        <?php /*
                        <div class="d-sm-flex text-center text-md-start">
                            <div class="top-instructor-img ms-auto me-auto">
                                <a href="<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>">
                                    <img src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>" width="100%">
                                </a>
                            </div>
                            <div class="top-instructor-details">
                                <a class="text-decoration-none" href="<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>">
                                    <h4 class="mb-1 fw-700"><?php echo $top_instructor['first_name'] . ' ' . $top_instructor['last_name']; ?></h4>
                                    <span class="fw-500 text-muted text-14px"><?php echo ellipsis($top_instructor['title'], 60); ?></span>
                                    <p class="text-12px fw-500 text-muted my-3"><?php echo ellipsis(strip_tags($top_instructor['biography']), 100); ?></p>
                                    <?php $skills = explode(',', $top_instructor['skills']); ?>
                                    <?php foreach ($skills as $skill) : ?>
                                        <span class="badge badge-sub-warning text-12px my-1 py-2"><?php echo $skill; ?></span>
                                    <?php endforeach; ?>
                                </a>
                                <p class="top-instructor-arrow my-3">
                                    <span class="cursor-pointer" onclick="$('.top-istructor-slick .slick-prev').click();"><i class="fas fa-angle-left"></i></span>
                                    <span class="cursor-pointer" onclick="$('.top-istructor-slick .slick-next').click();"><i class="fas fa-angle-right"></i></span>
                                </p>
                            </div>
                        </div> */ ?>
                    <?php endforeach; ?>

                </div>
                <div class="owl-theme">
                    <div class="owl-controls">
                        <div class="custom-nav owl-nav"></div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>

<!-- </div> -->
<!-- new end -->

<section class="fourth-block p-5 p-sm-3">
<div class="container-lg overflow-hidden">
      

        <div class="row justify-content-center w-100">
    <!-- <div class="row p-0 m-0"> -->
        <div class="col-12 col-lg-6 col-md-8 col-sm-6 offset-lg-6 offset-md-4">
            <div class="testimonial-holder">
                <h2><?php echo site_phrase('our_happy_students'); ?></h2>
                <div class="flexslider">
                    <ul class="slides">
                    <?php $get_latest_testimonials = $this->crud_model->get_latest_testimonials(50);
                        // var_dump($banners); die(); 
                        ?>
                        <?php $testi_count = 1;
                        foreach ($get_latest_testimonials->result_array() as $latest_testimonial) : ?>
                          <li>
                            <div class="row">

                                <div class="col-12 client-words">

                                    <p>
                                    <?php echo strip_tags(htmlspecialchars_decode($latest_testimonial['description'])); ?>
                                    </p>
                                    <h5>
                                    <?php echo $latest_testimonial['author']; ?><br>
                                        <span><?php echo $latest_testimonial['position']; ?></span>
                                    </h5>
                                </div>
                            </div>
                        </li>
                          

                        <?php $testi_count++;
                        endforeach; ?>

                      
<?php /*
                        <li>
                            <div class="row">

                                <div class="col-12 client-words">

                                    <p>
                                        “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.”
                                    </p>
                                    <h5>
                                        <!--<img src="img/client.png" class="img-responsive">-->
                                        <!-- <img alt="Muhammed Ahanas" class="img-responsive" src="#"> -->
                                        Muhammed Ahanas<br>
                                        <span>Director - Diya Motors</span>
                                    </h5>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="row">

                                <div class="col-12 client-words">

                                    <p>
                                        “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.”
                                    </p>
                                    <h5>
                                        <!--<img src="img/client.png" class="img-responsive">-->
                                        <!-- <img alt="George Sebastian" class="img-responsive" src="#">  -->
                                        George Sebastian<br>
                                        <span>Director - Minerva Foods Corporation</span>
                                    </h5>
                                </div>
                            </div>
                        </li>
                        */ ?>

                    </ul>
                    <!-- <ol class="flex-control-nav flex-control-paging">
                        <li><a class="flex-active">1</a></li>
                        <li><a class="">2</a></li>
                        <li><a class="">3</a></li>
                    </ol> -->
                </div>
            </div>

        </div>
        </div>

    </div>
</section>


<section class="associations-instructor p-5 p-sm-3">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h3 class="sec-title mb-5"><?php echo site_phrase('our_associations_with'); ?></h3>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- <div class="container-fluid">  -->
            <div class="assoc-carousel-parent">
                <div class="owl-carousel association-carousel">
                <?php $get_latest_partners = $this->crud_model->get_latest_partners(50);
                        // var_dump($banners); die(); 
                        ?>
                        <?php $testi_count = 1;
                        foreach ($get_latest_partners->result_array() as $latest_partner) : ?>
                         <div class="item">
                        <div class="owl_img1">
                        <?php $partner_logo = 'uploads/partners/' . $latest_partner['logo']; ?>
                                <?php if (file_exists($partner_logo) && is_file($partner_logo)) : ?>
                                    <img src="<?php echo base_url($partner_logo); ?>" alt="<?php echo $latest_partner['title']; ?>" >
                                <?php else : ?>
                                    <img src="<?php echo base_url('uploads/banners/placeholder.png'); ?>"  alt="<?php echo $latest_partner['title']; ?>" >
                                <?php endif; ?>
                            <!-- <img src="<?php //echo base_url('uploads/associations/cmi-logo.png'); ?>" alt="<?php //echo $latest_partner['title']; ?>"> -->
                        </div>
                    </div>

                         
                          

                        <?php $testi_count++;
                        endforeach; ?>

              

                </div>
                <div class="owl-theme">
                    <div class="owl-controls">
                        <div class="custom-nav owl-nav"></div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>
<?php /*
<section class="featured-instructor">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h3 class="text-center mb-5"><?php echo site_phrase('featured_instructor'); ?></h3>
            </div>
        </div>
      
        <div class="row justify-content-center">
      
            <div class="col-md-9 col-lg-7 ">
                <div class="animated-loader">
                    <div class="spinner-border text-secondary" role="status"></div>
                </div>
                <div class="top-istructor-slick shown-after-loading" style="display: none;">
                    <?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
                    <?php foreach ($top_instructor_ids as $top_instructor_id) : ?>
                        <?php $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array(); ?>
                        <div class="d-sm-flex text-center text-md-start">
                            <div class="top-instructor-img ms-auto me-auto">
                                <a href="<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>">
                                    <img src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>" width="100%">
                                </a>
                            </div>
                            <div class="top-instructor-details">
                                <a class="text-decoration-none" href="<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>">
                                    <h4 class="mb-1 fw-700"><?php echo $top_instructor['first_name'] . ' ' . $top_instructor['last_name']; ?></h4>
                                    <span class="fw-500 text-muted text-14px"><?php echo ellipsis($top_instructor['title'], 60); ?></span>
                                    <p class="text-12px fw-500 text-muted my-3"><?php echo ellipsis(strip_tags($top_instructor['biography']), 100); ?></p>
                                    <?php $skills = explode(',', $top_instructor['skills']); ?>
                                    <?php foreach ($skills as $skill) : ?>
                                        <span class="badge badge-sub-warning text-12px my-1 py-2"><?php echo $skill; ?></span>
                                    <?php endforeach; ?>
                                </a>
                                <p class="top-instructor-arrow my-3">
                                    <span class="cursor-pointer" onclick="$('.top-istructor-slick .slick-prev').click();"><i class="fas fa-angle-left"></i></span>
                                    <span class="cursor-pointer" onclick="$('.top-istructor-slick .slick-next').click();"><i class="fas fa-angle-right"></i></span>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section> */ ?>
<?php /* if (get_frontend_settings('blog_visibility_on_the_home_page')) : ?>
    <section class="section-blog py-5">
        <div class="container-lg">
            <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 g-4 justify-content-center">
                <div class="col-12">
                    <h4 class="fw-700"><?php echo site_phrase('latest_blogs'); ?></h4>
                </div>
                <?php $latest_blogs = $this->crud_model->get_latest_blogs(4); ?>
                <?php foreach ($latest_blogs->result_array() as $latest_blog) : ?>
                    <?php $user_details = $this->user_model->get_all_user($latest_blog['user_id'])->row_array(); ?>
                    <div class="col">
                        <div class="card radius-10">
                            <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail']; ?>
                            <?php if (file_exists($blog_thumbnail) && is_file($blog_thumbnail)) : ?>
                                <img src="<?php echo base_url($blog_thumbnail); ?>" class="card-img-top radius-top-10" alt="<?php echo $latest_blog['title']; ?>">
                            <?php else : ?>
                                <img src="<?php echo base_url('uploads/blog/thumbnail/placeholder.png'); ?>" class="card-img-top radius-top-10" alt="<?php echo $latest_blog['title']; ?>">
                            <?php endif; ?>
                            <div class="card-body pt-4">
                                <p class="card-text">
                                    <small class="text-muted"><?php echo site_phrase('created_by'); ?> - <a href="<?php echo site_url('home/instructor_page/' . $latest_blog['user_id']); ?>"><?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?></a></small>
                                </p>
                                <h5 class="card-title"><a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>"><?php echo $latest_blog['title']; ?></a></h5>
                                <p class="card-text ellipsis-line-3">
                                    <?php echo strip_tags(htmlspecialchars_decode($latest_blog['description'])); ?>
                                </p>
                                <a class="fw-600" href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>"><?php echo site_phrase('more_details'); ?></a>
                                <p class="card-text mt-2 mb-0">
                                    <small class="text-muted text-12px"><?php echo site_phrase('published'); ?> - <?php echo get_past_time($latest_blog['added_date']); ?></small>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="col-12">
                    <a class="float-end btn btn-outline-secondary px-3 fw-600" href="<?php echo site_url('blogs'); ?>"><?php echo site_phrase('view_all'); ?></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; */ ?>
<?php /*<div class="container-xl">
    <div class="row justify-content-evenly py-3 mb-4">
        <div class="col-md-6 <?php if (get_settings('allow_instructor') != 1) echo 'w-100'; ?> mt-3 mt-md-0">
            <div class="become-user-label text-center mt-3">
                <h3 class="pb-4"><?php echo site_phrase('join_now_to_start_learning'); ?></h3>
                <a href="<?php echo site_url('home/sign_up'); ?>"><?php echo site_phrase('get_started'); ?></a>
            </div>
        </div>
        <?php if (get_settings('allow_instructor') == 1) : ?>
            <div class="col-md-6">
                <div class="become-user-label text-center mt-3">
                    <h3 class="pb-4"><?php echo site_phrase('become_instructor'); ?></h3>
                    <?php if ($this->session->userdata('user_id')) : ?>
                        <a href="<?php echo site_url('user/become_an_instructor'); ?>"><?php echo site_phrase('join_now'); ?></a>
                    <?php else : ?>
                        <a href="<?php echo site_url('home/sign_up'); ?>"><?php echo site_phrase('join_now'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>*/ ?>
<script type="text/javascript">
    function handleWishList(elem) {
        $.ajax({
            url: '<?php echo site_url('home/handleWishList'); ?>',
            type: 'POST',
            data: {
                course_id: elem.id
            },
            success: function(response) {
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
            success: function(response) {
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
                    success: function(response) {
                        $('#wishlist_items').html(response);
                    }
                });
            }
        });
    }

    function handleEnrolledButton() {
        $.ajax({
            url: '<?php echo site_url('home/isLoggedIn'); ?>',
            success: function(response) {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                }
            }
        });
    }
    $(document).ready(function() {
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
        start: function(slider) {
            $('body').removeClass('loading');
        }
    });
    // });
</script>