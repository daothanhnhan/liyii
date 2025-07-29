<?php
    if (isset($_GET['stock'])) {
        if ($_GET['stock']=='yes') {
            $_SESSION['stock'] = 1;
        } else {
            $_SESSION['stock'] = '0';
        }
        
    }
    if (!isset($_SESSION['stock'])) {
        $_SESSION['stock'] = '1';
    }
    
    $product_page = $action->getList('product', 'in_stock', $_SESSION['stock'], 'product_id', 'desc', $trang, '20', $_GET['page']);

    $danh_muc = $action->getList('productcat', '', '', 'productcat_id', 'desc', '', '', '');
?>	
<div class="boxPageNews">
	<div class="searchBox">
        <form action="">
            <input type="hidden" name="page" value="san-pham-1">
            <button type="submit" class="btnSearchBox" name="">Tìm kiếm</button>
            <input type="text" class="txtSearchBox" name="search" />                                  
        </form>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
              <label for="sel1">Lọc theo cũ mới:</label>
              <select class="form-control" id="sel1" onchange="newf(this)">
                <option>Chọn cũ mới</option>
                <option value="1">Lọc từ cũ đến mới</option>
                <option value="2">Lọc từ mới đến cũ</option>
              </select>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
              <label for="sel1">Lọc theo danh mục:</label>
              <select class="form-control" id="sel1" onchange="catf(this)">
                <option>Chọn danh mục</option>
                <?php foreach ($danh_muc as $item) { ?>
                <option value="<?= $item['productcat_id'] ?>"><?= $item['productcat_name'] ?></option>
                <?php } ?>
              </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
              <label for="sel1">Lọc in stock:</label>
              <select class="form-control" id="sel1" onchange="in_stockf(this)">
                <option>Chọn tình trạng hàng</option>
                <option value="1">Lọc theo còn hàng</option>
                <option value="2">Lọc theo hết hàng</option>
              </select>
            </div>
        </div>
    </div>
    
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <!-- <th>Đồng bộ</th> -->
                <th>In stock</th>
                <th>Hiển thị</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($product_page['data'] as $key => $row) {
                    
                ?>
                    <tr>
                        <td><a href="index.php?page=sua-san-pham&id=<?= $row['product_id']; ?>" title=""><?= $row['product_name']; ?></a></td>
                        <td>
                            <?php 
                            $arr_procat = $row['productcat_ar'];
                            $arr_procat = explode(",", $arr_procat);
                            $arr_procat = array_unique($arr_procat);
                            foreach ($arr_procat as $cat_id) {
                                echo $action->getDetail('productcat', 'productcat_id', $cat_id)['productcat_name'].'<br>';
                            }
                            ?>
                        </td>
                        <td><?= number_format($row['product_price'],'0','','.')?> đ</td>
                        
                        <td><?= $row['in_stock']==1 ? 'Còn hang' : 'Hết hàng' ?></td>
                        <td>
                            <?php 
                                echo $row['state']==1 ? 'Hiện thị' : 'Không';
                            ?>
                        </td>
                        
                    </tr>
                <?php
                }
            ?>
        </tbody>
    </table>
	
    <div class="paging">             
    	<?= $product_page['paging'] ?>
	</div>
</div>
<?php  ?>
<script type="text/javascript">
    function newf (data) {
        var bien = data.value;
        if (bien == 1) {
            window.location.href = "index.php?page=san-pham-loc-moi&new=asc";
        } else {
            window.location.href = "index.php?page=san-pham-loc-moi&new=desc";
        }
    }

    function imagef (data) {
        var bien = data.value;
        if (bien == 1) {
            window.location.href = "index.php?page=san-pham-loc-anh&img=yes";
        } else {
            window.location.href = "index.php?page=san-pham-loc-anh&img=no";
        }
    }

    function in_stockf (data) {
        var bien = data.value;
        if (bien == 1) {
            window.location.href = "index.php?page=san-pham-loc-stock&stock=yes";
        } else {
            window.location.href = "index.php?page=san-pham-loc-stock&stock=no";
        }
    }

    function catf (data) {
        var bien = data.value;
        window.location.href = "index.php?page=san-pham-loc-muc&catid="+bien;
    }

    function showf (data) {
        var class_list = document.getElementsByClassName("show-item");
        var type = data.value;
        var arr = [];
        // alert(type);
        for (var i=0;i<class_list.length;i++) {
            var checked = document.getElementsByClassName("show-item")[i].checked;
            if (checked) {
                var value = document.getElementsByClassName("show-item")[i].value;
                // alert(value);
                arr.push(value);
            }
        }
        // alert(arr);
        if (arr.length != 0) {
            var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var out = this.responseText;
                    // alert(out);
                    location.reload();
                }
              };
              xhttp.open("GET", "/functions/ajax/show_hide.php?arr="+arr+"&type="+type, true);
              xhttp.send();
        } else {
            location.reload();
        }
    }

    function danh_muc1f (data) {
        var class_list = document.getElementsByClassName("show-item");
        var cat = data.value;
        var arr = [];
        // alert(type);
        for (var i=0;i<class_list.length;i++) {
            var checked = document.getElementsByClassName("show-item")[i].checked;
            if (checked) {
                var value = document.getElementsByClassName("show-item")[i].value;
                // alert(value);
                arr.push(value);
            }
        }

        if (arr.length != 0) {
            var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var out = this.responseText;
                    // alert(out);
                    location.reload();
                }
              };
              xhttp.open("GET", "/functions/ajax/select_cat.php?arr="+arr+"&cat="+cat, true);
              xhttp.send();
        } else {
            location.reload();
        }
    }

    function danh_muc2f (data) {
        var class_list = document.getElementsByClassName("show-item");
        var cat = data.value;
        var arr = [];
        // alert(type);
        for (var i=0;i<class_list.length;i++) {
            var checked = document.getElementsByClassName("show-item")[i].checked;
            if (checked) {
                var value = document.getElementsByClassName("show-item")[i].value;
                // alert(value);
                arr.push(value);
            }
        }

        if (arr.length != 0) {
            var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var out = this.responseText;
                    // alert(out);
                    location.reload();
                }
              };
              xhttp.open("GET", "/functions/ajax/noselect_cat.php?arr="+arr+"&cat="+cat, true);
              xhttp.send();
        } else {
            location.reload();
        }
    }

    function select_all (data) {
        // alert(data.checked);
        var class_list = document.getElementsByClassName("show-item");
        if (data.checked) {
            for (var i=0;i<class_list.length;i++) {
                document.getElementsByClassName("show-item")[i].checked = true;
            }
        } else {
            for (var i=0;i<class_list.length;i++) {
                document.getElementsByClassName("show-item")[i].checked = false;
            }
        }
    }
</script>