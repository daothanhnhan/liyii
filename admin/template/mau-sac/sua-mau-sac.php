<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function mau_sac ($id) {
		global $conn_vn;
		if (isset($_POST['edit_mau'])) {
			$src= "../images/";
			// $src = "uploads/";
			// $image = '';

			// if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

			// 	uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
			// 	$image = $_FILES['image']['name'];

			// }
			$name = mysqli_real_escape_string($conn_vn, $_POST['name']);
			$code = $_POST['code'];

			$sql = "UPDATE mau_sac SET name = '$name', code = '$code' WHERE id = $id";

			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã sửa màu sắc thành công.\')</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	mau_sac($_GET['id']);

	$info = $action->getDetail('mau_sac', 'id', $_GET['id']);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin thương hiệu<br /><br /></p>     
            <p class="subLeftNCP"><a href="index.php?page=mau-sac">Quay lại</a><br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tên màu</p>
            <input type="text" class="txtNCP1" name="name" value="<?= $info['name'] ?>" />
            <p class="titleRightNCP">Mã màu</p>
            <input type="text" class="txtNCP1" name="code" value="<?= $info['code'] ?>" />
            
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="edit_mau">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ Cafelink Việt Nam</p>