<!DOCTYPE html>
<?php
  session_start();

  header("Content-Type: text/html; charset=utf-8");
  include("../connMysql_fc.php");
  $seldb = @mysqli_select_db($db_link, "fc");
  if (!$seldb) die("資料庫選擇失敗！");

  
?>
<html>
<head>
	<meta charset="utf-8" name="description" content="這裡是寵物蛋販賣商城、有各種蛋、照護相關書籍、工具
     、飼料及人造飼養環境喔！">
	<title>˙˙寵物蛋蛋育成˙˙</title>
	<link rel="stylesheet" type="text/css" href="../B074020030.css">
</head>
<body id="background">
	<img src="../picture/reptile.png" id="top_pic">
	
	<div id="font">
		
		<div id="container">
			<div id="myHeader">寵物蛋蛋育成</div>
			
			<div id="top">
                <span class="change_color">
                    <span class="top_text"><a href="../index.php">回首頁&nbsp; </a>|</span>
                </span>
                <span class="change_color">
                    <span class="top_text"><a href="latest_news.php">&nbsp;最新消息&nbsp; </a>|</span>
                </span>
                <span class="change_color">
                    <span class="top_text"><a href="process.php">&nbsp;購物流程&nbsp; </a>|</span>
                </span>
                <span class="change_color">
                    <span class="top_text"><a href="member.php">&nbsp;購物車&nbsp; </a>|</span>
                </span>
                <span class="change_color">
                    <?php
                    if(!isset($_SESSION["m_account"]) || $_SESSION["m_account"] == ""){
                    ?>
                    <span class="top_text"><a href="member.php">&nbsp;會員登入&nbsp; </a>|</span>
                    <?php }else{?>
                    <span class="top_text"><a href="member.php?logout=true">&nbsp;登出&nbsp; </a>|</span>
                    <?php }?>
                </span>
                <span class="change_color">
                    <span class="top_text"><a href="administrator.php">&nbsp;管理登入</a></span>
                </span>
            </div>
			<marquee>只要買一顆蛋 &nbsp; 就能享受從零開始的養成樂趣！</marquee>
			
              	<div id="sidebar_left" class="ct">
					
                    <div class="block_c">
						<div class="ww"><a href="../index.php">全部商品</a></div>
						<div class="ww"><a href="../eggs/eggs.php">各種蛋</a>
							<div class="s">
								<a href="../eggs/eggs_reptile.php">爬蟲類</a>
								<a href="../eggs/eggs_bird.php">鳥類</a>
							</div>
						</div>
						<div class="ww"><a href="../pet_tools/pet_tools.php">培養用具</a>
							<div class="s">
								<a href="../pet_tools/environment.php">孵蛋環境</a>
								<a href="../pet_tools/other_tools.php">其他</a>
							</div>
						</div>
						<div class="ww"><a href="../helper/helper.php">培養小幫手</a>
							<div class="s">
								<a href="../helper/books.php">書籍</a>
								<a href="../helper/other_helper.php">其他</a>
							</div>
						</div>
						<div class="ww"><a href="../food/food.php">飼料</a>
							<div class="s">
								<a href="../food/food.php">飼料</a>
							</div>
						</div>
					</div>
				
                    <div id="people">
						進站總人數
						<div id="people_number">99999</div>
					</div>
				</div>
        	
                <div id="sidebar_right">
          			<h3 class="ct">最新消息</h3>
                    <table class="table_style news">
                        <tr>
                        	<td class="ct table_c1">[20191010]</td>
                            <td class="table_c4">雙十特惠：所有商品通通免運費，單筆消費再送乙張南極運費抵用券！</td>
                        </tr>
                        <tr>
                         	<td class="ct table_c1">[20191022]</td>
                         	<td class="table_c4">期中大特價：全館五折！！</td>
                        </tr>
                    </table>
          		</div>
        	
                <div id="bottom" class="ct">
          	    	頁尾版權 &nbsp;20191021<br>
          	    	*本網頁純屬虛構*
                </div>      
		</div>
	</div>
	
</body>
</html>