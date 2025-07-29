<!--MENU MOBILE-->

<?php include_once DIR_MENU."MS_MENU_CUANHOM_0002.php"; ?>

<!-- End menu mobile-->



<!--MENU DESTOP-->

<header>
    <!-- <meta property="fb:app_id" content="2594804287251571"/> -->
    
    <div class="gb-header-cuanhom">

        <div class="header-top" style="background: #1daaa3;">

            <div class="container gb-top-header_cuanhom">

                <div class="row">

                    <div class="col-md-6 col-sm-6 col-xs-12">

                        <div class="gb-top-header_cuanhom-left">

                            <ul>

                                <li><i class="fa fa-phone" aria-hidden="true"></i>LIÊN HỆ CHÚNG TÔI:
                                    +<?= $rowConfig['content_home3'] ?></li>

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
                                    <a href="thanh-toan" class="link_top_right2"><i class=""></i>ĐỊA CHỈ</a>
                                </li>
                                <li style="color: #fff;">|</li>
                                <li class="top_right" id="search">
                                    <a class="link_top_right2"><i class=""></i>CONTACT</a>
                                    <div class="box_search_pc" id="sub-search" style="display: none;">
                                        <form style="width:100%;position:relative" action="" method="">
                                            <input type="search" value="" name="txtSearch"
                                                placeholder="Tìm kiếm sản phẩm">
                                            <button type="submit"><i class="iconfont-search2"></i></button>
                                        </form>
                                    </div>
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
                            <a href="/yeu-thich" class="link_top_right1"><i class="fa fa-heart"
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
                            <div class="col-md-2 col-sm-3 col-xs-4">
                                <a href="https://liyii.vn/" class="lgHeaderRSP"><img src="/images/<?= $rowConfig['web_logo'] ?>"
                                        alt="logo" class="img-responsive"></a>
                            </div>
                            <div class="col-md-6 col-sm-5 col-xs-8 thongtin">
                                <div class="gb-top-header_cuanhom">
                                    <div class="gb-top-header_cuanhom-right">
                                        <ul class="list_top_right">
                                            <!--tìm kiếm-->
                                            <li class="top_right thanhtimkiem" id="search">
                                                <!--<a class="link_top_right1" onclick="show_search()"><i class="glyphicon glyphicon-search"style="color: #248ab3"></i></a>
                                    <div class="box_search_pc" id="sub-search">-->

                                                <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                                                    <symbol xmlns="http://www.w3.org/2000/svg" id="sbx-icon-search-8"
                                                        viewBox="0 0 40 40">
                                                        <path
                                                            d="M16 32c8.835 0 16-7.165 16-16 0-8.837-7.165-16-16-16C7.162 0 0 7.163 0 16c0 8.835 7.163 16 16 16zm0-5.76c5.654 0 10.24-4.586 10.24-10.24 0-5.656-4.586-10.24-10.24-10.24-5.656 0-10.24 4.584-10.24 10.24 0 5.654 4.584 10.24 10.24 10.24zM28.156 32.8c-1.282-1.282-1.278-3.363.002-4.643 1.282-1.284 3.365-1.28 4.642-.003l6.238 6.238c1.282 1.282 1.278 3.363-.002 4.643-1.283 1.283-3.366 1.28-4.643.002l-6.238-6.238z"
                                                            fill-rule="evenodd" />
                                                    </symbol>
                                                    <symbol xmlns="http://www.w3.org/2000/svg" id="sbx-icon-clear-3"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M8.114 10L.944 2.83 0 1.885 1.886 0l.943.943L10 8.113l7.17-7.17.944-.943L20 1.886l-.943.943-7.17 7.17 7.17 7.17.943.944L18.114 20l-.943-.943-7.17-7.17-7.17 7.17-.944.943L0 18.114l.943-.943L8.113 10z"
                                                            fill-rule="evenodd" />
                                                    </symbol>
                                                </svg>

                                                <form action="/search-product/0" method="post"
                                                    class="searchbox sbx-twitter">
                                                    <div role="search" class="sbx-twitter__wrapper">
                                                        <input type="search" value="" name="q"
                                                        placeholder="Tìm kiếm sản phẩm" class="sbx-twitter__input">
                                                        <button type="submit" title="Submit your search query."
                                                            class="sbx-twitter__submit">
                                                            <svg role="img" aria-label="Search">
                                                                <use xlink:href="#sbx-icon-search-8"></use>
                                                            </svg>
                                                        </button>
                                                        <button type="reset" title="Clear the search query."
                                                            class="sbx-twitter__reset">
                                                            <svg role="img" aria-label="Reset">
                                                                <use xlink:href="#sbx-icon-clear-3"></use>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>
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
                                            <li class="top_right" style="top:-28px">
                                                <?php if (!isset($_SESSION['user_id_gbvn'])) { ?>
                                                <a href="/dang-nhap" style=""><i class="tai-khoan"
                                                        style="">Login /
                                                        Register</i></a>
                                                <?php } else { ?>
                                                <a href="/dang-xuat" style=""><i class="tai-khoan"
                                                        style="font-size: 14px;color: #000;top: -2px;">Logout</i></a>
                                                <?php } ?>
                                            </li>
                                            <!--yêu thích-->
                                            <li class="top_right">
                                                <a href="/yeu-thich" class="link_top_right1"><i
                                                        class="fa fa-heart"
                                                        style="color: #dc4242"></i></a>
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