<!DOCTYPE html>
<?php
    header("Content-Type: text/html; charset=utf-8");
    include("connMysql_fc.php");
    $seldb = @mysqli_select_db($db_link, "fc");
    if (!$seldb) die("資料庫選擇失敗！");

    $sql1= "SELECT * FROM product_in_detail";
    $sql2 = "SELECT * FROM category";
    $result2 = mysqli_query($db_link, $sql2);

?>

<html>
<head>
	<meta charset="utf-8" name="description" content="這裡是寵物蛋販賣商城、有各種蛋、照護相關書籍、工具
     、飼料及人造飼養環境喔！">
	<title>˙˙寵物蛋蛋育成˙˙</title>
	<?php echo"<link rel='stylesheet' type='text/css' href='B074020030.css'>"; ?>
</head>
<body id="background">
	<img src="../picture/reptile.png" id="top_pic">
	
	<div id="font">
		
		<div id="container">
			<div id="myHeader">寵物蛋蛋育成</div>
			
			<div id="top">
                <span class="change_color">
                    <span class="top_text"><a href="index.php">回首頁&nbsp; </a>|</span>
                </span>
                <span class="change_color">
                    <span class="top_text"><a href="tool_bar/latest_news.html">&nbsp;最新消息&nbsp; </a>|</span>
                </span>
                <span class="change_color">
                    <span class="top_text"><a href="tool_bar/process.html">&nbsp;購物流程&nbsp; </a>|</span>
                </span>
                <span class="change_color">
                    <span class="top_text"><a href="tool_bar/member.html">&nbsp;購物車&nbsp; </a>|</span>
                </span>
                <span class="change_color">
                    <span class="top_text"><a href="tool_bar/member.html">&nbsp;會員登入&nbsp; </a>|</span>
                </span>
                <span class="change_color">
                    <span class="top_text"><a href="tool_bar/administrator.php">&nbsp;管理登入</a></span>
                </span>
            </div>
			<marquee>只要買一顆蛋 &nbsp; 就能享受從零開始的養成樂趣！</marquee>
			
               <div id="sidebar_left" class="ct">
					
                    <div class="block_c">
					<div class="ww"><a href="index.php">全部商品</a></div>
					<div class="ww"><a href="eggs/eggs.php">各種蛋</a>
						<div class="s">
							<a href="eggs/eggs_reptile.php">爬蟲類</a>
							<a href="eggs/eggs_bird.php">鳥類</a>
						</div>
					</div>
					<div class="ww"><a href="pet_tools/pet_tools.php">培養用具</a>
						<div class="s">
							<a href="pet_tools/environment.php">孵蛋環境</a>
							<a href="pet_tools/other_tools.php">其他</a>
						</div>
					</div>
					<div class="ww"><a href="helper/helper.php">培養小幫手</a>
						<div class="s">
							<a href="helper/books.php">書籍</a>
							<a href="helper/other_helper.php">其他</a>
						</div>
					</div>
					<div class="ww"><a href="food/food.php">飼料</a>
						<div class="s">
							<a href="food/food.php">飼料</a>
						</div>
					</div>
				</div>
				
                <div id="people">
					進站總人數
					<div id="people_number">99999</div>
				</div>
			</div>
        	
            <div id="sidebar_right">
          		
                <h3 class="ct">新增商品</h3>
                <form name="p_add" method="post" enctype="multipart/form-data" action="" >
                    <table class="table_style text_height">
                        <tr>
                            <td class="ct table_c1">所屬大分類</td>
                            <td class="table_c4">
                                <select name="category_big">
                                <option value="各種蛋">各種蛋</option>
                                <option value="培養用具">培養用具</option>
                                <option value="培養小幫手">培養小幫手</option>
                                <option value="飼料">飼料</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">所屬中分類</td>
                            <td class="table_c4">
                                <select name="category_small">
                                <option value="爬蟲類">爬蟲類</option>
                                <option value="鳥類">鳥類</option>
                                <option value="孵蛋環境">孵蛋環境</option>
                                <option value="書籍">書籍</option>
                                <option value="飼料">飼料</option>
                                <option value="其他">其他</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">商品名稱</td>
                            <td class="table_c4">
                                <input type="text" name="p_name" size="40">
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">商品價格</td>
                            <td class="table_c4">
                                <input type="text" name="p_price" size="40">
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">庫存量</td>
                            <td class="table_c4">
                                <input type="text" name="p_amount" size="20">
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">商品圖片</td>
                            <td class="table_c4">
                                <input type="file" name="p_pic" accept="image/png">
                                <?php
                                    
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">商品介紹</td>
                            <td class="table_c4">
                                <textarea name="p_caption1" style="width: 300px; height: 50px"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">商品備註</td>
                            <td class="table_c4">
                                <textarea name="p_caption2" style="width: 300px; height: 35px"></textarea>
                            </td>
                        </tr>
                    </table>
                    <div class="ct">
                        <input type="submit" name="add" value="新增">
                        <input type="reset" value="重置">
                        <?php
                            mysqli_query($db_link, $sql1);
                            if(isset($_POST["add"])){
                                $c_big = $_POST["category_big"];
                                $c_small = $_POST["category_small"];
                                $name = $_POST["p_name"];
                                $price = $_POST["p_price"];
                                $amount = $_POST["p_amount"];
                                $caption1 = $_POST["p_caption1"];
                                $caption2 = $_POST["p_caption2"];
                                $tmpname=$_FILES['p_pic']['tmp_name'];
                                if($tmpname != NULL){

                                    $fp= fopen($tmpname, 'r');
                                    $fileContent=fread($fp,filesize($tmpname));
                                    $file_uploads = base64_encode($fileContent);
                                }
                                $c_status = false;
                                $number_status = false;
                                while($c = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                                    if($c_big==$c["big"] && $c_small==$c["small"]){
                                        $c_status = true;
                                    }
                                }
                                if($c_status == false){
                                        echo '<script language="javascript">';
                                        echo 'alert("分類錯誤，請重新分類！")';
                                        echo '</script>';
                                }
                                if($price >= 0 && $amount >= 0){
                                    $number_status = true;
                                }
                                else{
                                    echo '<script language="javascript">';
                                    echo 'alert("價格及庫存量請輸入大於0的數字！")';
                                    echo '</script>';
                                }
                                if($_FILES['p_pic']['error'] === UPLOAD_ERR_OK){
                                    echo '<script language="javascript">';
                                    echo 'alert("圖片上傳成功！")';
                                    echo '</script>';
                                }
                                else{
                                    echo '<script language="javascript">';
                                    echo 'alert("圖片上傳失敗！")';
                                    echo '</script>';
                                }
                                if($c_status == true && $number_status == true){
                                    $product_detail = "INSERT INTO `product_in_detail`(`name`, `picture`, `caption_1`, `caption_2`, `amount`, `price`, `big_category`, `small_category`) VALUES ('$name','data:image/png;base64,".$file_uploads."','$caption1','$caption2','$amount','$price','$c_big','$c_small')";
                                    if(mysqli_query($db_link, $product_detail)){
                                        echo '<script language="javascript">';
                                        echo 'alert("商品新增成功！");';
                                        echo "window.location.href='product.php'";
                                        echo '</script>'; 
                                    }
                                    else{
                                        echo '<script language="javascript">';
                                        echo 'alert("商品新增失敗！");';
                                        echo '</script>'; 
                                    }
                                    fclose($fp);
                                   
                                }

                                
                            }

                        ?>
                    </div>
                    
                </form>
                   
                       		
              		
          	</div>
        	
               <div id="bottom" class="ct">
          	    頁尾版權 &nbsp;20191021<br>
          	    *本網頁純屬虛構*
               </div>      
		</div>
	</div>
	
</body>
</html>