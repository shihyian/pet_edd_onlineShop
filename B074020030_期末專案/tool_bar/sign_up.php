<!DOCTYPE html>
<?php
    session_start();

    header("Content-Type: text/html; charset=utf-8");
    include("../connMysql_fc.php");
    $seldb = @mysqli_select_db($db_link, "fc");
    if (!$seldb) die("資料庫選擇失敗！");

    $sql = "SELECT * FROM member";
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
                <form method="post" action="">
          		<h3 class="ct">會員註冊</h3>
                <table class="table_style text_height">
                    <tr>
                        <td class="ct table_c1">姓名：</td>
                        <td class="table_c4"><input type="text" name="user_name"></td>
                    </tr>
                    <tr>
                        <td class="ct table_c1">帳號：</td>
                        <td class="table_c4"><input type="text" name="user_account"></td>
                    </tr>
                    <tr>
                        <td class="ct table_c1">密碼：</td>
                        <td class="table_c4"><input type="password" name="user_password"></td>
                    </tr>
                    <tr>
                        <td class="ct table_c1">電話：</td>
                        <td class="table_c4"><input type="tel" name="user_tel"></td>
                    </tr>
                    <tr>
                        <td class="ct table_c1">地址：</td>
                        <td class="table_c4"><input type="text" name="user_address"></td>
                    </tr>
                    <tr>
                        <td class="ct table_c1">電子郵件：</td>
                        <td class="table_c4"><input type="email" name="user_email"></td>
                    </tr>
                </table>
          		
                <div class="ct"><input type="checkbox" name="select">我不會虐待動物</div>
          		<div class="ct">
          			<input type="submit" name="sign" value="確認註冊">
                    <?php
                        mysqli_query($db_link, $sql);
                        if(isset($_POST["sign"])){
                            if($_POST["select"] ==""){
                                echo '<script language="javascript">';
                                echo 'alert("原來你會虐待動物！不歡迎，掰掰！\\r(請勾選「我不會虐待動物」)");';
                                echo "window.location.href='sign_up.php'";
                                echo '</script>';
                            }

                            $name = $_POST["user_name"];
                            $account = $_POST["user_account"];
                            $password = $_POST["user_password"];
                            $tel = $_POST["user_tel"];
                            $address = $_POST["user_address"];
                            $email = $_POST["user_email"];
                            if($name=="" || $account=="" || $password=="" || $tel=="" || $address=="" || $email==""){
                                echo '<script language="javascript">';
                                echo 'alert("請填寫完整資料！");';
                                echo '</script>';
                            }
                            else{
                                $add_member = "INSERT INTO `member`(`m_name`, `m_account`, `m_password`, `m_tel`, `m_address`, `m_email`) VALUES ('$name', '$account', '$password', '$tel', '$address', '$email')";

                                if(mysqli_query($db_link, $add_member)){
                                    echo '<script language="javascript">';
                                    echo 'alert("會員註冊成功！");';
                                    echo "window.location.href='member.php'";
                                    echo '</script>';
                                }
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
