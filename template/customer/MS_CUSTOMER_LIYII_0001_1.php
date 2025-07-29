<div class="gb-product-home">
    <!--HEADER PRODUICT TOP-->
    <div class="gb-product-top">
        <h2>Ý KIẾN KHÁCH HÀNG</h2>
       
    </div>
    <!--SHOW PRODUCT ITEM-->
    <div class="y-kien-khach-hang">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="gb-note-customer owl-carousel owl-theme">
                    <div class="  text">
                        <img class="img" src="/images/liyi1.jpg">
                        <b> Minhthu24012000</b>
                        <span>-Set đầm mặc lên rất đẹp . Mình rất thích . Chị chủ shop dễ thương tư vấn mình rất nhiệt tình . Sẽ tiếp tục ủng hộ shop</span>
                    </div>
                    <div class=" text">
                        <img class="img"
                            src="/images/liyi2.jpg">
                        <b> Vytynguyen</b>
                        <span>-Đầm xinh lắm nha shop, vải mặc mát lắm, giá phải chăng mà vải vẫn khá Ok nhé. Lần sau sẽ ủng hộ shop nữa .</span>
                    </div>
                    <div class=" text">
                        <img class="img" src="/images/liyi3.jpg">
                        <b> Gia_han.woojin</b>
                        <span>-Hàng y hình nha mặc rộng thoải mái gì đâu. nói chung là khá ưng í</span>
                    </div>
                    <div class=" text">
                        <img class="img" src="/images/liyi4.jpg">
                        <b> Tthuyduong124</b>
                        <span>-Cưng lắm lun ík. Màu đẹp, vải cũng ok nữa . cho 10 điểm </br>Sẽ tiếp tục ủng hộ shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        $('.gb-note-customer').owlCarousel({
            loop: true,
            responsiveClass: true,
            nav: true,
            navText: [],
            dots: false,
            margin: 30,
            responsive: {
                0: {
                    items: 2,
                    nav: false
                },
                560: {
                    items: 3,
                    slideBy: 3,
                    nav: true
                },
                768: {
                    items: 4,
                    slideBy: 4,
                    nav: true
                }
            }
        });
    });
</script>