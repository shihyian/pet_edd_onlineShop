<?php	
	header("Content-Type: text/html; charset=utf-8");
    include("connMysql_fc.php");
    $seldb = @mysqli_select_db($db_link, "fc");
    if (!$seldb) die("資料庫選擇失敗！");
    $dp = $_GET['dp'];
    $sql1 = "SELECT * FROM `product_in_detail` WHERE name ='$dp'";
	$result1 = mysqli_query($db_link, $sql1);

	$delete_product = "DELETE FROM `product_in_detail` WHERE name ='$dp'";
	if(mysqli_query($db_link, $delete_product)){
        echo '<script language="javascript">';
        echo 'alert("商品已刪除！");';
        echo '</script>'; 
    }
    else{
    	echo '<script language="javascript">';
        echo 'alert("刪除失敗！");';
        echo '</script>';
    }
    echo "<script type='text/javascript'>";
    echo "window.location.href='product.php'";
    echo "</script>";  
?>