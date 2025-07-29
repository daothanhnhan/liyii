<?php 
    if (!isset($_SESSION['color'])) {
        $_SESSION['color'] = array();
    }
    // var_dump($_SESSION['color']);
    if (!isset($_SESSION['price'])) {
        $_SESSION['price'] = '';
    }
    // var_dump($_SESSION['price']);
    if (!isset($_SESSION['sort'])) {
        $_SESSION['sort'] = '';
    }
    // var_dump($_SESSION['sort']);
    if (!isset($_SESSION['size'])) {
        $_SESSION['size'] = '';
    }
    ///////////////////////////////
    if (!isset($_SESSION['history'])) {
        $_SESSION['history'] = $_GET['page'];
    } else {
        if ($_SESSION['history'] == $_GET['page']) {

        } else {
            $_SESSION['sort'] = "";
            $_SESSION['color'] = array();
            $_SESSION['price'] = "";
            $_SESSION['size'] = "";

            $_SESSION['history'] = $_GET['page'];
        }
    }

    $color = $action->getList('mau_sac', '', '', 'id', 'asc', '', '', '');
    $loc_gia = $action->getList('filter_price', '', '', 'id', 'asc', '', '', '');
    $kich_co = $action->getList('kich_co', '', '', 'id', 'asc', '', '', '');
?>
<?php                              
    $rows = $action->getList_hotnew('product', 'product_hot', '1', 'product_id', 'desc', $trang, '12', $_GET['page']);//var_dump($rows);die;
?>
<?php 
    
?>
<style type="text/css">
    @media screen and (max-width: 992px) {}
</style>
<div class="container">
    <div class="gb-maysanxuat_cuanhom">

        <div class="gb-maysanxuat_cuanhom_title">

            <h2><span><?php
                echo 'Sản phẩm hot';
            ?></span></h2>

        </div>
        <input type="hidden" name="lang_current" id="lang_current" value="<?php echo $lang;?>">
<input type="hidden" name="url_lang" value="<?php echo $url_lang;?>" id="url_lang">
<?php 
    $action_lang = new action_lang();
    $url_lang = $action_lang->get_url_lang_productcat($slug, $lang);
?>
        <div class="site-content shop-content-area col-sm-12 content-with-products description-area-before" role="main">
            <div class="shop-loop-head" style="text-align: right;">
                <div class="basel-filter-buttons" onclick="toggle_filter()"> <a href="javascript:void(0)" class="open-filters">Bộ lọc</a></div>
            </div>
            <!-- <div class="filters-area filters-opened"> -->
            <div class="filters-inner-area row" id="filter-msk" style="display: none;">
                <div id="BASEL_Widget_Sorting" class="filter-widget widget-count-4 col-xs-12 col-sm-6 col-md-3">
                    <h5 class="widget-title">Sắp xếp theo</h5>
                    <form class="woocommerce-ordering with-list" method="get">
                        <ul>
                            <li onclick="sortf('')"> <a href="javascript:void(0)"
                                    data-order="menu_order" class="<?= $_SESSION['sort'] =='' ? 'selected-order' : ''; ?>"
                                    value="default" >Mặc định</a></li>
                            
                            <li onclick="sortf('1')"> <a href="javascript:void(0)" data-order="price"
                                    class="<?= $_SESSION['sort'] =='1' ? 'selected-order' : ''; ?>">Giá: thấp - cao</a></li>
                            <li onclick="sortf('2')"> <a href="javascript:void(0)"
                                    data-order="price-desc" class="<?= $_SESSION['sort'] =='2' ? 'selected-order' : ''; ?>"
                                    value="price_desc" >Giá: cao - thấp</a></li>
                        </ul>
                    </form>
                </div>
                <div id="BASEL_Widget_Price_Filter" class="filter-widget widget-count-4 col-xs-12 col-sm-6 col-md-3">
                    <h5 class="widget-title">Lọc theo giá</h5>
                    <div class="basel-price-filter">
                        <ul>
                            <?php foreach ($loc_gia as $item) { ?>
                            <li onclick="pricef('<?= $item['value'] ?>')" style="font-weight: <?= $_SESSION['price'] == $item['value'] ? '800' : '100'; ?>;"> <a rel="nofollow" href="javascript:void(0)" class=""><?= $item['name'] ?></a></li>
                            <?php } ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="BASEL_Widget_Price_Filter" class="filter-widget widget-count-4 col-xs-12 col-sm-6 col-md-3">
                    <h5 class="widget-title">Lọc theo size</h5>
                    <div class="basel-price-filter">
                        <ul>
                            <?php foreach ($kich_co as $item) { ?>
                            <li onclick="sizef('<?= $item['id'] ?>')" style="font-weight: <?= $_SESSION['size'] == $item['id'] ? '800' : '100'; ?>;"> <a rel="nofollow" href="javascript:void(0)" class=""><?= $item['name'] ?></a></li>
                            <?php } ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="basel-woocommerce-layered-nav-16"
                    class="filter-widget widget-count-4 col-xs-12 col-sm-6 col-md-3 basel-woocommerce-layered-nav">
                    <h5 class="widget-title">Lọc theo màu</h5>
                    <div class="basel-scroll has-scrollbar" style="height: 181px;">
                        <ul class="show-labels-on swatches-normal swatches-display-list basel-scroll-content"
                            tabindex="0" style="right: -17px;">
                            <?php 
                            foreach ($color as $item) { 
                                $close = '';
                                if (in_array($item['id'], $_SESSION['color'])) {
                                    $close = '&times;';
                                }
                            ?>
                            <li class="wc-layered-nav-term  with-swatch-color" onclick="colorf('<?= $item['id'] ?>')"><a
                                    href="javascript:void(0)"><span
                                        class="filter-swatch"><span
                                            style="background-color: <?= $item['code'] ?>;"></span></span><?= $item['name'] ?> <?= $close ?></a></li>
                            <?php } ?>
                        </ul>
                        <div class="basel-scroll-pane" style="display: block;">
                            <div class="basel-scroll-slider" style="height: 138px; transform: translate(0px, 0px);">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="basel-active-filters"></div>
            <div class="basel-shop-loader"></div>
        </div>
        <div class="row">

            <?php 

        $d = 0;

        foreach ($rows['data'] as $row) { 

            $d++;
            $item = $row;
            $in_stock = $row['in_stock'];
            $mau_id = json_decode($row['mau_sac_id']);

        ?>

            <div class="col-md-3 col-sm-6 col-xs-6" style="padding: 0px 8px;">

                <div class="gb-product-item_cuanhom">

                    <div class="gb-product-item_cuanhom-img">

                        <a class="boxImgProductHome zoom" id="ex1" href="/<?= $row['friendly_url'] ?>"><img
                                src="/images/<?= $item['product_img'] ?>" alt="<?= $item['product_name'] ?>" class="img-responsive"></a>


                        <div class="gb-product-item_cuanhom-text">

                            <h2><a href="/<?= $row['friendly_url'] ?>"><?= $item['product_name'] ?></a></h2>
                            <?php $price =  $item?>

                            <?php if ($in_stock==1) { ?>
                            <img class="iconhang" src="/images/icons/iconProductSub_02.png" alt="" style="width: 61px;">
                            <?php } else { ?>
                            <img class="iconhang" src="/images/icons/iconProductSub_03.png" alt="" style="width: 61px;">
                            <?php } ?>
                            <!-- <div class="hotline_cuanhom">Hotline : <?= $rowConfig['content_home6'] ?></div> -->

                            <div class="box_info_product">
                                <div class="box_price_product" style="">
                                    <?php if ($row['product_new']==1) { ?>
                                    <span style=""><img class='iconms' src="/images/Capture-removebg-preview.png" alt=""
                                            style=""></span>
                                    <?php } ?>
                                    <?php if ($row['product_hot']==1) { ?>
                                    <span style=""><img class='iconms' src="/images/Capture1-removebg-preview.png" alt="" style=""></span>
                                    <?php } ?>
                                    <?php if ($row['product_price_sale'] == 0) { ?>
                                <span class="price_product"><?= number_format($item['product_price'],0,",",".") ?>
                                    đ</span>
                                <?php } else { ?>
                                <span class="price_product"><del><?= number_format($item['product_price'],0,",",".") ?>
                                    đ</del> - <?= number_format($action_product->percent1($item['product_price'], $row['product_price_sale']),0,",",".") ?> đ</span>
                                <?php } ?>
                                    <span class="price_product" style="float: right;">
                                        <?php 
                                        foreach ($mau_id as $item_color) { 
                                            $mau = $action->getDetail('mau_sac', 'id', $item_color);
                                        ?>
                                        <span class="dot1" style="background: <?= $mau['code'] ?>" data-toggle="tooltip"
                                            data-placement="top" title="<?= $mau['name'] ?>"></span>
                                        <?php } ?>
                                    </span>
                                    <div style="clear:both"></div>
                                    
                                </div>
                                
                                <div>
                                        <a href="javascript:void(0)" class="add_compare" title="cart" onclick="load_url('<?= $row['product_id'] ?>', '<?= $item['product_name'] ?>', '<?= $action_product->percent1($item['product_price'], $row['product_price_sale']); ?>')">
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

            <?php 

        if ($d%4==0) {

            echo '<hr style="width:100%;border:0;" />';

        }

        } ?>

        </div>
        
        <div style="text-align: center;">
            <?php 
                echo $rows['paging']
            ?>
        </div>
        
    </div>
</div>
<!-- <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script> -->
<script src='/js/jquery.zoom.js'></script>
<script>
    $(document).ready(function () {
        if ($(window).width() >= 992) {
            $('.zoom').zoom();
        } else {
            $('.zoom').trigger('zoom.destroy');
        }
    });
</script>
<script type="text/javascript">
    function colorf (name) {
        // alert(id);
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var out = this.responseText;
                // alert(out);
                window.location.href = "/<?= $_GET['page'] ?>";
            }
          };
          xhttp.open("GET", "/functions/ajax/filter_color.php?name="+name, true);
          xhttp.send();
    }

    function pricef (money) {
        // alert(money);
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var out = this.responseText;
                // alert(out);
                window.location.href = "/<?= $_GET['page'] ?>";
            }
          };
          xhttp.open("GET", "/functions/ajax/filter_price.php?money="+money, true);
          xhttp.send();
    }

    function sortf (sort) {
        // alert(sort);
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var out = this.responseText;
                // alert(out);
                window.location.href = "/<?= $_GET['page'] ?>";
            }
          };
          xhttp.open("GET", "/functions/ajax/filter_sort.php?sort="+sort, true);
          xhttp.send();
    }

    function sizef (size) {
        // alert(sort);
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var out = this.responseText;
                // alert(out);
                window.location.href = "/<?= $_GET['page'] ?>";
            }
          };
          xhttp.open("GET", "/functions/ajax/filter_size.php?size="+size, true);
          xhttp.send();
    }

    function toggle_filter () {

        var filter = document.getElementById("filter-msk").style.display;//alert(fi);
        if (filter == 'none') {
            document.getElementById("filter-msk").style.display = 'block';
        } else {
            document.getElementById("filter-msk").style.display = 'none';
        }
    }
</script>