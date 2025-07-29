<div class="container">
    <nav class=" visible-xs mobile-footer-container mobile-nav ">
        <div class="footer-mobile-nav" style="margin-top: 0px;    text-align: center;">
            <h3 class="titleColFooter">THỜI TRANG LIYII</h3>
            <div class="widget-content">
                <div class="coverColFooter">
                    <ul>
                        <li>
                            <a href="/lien-he">LIÊN HỆ</a>
                        </li>
                        <li>
                            <a href="/chinh-sach-van-chuyen">CHÍNH SÁCH VẬN CHUYỂN</a>
                        </li>
                        <li>
                            <a href="/quy-dinh-doi-hang">QUY ĐỊNH ĐỔI HÀNG</a>
                        </li>
                    </ul>
                    <aside class="widget" style="width: 100%; float: left;">
                        <h3 class="titleColFooter">Kết nối</h3>
                        <div class="gb-top-header_cuanhom-right-social">

                            <a href="https://www.facebook.com/Liyii.vn/"><i class="fa fa-facebook-square"
                                    aria-hidden="true"></i></a>
                            <!-- <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li> -->
                            <!-- <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li> -->
                            <!-- <li><a href=""><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li> -->
                            <a href="https://shopee.vn/liyii.clothing?smtt=0.0.9"><img src="/images/icon-shopee.png"
                                    width="20" style="margin-top: 3px;" /></a>
                            <a href="https://www.instagram.com/liyii.clothing/?igshid=uu55kho7lcwu"><i
                                    class="fa fa-instagram" aria-hidden="true"></i></a>

                        </div>
                        <div class="footer-img">
                            <div class="footer-img-qr">

                                <a href="#">
                                    <img src="/images/payment-method-png.png">
                                </a>
                            </div>

                        </div>
                    </aside>

                </div>
            </div>
            <?php 
	$total_cart = 0;
	$quantity_cart = 0;
	if (isset($_SESSION['shopping_cart'])) {
		foreach ($_SESSION['shopping_cart'] as $v) {
			$total_cart += $v['product_price']*$v['product_quantity'];
			$quantity_cart += $v['product_quantity'];
		}
	}
?>
            <div class="basel-toolbar icons-design-line basel-toolbar-label-show">
            <div class="basel-toolbar-shop basel-toolbar-item"></div>
                <div class="basel-toolbar-shop basel-toolbar-item"> <a href="/san-pham"> <span
                            class="basel-toolbar-label"> Cửa hàng </span> </a></div>
                <div class="wishlist-info-widget" title="My wishlist"> <a
                        href=""> <!--<span class="wishlist-count">0</span>--> <span
                            class="basel-toolbar-label"> Yêu thích </span> </a></div>
                <div class="shopping-cart basel-cart-design-3  cart-widget-opener" title="My cart"> <a
                        href="/gio-hang"> <span class="basel-cart-totals"> <span
                                class="basel-cart-number"><?= $quantity_cart ?></span>
                        </span> <span class="basel-toolbar-label"> Giỏ hàng </span> </a></div>
                        <div class="basel-toolbar-shop basel-toolbar-item"></div>
               
            </div>
            <div class="clearfix"></div>

    </nav>
</div>

<script>
    $(document).ready(function () {
        //-----------------footer mobile---------------------
        $('.mobile-footer-container .footer-mobile-nav').on('click', function (e) {
            if ($(e.target).is('.icon-bar i')) {
                $('#cssfooter').slideToggle();
                $('#cssfooter ul').slideToggle();
                $('#cssfooter ul ul').hide();
            }
        });
        $('.uni-icons-close').on('click', function (e) {
            if ($(e.target).is('i')) {
                $('#cssfooter').hide(500);
                $('#cssfooter ul').hide(500);
            }
        });

        (function ($) {

            $.fn.footermaker = function (options) {

                var cssfooter = $(this),
                    settings = $.extend({
                        title: "footer",
                        format: "dropdown",
                        sticky: false
                    }, options);

                return this.each(function () {

                    cssfooter.find('li ul').parent().addClass('has-sub');

                    var multiTg = function () {
                        cssfooter.find(".has-sub").prepend(
                            '<span class="subfooter-button"></span>');
                        cssfooter.find('.subfooter-button').on('click', function () {
                            $(this).toggleClass('subfooter-opened');
                            $(this).toggleClass('active');
                            if ($(this).siblings('ul').hasClass('open')) {
                                $(this).siblings('ul').removeClass('open')
                                    .slideToggle();
                            } else {
                                $(this).siblings('ul').addClass('open')
                                    .slideToggle();
                            }
                        });
                    };

                    if (settings.format === 'multitoggle') multiTg();
                    else cssfooter.addClass('dropdown');

                    if (settings.sticky === true) cssfooter.css('position', 'fixed');

                    var resizeFix = function () {
                        if ($(window).width() > 768) {
                            cssfooter.find('ul').show();
                        }

                        if ($(window).width() <= 768) {
                            cssfooter.find('ul').hide().removeClass('open');
                        }
                    };
                    resizeFix();
                    return $(window).on('resize', resizeFix);

                });
            };
        })(jQuery);

        (function ($) {
            $(document).ready(function () {
                $("#cssfooter").footermaker({
                    title: "",
                    format: "multitoggle"
                });

                $("#cssfooter").prepend("<div id='footer-line'></div>");

                var foundActive = false,
                    activeElement, linePosition = 0,
                    footerLine = $("#cssfooter #footer-line"),
                    lineWidth, defaultPosition, defaultWidth;

                $("#cssfooter > ul > li").each(function () {
                    if ($(this).hasClass('active')) {
                        activeElement = $(this);
                        foundActive = true;
                    }
                });

                if (foundActive === false) {
                    activeElement = $("#cssfooter > ul > li").first();
                }

                defaultWidth = lineWidth = activeElement.width();

                // defaultPosition = linePosition = activeElement.position().left;

                footerLine.css("width", lineWidth);
                footerLine.css("left", linePosition);

                $("#cssfooter > ul > li").on('mouseenter', function () {
                        activeElement = $(this);
                        lineWidth = activeElement.width();
                        linePosition = activeElement.position().left;
                        footerLine.css("width", lineWidth);
                        footerLine.css("left", linePosition);
                    },
                    function () {
                        footerLine.css("left", defaultPosition);
                        footerLine.css("width", defaultWidth);
                    });
            });
        })(jQuery);
    });
</script>