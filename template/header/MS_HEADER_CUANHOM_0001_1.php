<!--MENU MOBILE-->

<?php include_once DIR_MENU."MS_MENU_CUANHOM_0002.php"; ?>

<!-- End menu mobile-->



<!--MENU DESTOP-->

<header>
    <!-- <meta property="fb:app_id" content="2594804287251571"/> -->
    <!-- <meta property="fb:admins" content="2594804287251571" /> -->
    <div class="gb-header-cuanhom">

        <div class="header-top" style="background: #1daaa3;">

            <div class="container gb-top-header_cuanhom">

                <div class="row">

                    <div class="col-md-6 col-sm-6 col-xs-12">

                        <div class="gb-top-header_cuanhom-left">

                            <ul>

                                <li><i class="fa fa-phone" aria-hidden="true"></i><span>LIÊN HỆ NGAY:
                                    +<?= $rowConfig['content_home3'] ?></span></li>

                            </ul>
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-6 hidden-xs">

                        <div class="gb-top-header_cuanhom-right">

                            <ul class="list_top_right1">
                                <li class="top_right">
                                    <a href="/thong-tin-tai-khoan" class="link_top_right2"><i class=""></i>TÀI KHOẢN</a>
                                    <ul class="list_account">
                                    </ul>
                                </li>
                                <li style="color: #fff;">|</li>
                                <li class="top_right">
                                    <a href="/gio-hang" class="link_top_right2"><i class=""></i>GIỎ HÀNG</a>
                                </li>
                                <li style="color: #fff;">|</li>
                                <li class="top_right">
                                    <a href="lien-he" class="link_top_right2"><i class=""></i>ĐỊA CHỈ</a>
                                </li>
                                <li style="color: #fff;">|</li>
                                <li class="top_right" id="search">
                                <a href="lien-he" class="link_top_right2"style="font-size:11px;"><i class=""></i>LIÊN HỆ</a>
                                    <!--<a class="link_top_right2"style="font-size:11px;"><i class="lienhe" ></i>LIÊN HỆ</a>
                                    <div class="box_search_pc" id="sub-search" style="display: none;">
                                        <form style="width:100%;position:relative" action="" method="">
                                            <input type="search" value="" name="txtSearch"
                                                placeholder="Tìm kiếm sản phẩm">
                                            <button type="submit"><i class="iconfont-search2"></i></button>
                                        </form>
                                    </div>-->
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        <div class="gb-menu-mobile-liyii" style="">
            <div class="row">
                <div class="col-xs-5">
                    <a href="/"><img src="/images/<?= $rowConfig['web_logo'] ?>" style="width: 100%;" alt=""></a>
                </div>
                <div class="col-xs-5">
                    <!-- <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="color: #000;   font-weight: 1400;"></i> -->
                    <ul class="">
                        <li class="" style="float: right;margin-top: 6px;">
                            <a href="/yeu-thich" class="link_top_right1"><i class="far fa-heart-o"
                                    style="color: #dc4242"></i></a>
                        </li>
                        <li class="">
                            <?php include DIR_CART."MS_CART_CUANHOM_0004.php";?>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-2 mobile-menu-container">
                    <div class="menu-mobile-nav" style="margin-top: 30px;">
                        <span class="icon-bar"><i class="fa fa-bars" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>


        <nav id="fixMenuScroll" class="gb-main-menu_cuanhom sticky-menu" style="">
            <div class="top-menu">
                <div class="container">
                    <div class="gb-header-bottom_cuanhom">

                        <div class="row">

                            <div class="col-md-4 col-sm-4 hidden-xs">

                                <?php include DIR_MENU."MS_MENU_CUANHOM_0001.php";?>

                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                                <a href="https://liyii.vn/" class="lgHeaderRSP"><img src="/images/<?= $rowConfig['web_logo'] ?>"
                                        alt="logo" class="img-responsive"></a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-8 thongtin">
                                <div class="gb-top-header_cuanhom">
                                    <div class="gb-top-header_cuanhom-right">
                                        <ul class="list_top_right">
                                            <li class="top_right" style="top:-28px">
                                                <?php if (!isset($_SESSION['user_id_gbvn'])) { ?>
                                                <a href="/dang-nhap" style=""><i class="tai-khoan"
                                                        style="">Đăng nhập/Đăng ký</i></a>
                                                <?php } else { ?>
                                                <a href="/dang-xuat" style=""><i class="tai-khoan"
                                                        style="font-size: 14px;color: #000;top: -2px;">Đăng xuất</i></a>
                                                <?php } ?>
                                            </li>
                                            <!--tìm kiếm-->
                                            <li class="" id="">
                                                <div class="gb-search-center_vyhofoco">
                                                    <div class="icons-search" id="search-click">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                        <div class="search" style="    position: absolute;">
                                                            <div class="search-frm">
                                                                <form role="search"  class="search-form" action="/search-product/0" method="post">
                                                                    <input type="text" class="search-field" placeholder="Tìm kiếm dịch vụ..." name="q">
                                                                    <button type="button" class="close-search" ><a href="/timkiem">
                                                                    <i class="fa fa-close"  aria-hidden="true" style=""></a>
                                                                    </i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    document.querySelector('.searchbox [type="reset"]')
                                                        .addEventListener('click', function () {
                                                            this.parentNode.querySelector('input').focus();
                                                        });
                                                </script>


                                                <!--<form style="" action="/search-product/0" method="post">
                                                    <input type="search" value="" name="q"
                                                        placeholder="Tìm kiếm sản phẩm">
                                                    <span class="tim">
                                                        <button type="submit ;"><i class="glyphicon glyphicon-search"
                                                                style="color: #248ab3;font-size: 28px;"></i></button>
                                                    </span>
                                                </form>-->
                                                <!--</div>-->
                                            </li>
                                            <!--yêu thích-->
                                            <li class="top_right">
                                                <a href="/yeu-thich" class="link_top_right1"><i
                                                        class="fa fa-heart-o"
                                                        style="color: #000"></i></a>
                                            </li>
                                            <!--tài khoản-->
                                            <li class="top_right">
                                                <?php include DIR_CART."MS_CART_CUANHOM_0004.php";?>
                                                <ul class="list_account">
                                                </ul>
                                            </li>

                                        </ul>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </div>

</header>





<script>
    //$(document).ready(function () {

    // $(".sticky-menu").sticky({topSpacing:0});

    //});

    // $(document).ready(function () {

    //     $(".gb-menu-mobile-liyii").sticky({topSpacing:0});

    // });
</script>
<script src="/plugin/sticky/jquery.sticky.js"></script>
<script>
    $(document).ready(function () {
        $(".sticky-menu").sticky({
            topSpacing: 0
        });
    });
</script>
<script type="text/javascript">
    function show_search() {
        // alert('search');
        var box = document.getElementsByClassName("box_search_pc")[0].style.display;
        // var box = document.getElementsByClassName("box_search_pc");
        // alert(box.length);
        if (box == 'none') {
            document.getElementsByClassName("box_search_pc")[0].style.display = 'block';
            document.getElementsByClassName("box_search_pc")[1].style.display = 'block';
        } else {
            document.getElementsByClassName("box_search_pc")[0].style.display = 'none';
            document.getElementsByClassName("box_search_pc")[1].style.display = 'none';
        }
    }
</script>
<script>
    $(document).ready(function () {
        //-----------------search-----------------------
        $('#search-click').on('click', function(e) {
            if( $(e.target).is('#search-click, i')){
                $('.close-search').fadeIn();
                $('.search').css('visibility', 'visible');
                $('.search-field').removeClass('none-search');
                $('.search-field').addClass('block-search');
                return false;
            }
        });
        $('.search-frm').on('click', function(e) {
            if($(e.target).is('.close-search, .close-search i')){
                $('.close-search').hide();
                $('.search').css('visibility', 'hidden');
                $('.search-field').removeClass('block-search');
                $('.search-field').addClass('none-search');
                return false;
            }
        });
    });
</script>