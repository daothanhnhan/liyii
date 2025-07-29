<link rel="stylesheet" href="./plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="./plugin/owl-carouse/owl.theme.default.min.css">
<?php
    $home_phukien = $mshopkeeper->get_products_bycat($product_all, 6, '140');
    $home_phukien_cat = $action->getDetail('productcat', 'productcat_id', '140');
?>
        <div  class="gb-product-home">
    <!--HEADER PRODUICT TOP-->
    <div class="gb-product-top">
        <h2><?= $home_phukien_cat['productcat_name'] ?></h2>
        <div class="btn-xemtatca"><a href="san-pham">
                Xem tất cả <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a></div>
    </div>
    <!--SHOW PRODUCT ITEM-->
    <div class="gb-product-show">
        <?php include DIR_BANNER."MS_BANNER_SPRO_0006.php";?>
        <div class="row">
          
            <div class="col-md-12  col-sm-12">
                <div class="gb-product-show_slide-three-item gb-product-show_slide-three-item_03 owl-carousel owl-theme"style="font-family: -webkit-pictograph;font-size: 19px;">
                    <?php
                    
                    foreach ($home_phukien as $item) {
                        $row = $mshopkeeper->get_product_gb($item['Id']);
                        $in_stock = $mshopkeeper->in_stock($item);
                        ?>
                    <div class="gb-maysanxuat_cuanhom">
                        <div class="gb-product-item_cuanhom" style="margin-bottom: 33px;">

                            <div class="gb-product-item_cuanhom-img">

                                <a class="boxImgProductHome" href="/<?= $row['friendly_url'] ?>"><img src="<?= $item['Picture'] ?>" alt="<?= $item['Name'] ?>" class="img-responsive"></a>


                                <div class="gb-product-item_cuanhom-text">

                                    <h2><a href="/<?= $row['friendly_url'] ?>"><?= $item['Name'] ?></a></h2> 

                                    <?php if ($in_stock) { ?>
                                        <img src="/images/icons/iconProductSub_02.png" alt="" style="width: 50px;">
                                    <?php } else { ?>
                                        <img src="/images/icons/iconProductSub_03.png" alt="" style="width: 50px;">
                                    <?php } ?>

                                    <div class="box_info_product"> 
                                        <div class="box_price_product">
                                            <span class="price_product"><?= number_format($item['SellingPrice']) ?> đ</span>
                                            <span class="price_product" style="float: right;">
                                                <?php 
                                                foreach ($item['ListDetail'] as $item_color) { 
                                                    $mau = $action->getDetail('color', 'color_name', $item_color['Id']);
                                                    if ($mau) { } else {
                                                        $mau['color_value'] = "#fff";
                                                    }
                                                    if ($item_color['Color'] != '') { 
                                                ?>
                                                <span class="dot1" style="background: <?= $mau['color_value'] ?>" data-toggle="tooltip" data-placement="top" title="<?= $item_color['Color'] ?>"></span>
                                                <?php } } ?>
                                            </span>
                                            <div style="clear:both"></div>
                                            
                                        </div>
                                        
                                        <div class="actionProHome">                                            
                                            <a href="javascript:void(0)" class="add_cart" onclick="load_url('<?= $row['product_id'] ?>', '<?= $item['Name'] ?>', '<?= $item['SellingPrice']; ?>')">
                                                <i class="iconfont-cart3"></i>
                                                <span>Thêm vào giỏ</span>
                                            </a>
                                            <a href="javascript:void(0)" class="add_favorite" title="Thêm yêu thích" onclick="favorite('<?= $row['product_id'] ?>')"><i class="glyphicon glyphicon-heart"></i></a>
                                            <a href="#" class="add_compare" title="cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        $('.gb-product-show_slide-three-item_03').owlCarousel({
            loop: true,
            responsiveClass: true,
            nav: true,
            navText: [],
            dots: false,
            margin: 30,
            responsive: {
                0: {
                    items: 2,
                    nav: false,
                },
                560: {
                    items: 3,
                    slideBy: 3,
                    nav:true,
                },
                768: {
                    items: 4,
                    slideBy: 4,
                    nav:true,
                }
            }
        });
    });
</script>