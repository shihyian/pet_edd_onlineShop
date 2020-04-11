<!DOCTYPE html>
<?php
    session_start();

    header("Content-Type: text/html; charset=utf-8");
    include("connMysql_fc.php");
    $seldb = @mysqli_select_db($db_link, "fc");
    if (!$seldb) die("資料庫選擇失敗！");

    $sql = "SELECT * FROM product_in_detail";
    $result = mysqli_query($db_link, $sql);
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
                    <span class="top_text"><a href="tool_bar/latest_news.php">&nbsp;最新消息&nbsp; </a>|</span>
                </span>
                <span class="change_color">
                    <span class="top_text"><a href="tool_bar/process.php">&nbsp;購物流程&nbsp; </a>|</span>
                </span>
                <span class="change_color">
                    <span class="top_text"><a href="tool_bar/member.php">&nbsp;購物車&nbsp; </a>|</span>
                </span>
                <span class="change_color">
                    <?php
                    if(!isset($_SESSION["m_account"]) || $_SESSION["m_account"] == ""){
                    ?>
                    <span class="top_text"><a href="tool_bar/member.php">&nbsp;會員登入&nbsp; </a>|</span>
                    <?php }else{?>
                    <span class="top_text"><a href="tool_bar/member.php?logout=true">&nbsp;登出&nbsp; </a>|</span>
                    <?php }?>
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
                    <h3 class="ct">商品管理</h3>
                    <?php
                        echo "<table class='table_style text_height'>";
                        echo "<tr>";
                        echo "<td class='ct table_c1'>商品名稱</td>";
                        echo "<td class='ct table_c1'>庫存量</td>";
                        echo "<td class='ct table_c1'>狀態</td>";
                        echo "<td class='ct table_c1'>操作</td>";
                        echo "</tr>";
                        while($product=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            echo "<tr>";
                            echo "<td class='table_c4'>".$product["name"]."</td>";
                            echo "<td class='ct table_c4'>".$product["amount"]."</td>";
                            if($product["amount"] == 0){
                                echo "<td class='ct table_c4'>等待進貨</td>";    
                            }
                            else{
                                echo "<td class='ct table_c4'>現貨</td>";
                            }

                            echo "<td class='ct table_c4'>";
                            echo '<a href="alter_product.php?ap='.$product["name"].'">'."<input type='button' name='alter' value='修改'>";
                            echo '<a href="delete_product.php?dp='.$product["name"].'">'."<input type='button' name='delete' value='刪除'>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    ?> 
               
                    <div class="ct">
                        <button onclick="location.href='add_product.php'" type="button">新增商品</button>   
                    </div>
                       		
              		
          	</div>
        	
               <div id="bottom" class="ct">
          	    頁尾版權 &nbsp;20191021<br>
          	    *本網頁純屬虛構*
               </div>      
		</div>
	</div>
	
</body>
</html>