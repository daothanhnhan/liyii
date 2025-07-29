<?php 
    $action_product = new action_product(); 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_product->getProductLangDetail_byUrl($slug,$lang);
    $row = $action_product->getProductDetail_byId($rowLang[$nameColIdProduct_productLanguage],$lang);
    $_SESSION['productcat_id_relate'] = $row[$nameColIdProductCat_product];
    $_SESSION['sidebar'] = 'productDetail';
    $arr_id = $row['productcat_ar'];
    $arr_id = explode(',', $arr_id);
    $productcat_id = (int)$arr_id[0];
    

    $img_sub = json_decode($row['product_sub_img']);

    $product_related1 = $action_product->getListProductRelate_byIdCat_hasLimit($productcat_id, 3);
    ///////////////
    
?>
<script type="text/javascript">
    $(document).ready(function (data) {
        $('.btn_addCart').click(function () {
            // var product_id = $(this).attr("id");
            var product_id = $('#product_id').val();
            var product_name = $('#product_name').val();
            var product_price = $('#product_price').val();
            var product_quantity = $('.number_cart').val();
            var action = "add";
            // var size = $('#size').val();
            // alert(size);return false;
            // var a = {a : 'a'};
            if (product_quantity > 0) {
                $.ajax({
                    url: "/functions/ajax.php?action=add_cart",
                    method: "POST",
                    dataType: "json",
                    data: {
                        product_id: product_id,
                        product_name: product_name,
                        product_price: product_price,
                        product_quantity: product_quantity,
                        // product_size:size,
                        action: action
                    },
                    success: function (data) {
                        // $('#order_table').html(data.order_table);  
                        // $('.badge').text(data.cart_item);  
                        // if (confirm(
                        //         'Thêm sản phẩm thành công, bạn có muốn thanh toán luôn không'
                        //     )) {
                        //     window.location = '/gio-hang';
                        // } else {
                        //     location.reload();
                            
                        // }
                        popup_cart();
                    },
                    error: function () {
                        alert('loi');
                    }
                });

            } else {
                alert("Please Enter Number of Quantity")
            }
        });
    });

    function popup_cart () {
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("popup-cart").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "/functions/ajax/popup-cart.php", true);
          xhttp.send();
    }
</script>

<div class="cf_detailProduct">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12" >
                <div class="box_image">
                    <div class="sub_image">
                        <div id="gallery_09">
                            <a href="#" class="elevatezoom-gallery active" data-update=""
                                data-image="/images/<?= $row['product_img'] ?>"
                                data-zoom-image="/images/<?= $row['product_img'] ?>">
                                <img src="/images/<?= $row['product_img'] ?>"></a>
                            <?php 
                                      $d = 1;
                                      foreach ($img_sub as $item) {
                                          $d++;
                                          $image = json_decode($item, true);?>
                            <a href="#" class="elevatezoom-gallery" data-image="/images/<?= $image['image'] ?>"
                                data-zoom-image="/images/<?= $image['image'] ?>"><img
                                    src="/images/<?= $image['image'] ?>"></a>
                            <?php } ?>

                        </div>

                        <img id="zoom_09" class="bigImgDetail" src="/images/<?= $row['product_img'] ?>"
                            data-zoom-image="/images/<?= $row['product_img'] ?>" style="cursor: pointer;" />
                        <br />
                        <script>
                            $("#zoom_09").elevateZoom({
                                gallery: "gallery_09",
                                galleryActiveClass: "active"
                            });
                            $("#select").change(function (e) {
                                var currentValue = $("#select").val();
                                if (currentValue == 1) {
                                    smallImage = 'images/small/kkkkk01.jpg';
                                    productImage = 'images/product/kkkkk01.jpg';
                                }
                                if (currentValue == 2) {
                                    smallImage = 'images/small/kkkkk02.jpg';
                                    productImage = 'images/product/kkkkk02.jpg';
                                }
                                if (currentValue == 3) {
                                    smallImage = 'images/small/kkkkk03.jpg';
                                    productImage = 'images/product/kkkkk03.jpg';
                                }
                                if (currentValue == 4) {
                                    smallImage = 'images/small/kkkkk04.jpg';
                                    productImage = 'images/product/kkkkk04.jpg';
                                }
                                // Example of using Active Gallery
                                $('#gallery_09 a').removeClass('active').eq(currentValue - 1).addClass(
                                    'active');


                                var ez = $('#zoom_09').data('elevateZoom');

                                ez.swaptheimage(smallImage, productImage);

                            });
                        </script>

                    </div>
                </div> <!-- end box_image -->
            </div>
            <div class=" col-md-6 col-sm-6 col-xs-12">
                <div class="box_caption">
                    <h1 class="name_pro"><?= $rowLang['lang_product_name'] ?></h1>
                    <?php if ($row['product_price_sale'] == 0) { ?>
                    <p style="font-size: 23px;"> <?php echo number_format($row['product_price'],0,",",".") ;?> đ</p>
                    <?php } else { ?>
                    <p style="font-size: 23px;"> <del><?php echo number_format($row['product_price'],0,",",".") ;?> đ</del> - <?= number_format($action_product->percent1($row['product_price'], $row['product_price_sale']),0,",",".") ?> đ</p>
                    <?php } ?>
                    <!-- <p class="sub_title">
                        <strong>Thông Tin Tổng Quát:</strong><br>
                        <?= str_replace("\r\n", "<br>", $rowLang['lang_product_des']) ?>
                    </p> -->
                    <div style="margin-top: 20px;">
                        <span style="font-weight: 700;">Color: </span>
                        <?php 
                        $mau_id = json_decode($row['mau_sac_id']);
                        foreach ($mau_id as $item) { 
                            $mau = $action->getDetail('mau_sac', 'id', $item);
                        ?>
                         <span style="background: <?= $mau['code'] ?>;" class="dot" data-toggle="tooltip" data-placement="top" title="<?= $mau['name'] ?>">&nbsp;</span>
                        <?php } ?>
                    </div>
                    <div style="margin: 20px auto;">
                        <span style="font-weight: 700;">Size: </span>
                        <?php 
                        $size_id = json_decode($row['kich_co_id']);
                        foreach ($size_id as $item) { ?>
                        <span><?= $action->getDetail('kich_co', 'id', $item)['name'] ?> &nbsp;&nbsp;</span>
                        <?php } ?>
                    </div>
                    <div style="margin: 20px auto;">
                        <span style="font-weight: 700;">In stock: </span>
                        <?php if ($row['in_stock']==1) { ?>
                            Còn hàng
                        <?php } else { ?>
                            Hết hàng
                        <?php } ?>
                    </div>
                    <!-- <input type="number" name="" value="1" placeholder="" class="number_cart"> -->

                    
                     
                    <div class="row" style="margin-left: 0;">
                        <div class="input-group-prepend" style="display: inline-block;">
                            <button class="btn btn-dark btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
                        </div>
                        <input type="number" id="qty_input" class="form-control form-control-sm number_cart" value="1" min="1" style="display: inline-block;width: 80px;float: none;">
                        <div class="input-group-prepend" style="display: inline-block;">
                            <button class="btn btn-dark btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>

                  
                        
                    <div class="detailt-ship">
                        <?= $rowConfig['content_home8'] ?>
                    </div>
                    
                    <input type="hidden" name="id" id="product_id" value="<?php echo $rowLang['product_id'];?>">
                    <input type="hidden" name="name" id="product_name" value="<?= $row['product_name'];?>">
                    <!-- <input type="hidden" name="price" id="product_price"value="<?php echo $product_msk['SellingPrice'] ;?>"> -->
                    <input type="hidden" name="price" id="product_price"value="<?php echo $action_product->percent1($row['product_price'], $row['product_price_sale']) ;?>">
                    
                   
                        <?php include_once DIR_CART."MS_CART_LIYII_0001.php"; ?>
                    
                    
                    <hr>
                    <div id="unik" data-ayoshare="https://facebook.com"></div>
                </div> <!-- end box_cation -->
            </div>
            
        </div>

        <div class="row"style="margin-top: 20px;">
            <div class="col-md-12">

                <div class="content_tab">

                    <span class="span-tab">
                        <span class=" span_tab"><a href="#tab_1">Mô tả</a></span>
                        <span class=" span_tab"><a href="#tab_2">Đánh giá (0)</a></span>
                    </span>
                    <div class="span_tab_content" id="tab_1">
                        <?php
                            echo $rowLang['lang_product_content'];
                        ?>
                    </div>
                    <div class="span_tab_content tab2" id="tab_2">
                        
                        <div class="fb-comments" data-href="<?= $action->curPageURL() ?>" data-width="" data-numposts="5"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="content_tab">
                    <span class="span-tab2 san-pham-sub">
                        <!-- <span class="span_tab2"><a href="#tab_3" class="active-span-tab2">Sản phẩm nổi bật</a></span> -->
                        <span class="span_tab2"><a href="#tab_4" class="active-span-tab2">Sản phẩm hot</a></span>
                        <span class="span_tab2"><a href="#tab_5" class="">Sản phẩm mới</a></span>
                    </span>
                    <!-- <div class="span_tab_content2" id="tab_3" style="display: block;">
                        <?php// include DIR_PRODUCT."MS_PRODUCT_CUANHOM_SUB_001.php";?>
                    </div> -->
                    <div class="span_tab_content2" id="tab_4" style="display: block;">
                        <?php include DIR_PRODUCT."MS_PRODUCT_CUANHOM_SUB_002.php";?>
                    </div>
                    <div class="span_tab_content2" id="tab_5" style="display: block;">
                        <?php include DIR_PRODUCT."MS_PRODUCT_CUANHOM_SUB_003.php";?>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="fb-comments" data-href="<?= $action->curPageURL() ?>" data-width="100%" data-numposts="5" style="width:100%"></div>
        </div>


    </div>

</div>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  // slick carousel
  $('.detailt-ship').slick({
    dots: false,
    vertical: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    verticalSwiping: true,
    autoplay: true,
    // autoplaySpeed: 2000, 
    autoplayTimeout: 3000,
  });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    // $('#qty_input').prop('disabled', true);
    $('#plus-btn').click(function(){
        $('#qty_input').val(parseInt($('#qty_input').val()) + 1 );
            });
        $('#minus-btn').click(function(){
        $('#qty_input').val(parseInt($('#qty_input').val()) - 1 );
        if ($('#qty_input').val() == 0) {
            $('#qty_input').val(1);
        }

            });
 });
</script>