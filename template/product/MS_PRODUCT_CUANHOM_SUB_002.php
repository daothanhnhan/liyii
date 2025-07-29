<?php 
    $product_hot = $action_product->getListProductHot_hasLimit(4);//var_dump($product_new);
?>
<div class="gb-maysanxuat_cuanhom">

    <div class="row">

        <?php 

        $d = 0;

        foreach ($product_hot as $item) { 
            $d++;
            $row = $item;
            $in_stock = $row['in_stock'];
            $mau_id = json_decode($row['mau_sac_id']);
        ?>

        <div class="col-md-3 col-sm-3 col-xs-6" style="padding: 0px 8px;">

            <div class="gb-product-item_cuanhom ">

                <div class="gb-product-item_cuanhom-img ">

                    <a class="boxImgProductHome" href="/<?= $row['friendly_url'] ?>"><img src="/images/<?= $item['product_img'] ?>"
                            alt="<?= $item['product_name'] ?>" class="img-responsive"></a>


                    <div class="gb-product-item_cuanhom-text">

                        <h2><a href="/<?= $row['friendly_url'] ?>"><?= $item['product_name'] ?></a></h2>

                        <?php if ($in_stock==1) { ?>
                        <img src="/images/icons/iconProductSub_02.png" alt="" style="width: 61px;">
                        <?php } else { ?>
                        <img src="/images/icons/iconProductSub_03.png" alt="" style="width: 61px;">
                        <?php } ?>

                        <!-- <div class="hotline_cuanhom">Hotline : <?= $rowConfig['content_home6'] ?></div> -->

                        <div class="box_info_product">
                            <div class="box_price_product">
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

        <?php 

        if ($d%4==0) {

            echo '<hr style="width:100%;border:0;" />';

        }

        } ?>

    </div>

</div>