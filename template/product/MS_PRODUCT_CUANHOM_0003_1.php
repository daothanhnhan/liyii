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
    ///////////////////////////////
    if (!isset($_SESSION['history'])) {
        $_SESSION['history'] = $_GET['page'];
    } else {
        if ($_SESSION['history'] == $_GET['page']) {

        } else {
            $_SESSION['sort'] = "";
            $_SESSION['color'] = array();
            $_SESSION['price'] = "";

            $_SESSION['history'] = $_GET['page'];
        }
    }

    $color = $action->getList('mau_sac', '', '', 'id', 'asc', '', '', '');
    $loc_gia = $action->getList('filter_price', '', '', 'id', 'asc', '', '', '');

?>
<?php                              
    $product_all = $mshopkeeper->get_products_all_db();                                          
    if (isset($_GET['slug']) && $_GET['slug'] != '') {
        $slug = $_GET['slug'];
        $rowCatLang = $action_product->getProductCatLangDetail_byUrl($slug,$lang);
        $rowCat = $action_product->getProductCatDetail_byId($rowCatLang['productcat_id'],$lang);
    }
    
    $rows = $action_product->getProductList_byMultiLevel_orderProductId($rowCat['productcat_id'],'desc',$trang,'',$slug);//var_dump($rows);die;
    $total_record = count($rows);
    $data = $mshopkeeper->page_limit($rows, $trang, 12);
?>
<?php 
    if (!empty($_SESSION['color'])) {
        $products = array();
        foreach ($rows as $item) {
            $row = $mshopkeeper->get_product($product_all, $item['mshopkeeper_id']);
            if ($mshopkeeper->check_color($row, $_SESSION['color'])) {
                $products[] = $item;
            }
        }

        $data = $mshopkeeper->page_limit($products, $trang, 12);
        $total_record = count($products);
        $rows = $products;
    }
    if ($_SESSION['price'] != '' || $_SESSION['price'] != '0-0') {
        $products = array();
        foreach ($rows as $item) {
            $row = $mshopkeeper->get_product($product_all, $item['mshopkeeper_id']);
            if ($mshopkeeper->check_price($row, $_SESSION['price'])) {
                $products[] = $item;
            }
        }

        $data = $mshopkeeper->page_limit($products, $trang, 12);
        $total_record = count($products);
        $rows = $products;
    }
    if ($_SESSION['sort'] != '') {
        $sort = array();
        foreach ($rows as $key => $item) {
            $row = $mshopkeeper->get_product($product_all, $item['mshopkeeper_id']);
            $sort[$key] = $row['SellingPrice'];
        }
        // var_dump($sort);
        if ($_SESSION['sort'] == 1) {
            array_multisort($sort, SORT_ASC, $rows);
            $data = $mshopkeeper->page_limit($rows, $trang, 12);
        }
        if ($_SESSION['sort'] == 2) {
            array_multisort($sort, SORT_DESC, $rows);
            $data = $mshopkeeper->page_limit($rows, $trang, 12);
        }
    }
?>
<style type="text/css">
    @media screen and (max-width: 992px) {}
</style>
<div class="container">
    <div class="gb-maysanxuat_cuanhom">

        <div class="gb-maysanxuat_cuanhom_title">

            <h2><span><?php
            if ($_GET['page'] == 'san-pham') {
                echo 'Sản phẩm';
            } else {
                echo $rowCatLang['lang_productcat_name'];
            }
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
                <div class="basel-filter-button