<nav id="fixMenuScroll1" class="visible-sm visible-xs mobile-menu-container mobile-nav  fixMenuScroll1 ">
    <div class="menu-mobile-nav" style="margin-top: -3px;">
        <span class="icon-bar"><i class="fa fa-bars" aria-hidden="true" style="font-size: 24px;"></i></span>
    </div>
    <div id="cssmenu" class="animated" style="position: fixed;overflow-y: scroll;height: 100%;">
        <div class="uni-icons-close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="search-mobie">
            <!--<form style="" action="/search-product/0" method="post">
                <input type="search" value="" name="q" placeholder="Tìm kiếm sản phẩm">
                <button type="submit"><i class="glyphicon glyphicon-search"
                        style="color: #248ab3;font-size: 18px;"></i></button>
            </form>-->
            <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                <symbol xmlns="http://www.w3.org/2000/svg" id="sbx-icon-search-8" viewBox="0 0 40 40">
                    <path
                        d="M16 32c8.835 0 16-7.165 16-16 0-8.837-7.165-16-16-16C7.162 0 0 7.163 0 16c0 8.835 7.163 16 16 16zm0-5.76c5.654 0 10.24-4.586 10.24-10.24 0-5.656-4.586-10.24-10.24-10.24-5.656 0-10.24 4.584-10.24 10.24 0 5.654 4.584 10.24 10.24 10.24zM28.156 32.8c-1.282-1.282-1.278-3.363.002-4.643 1.282-1.284 3.365-1.28 4.642-.003l6.238 6.238c1.282 1.282 1.278 3.363-.002 4.643-1.283 1.283-3.366 1.28-4.643.002l-6.238-6.238z"
                        fill-rule="evenodd" />
                </symbol>
                <symbol xmlns="http://www.w3.org/2000/svg" id="sbx-icon-clear-3" viewBox="0 0 20 20">
                    <path
                        d="M8.114 10L.944 2.83 0 1.885 1.886 0l.943.943L10 8.113l7.17-7.17.944-.943L20 1.886l-.943.943-7.17 7.17 7.17 7.17.943.944L18.114 20l-.943-.943-7.17-7.17-7.17 7.17-.944.943L0 18.114l.943-.943L8.113 10z"
                        fill-rule="evenodd" />
                </symbol>
            </svg>

            <form action="/search-product/0" method="post" class="searchbox sbx-twitter">
                <div role="search" class="sbx-twitter__wrapper">
                    <input type="search" value="" name="q" placeholder="Tìm kiếm sản phẩm" class="sbx-twitter__input">
                    <button type="submit" title="Submit your search query." class="sbx-twitter__submit">
                        <svg role="img" aria-label="Search">
                            <use xlink:href="#sbx-icon-search-8"></use>
                        </svg>
                    </button>
                    <button type="reset" title="Clear the search query." class="sbx-twitter__reset">
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
        </div>

        <?php 
                $list_menu = $menu->getListMainMenu_byOrderASC();
                $menu->showMenu_byMultiLevel_mainMenuTraiCam($list_menu,0,$lang,0);
            ?>
        <div class="clearfix"></div>
    </div>
</nav>
<script src="/plugin/sticky/jquery.sticky.js"></script>
<script>
    $(document).ready(function () {
        $(".sticky-menu1").sticky({
            topSpacing: 0
        });
    });
</script>
<script>
    $(document).ready(function () {
        //-----------------menu mobile---------------------
        $('.mobile-menu-container .menu-mobile-nav').on('click', function (e) {
            if ($(e.target).is('.icon-bar i')) {
                $('#cssmenu').slideToggle();
                $('#cssmenu ul').slideToggle();
                $('#cssmenu ul ul').hide();
            }
        });
        $('.uni-icons-close').on('click', function (e) {
            if ($(e.target).is('i')) {
                $('#cssmenu').hide(500);
                $('#cssmenu ul').hide(500);
            }
        });

        (function ($) {

            $.fn.menumaker = function (options) {

                var cssmenu = $(this),
                    settings = $.extend({
                        title: "Menu",
                        format: "dropdown",
                        sticky: false
                    }, options);

                return this.each(function () {

                    cssmenu.find('li ul').parent().addClass('has-sub');

                    var multiTg = function () {
                        cssmenu.find(".has-sub").prepend(
                            '<span class="submenu-button"></span>');
                        cssmenu.find('.submenu-button').on('click', function () {
                            $(this).toggleClass('submenu-opened');
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
                    else cssmenu.addClass('dropdown');

                    if (settings.sticky === true) cssmenu.css('position', 'fixed');

                    var resizeFix = function () {
                        if ($(window).width() > 768) {
                            cssmenu.find('ul').show();
                        }

                        if ($(window).width() <= 768) {
                            cssmenu.find('ul').hide().removeClass('open');
                        }
                    };
                    resizeFix();
                    return $(window).on('resize', resizeFix);

                });
            };
        })(jQuery);

        (function ($) {
            $(document).ready(function () {
                $("#cssmenu").menumaker({
                    title: "",
                    format: "multitoggle"
                });

                $("#cssmenu").prepend("<div id='menu-line'></div>");

                var foundActive = false,
                    activeElement, linePosition = 0,
                    menuLine = $("#cssmenu #menu-line"),
                    lineWidth, defaultPosition, defaultWidth;

                $("#cssmenu > ul > li").each(function () {
                    if ($(this).hasClass('active')) {
                        activeElement = $(this);
                        foundActive = true;
                    }
                });

                if (foundActive === false) {
                    activeElement = $("#cssmenu > ul > li").first();
                }

                defaultWidth = lineWidth = activeElement.width();

                // defaultPosition = linePosition = activeElement.position().left;

                menuLine.css("width", lineWidth);
                menuLine.css("left", linePosition);

                $("#cssmenu > ul > li").on('mouseenter', function () {
                        activeElement = $(this);
                        lineWidth = activeElement.width();
                        linePosition = activeElement.position().left;
                        menuLine.css("width", lineWidth);
                        menuLine.css("left", linePosition);
                    },
                    function () {
                        menuLine.css("left", defaultPosition);
                        menuLine.css("width", defaultWidth);
                    });
            });
        })(jQuery);
    });
</script>