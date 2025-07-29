<link rel="stylesheet" href="./plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="./plugin/owl-carouse/owl.theme.default.min.css">
<?php
    // $home_phukien = $mshopkeeper->get_products_bycat($product_all, 6, '140');
    $_SESSION['color'] = array();
    $_SESSION['price'] = '';
    $_SESSION['sort'] = '';
    $_SESSION['size'] = '';
    $home_phukien = $action_product->getProductList_byMultiLevel_orderProductId(140,'desc',1,6,'');
    $home_phukien_cat = $action->getDetail('productcat', 'productcat_id', '140');
?>
<div class="gb-product-home">
    <!--HEADER PRODUICT TOP-->
    <div class="gb-product-top">
        <h2><?= $home_phukien_cat['productcat_name'] ?></h2>
        <div class="btn-xemtatca"><a href="/<?= $home_phukien_cat['friendly_url'] ?>">
                Xem tất cả <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a></div>
    </div>
    <!--SHOW PRODUCT ITEM-->
    <div class="gb-product-show">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="gb-product-show_slide-three-item gb-product-show_slide-three-item_02 owl-carousel owl-theme"
                    style=" font-size: 19px;">
                    <?php
                    
                    foreach ($home_phukien['data'] as $item) {
                        $row = $item;
                        $in_stock = $row['in_stock'];
                        $mau_id = json_decode($row['mau_sac_id']);
                        if (empty($mau_id)) {
                            $mau_id = [];
                        }
                        ?>
                    <div class="gb-maysanxuat_cuanhom">
                        <div class="gb-product-item_cuanhom" style="margin-bottom: 33px;">

                            <div class="gb-product-item_cuanhom-img">

                                <a class="boxImgProductHome" href="/<?= $row['friendly_url'] ?>"><img style="height: auto;"
                                        src="/images/<?= $item['product_img'] ?>" alt="<?= $item['product_name'] ?>"
                                        class="img-responsive"></a>



                                <div class="gb-product-item_cuanhom-text">

                                    <h2><a href="/<?= $row['friendly_url'] ?>"><?= $item['product_name'] ?></a></h2>

                                    <?php if ($in_stock==1) { ?>
                                    <img class="iconhang" src="/images/icons/iconProductSub_02.png" alt="" style="width: 61px;">
                                    <?php } else { ?>
                                    <img class="iconhang" src="/images/icons/iconProductSub_03.png" alt="" style="width: 61px;">
                                    <?php } ?>

                                    <div class="box_info_product">
                                        <div class="box_price_product">
                                            <?php if ($row['product_new']==1) { ?>
                                            <span style=""><img  class='iconms'
                                                    src="/images/Capture-removebg-preview.png" alt="" style="width: 32px;"></span>
                                            <?php } ?>
                                            <?php if ($row['product_hot']==1) { ?>
                                            <span style=""><img class='iconms'
                                                    src="/images/Capture1-removebg-preview.png" alt="" style="width: 32px;"></span>
                                            <?php } ?>
                                            <?php if ($row['product_price_sale'] == 0) { ?>
                                <span class="price_product"><?= number_format($item['product_price'],0,",",".") ?>
                                    đ</span>
                                <?php } else { ?>
                                <span class="price_product"><del><?= number_format($item['product_price'],0,",",".") ?>
                                    đ</del> - <?= number_format($action_product->percent1($item['product_price'], $row['product_price_sale']),0,",",".") ?> đ</span>
                                <?php } ?>
                                            <span class="price_product" style="float:right;">
                                                <?php 
                                                foreach ($mau_id as $item_color) { 
                                                    $mau = $action->getDetail('mau_sac', 'id', $item_color);
                                                ?>
                                                <span class="dot1" style="background: <?= $mau['code'] ?>"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="<?= $mau['name'] ?>"></span>
                                                <?php } ?>

                                            </span>
                                            <div style="clear:both"></div>

                                        </div>
                                        <div>
                                            
                                            
                                            <a href="javascript:void(0)" class="add_compare" title="cart"
                                                onclick="load_url('<?= $row['product_id'] ?>', '<?= $item['product_name'] ?>', '<?= $action_product->percent1($item['product_price'], $row['product_price_sale']); ?>')">
                                                
                                                <div class="time_row">
                                                    <div class="img"><img src="/images/6e943a9ab6df508109ce.jpg">
                                                    </div>
                                                    <span>Thêm vào giỏ hàng</span>
                                                </div>
                                            </a>


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
        $('.gb-product-show_slide-three-item_02').owlCarousel({
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