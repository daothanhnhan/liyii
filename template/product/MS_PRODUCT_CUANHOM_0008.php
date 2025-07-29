<?php 

    $limit = 12;       
    // $product_all = $mshopkeeper->get_products_all_db();                                                                    

   function search ($lang, $trang, $limit) {

        if (isset($_POST['q'])) {

            $q = $_POST['q'];

            $q = trim($q);

            $q = vi_en1($q);            

        } else {

            $q = $_GET['search'];

            // $q = str_replace('-', ' ', $q);

        }



        $start = $trang * $limit;

        global $conn_vn;

        $sql = "SELECT * FROM product_languages INNER JOIN product ON product_languages.product_id = product.product_id WHERE product_languages.friendly_url like '%$q%' And product_languages.languages_code = '$lang' And product.state = 1";

        $result = mysqli_query($conn_vn, $sql);

        $count = mysqli_num_rows($result);



        $sql = "SELECT * FROM product_languages INNER JOIN product ON product_languages.product_id = product.product_id WHERE product_languages.friendly_url like '%$q%' And product_languages.languages_code = '$lang' And product.state = 1 LIMIT $start,$limit";

        $result = mysqli_query($conn_vn, $sql);

        $rows = array();

        while ($row = mysqli_fetch_assoc($result)) {

            $rows[] = $row;

        }

        $return = array(

                'data' => $rows,

                'count' => $count,

                'q' => $q

            );

        return $return;

    }

    $rows = search($lang, $trang, $limit);//var_dump($rows['count']);die;

?>

<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_CUANHOM_0002.php";?>

<div class="gb-page-sanpham_cuanhom">

    <div class="container">

        <div class="col-md-12">

            <?php //include DIR_SEARCH."MS_SEARCH_CUANHOM_0001.php";?>

            <div class="row">

                <?php 

                $d = 0;

                foreach ($rows['data'] as $row) { 

                    $d++;

                    $item = $row;
                    $in_stock = $row['in_stock'];
                    $mau_id = json_decode($row['mau_sac_id']);

                ?>

                <div class="col-md-3 col-sm-6 col-xs-6" style="padding: 0px 5px;">

                    <div class="gb-product-item_cuanhom">

                        <div class="gb-product-item_cuanhom-img" style="height: 478px;">

                            <a class="boxImgProductHome zoom" id="ex1" href="/<?= $row['friendly_url'] ?>"><img
                                    src="/images/<?= $item['product_img'] ?>" alt="<?= $item['product_name'] ?>" class="img-responsive"></a>


                            <div class="gb-product-item_cuanhom-text">

                                <h2><a href="/<?= $row['friendly_url'] ?>"><?= $item['product_name'] ?></a></h2>
                                <?php $price =  $item?>

                                <?php if ($in_stock==1) { ?>
                                <img src="/images/icons/iconProductSub_02.png" alt="" style="width: 50px;">
                                <?php } else { ?>
                                <img src="/images/icons/iconProductSub_03.png" alt="" style="width: 50px;">
                                <?php } ?>
                                <!-- <div class="hotline_cuanhom">Hotline : <?= $rowConfig['content_home6'] ?></div> -->

                                <div class="box_info_product">
                                    <div class="box_price_product">
                                        <?php if ($row['product_new']==1) { ?>
                                        <span style="position: relative;top: -370px;left: -68px;"><img
                                                src="/images/Capture-removebg-preview.png" alt=""
                                                style="width: 32px; margin-top: -20px;"></span>
                                        <?php } ?>
                                        <?php if ($row['product_hot']==1) { ?>
                                        <span style="position: relative;top: -370px;left: -68px;"><img
                                                src="/images/Capture1-removebg-preview.png" alt=""
                                                style="width: 32px; margin-top: -20px;"></span>
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
                                            <span class="dot1" style="background: <?= $mau['code'] ?>"
                                                data-toggle="tooltip" data-placement="top"
                                                title="<?= $mau['name'] ?>"></span>
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

            <div><?php 

                    $config = array(

                        'current_page'  => $trang+1, // Trang hiện tại

                        'total_record'  => $rows['count'], // Tổng số record

                        'total_page'    => 1, // Tổng số trang

                        'limit'         => $limit,// limit

                        'start'         => 0, // start

                        'link_full'     => '',// Link full có dạng như sau: domain/com/page/{page}

                        'link_first'    => '',// Link trang đầu tiên

                        'range'         => 5, // Số button trang bạn muốn hiển thị 

                        'min'           => 0, // Tham số min

                        'max'           => 0,  // tham số max, min và max là 2 tham số private

                        'search'        => str_replace(' ', '-', $rows['q'])



                    );



                    $pagination = new Pagination;

                    $pagination->init($config);

                    echo $pagination->htmlPaging1();

                ?></div>

        </div>



    </div>

</div>