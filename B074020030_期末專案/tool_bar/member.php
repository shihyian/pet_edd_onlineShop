<!DOCTYPE html>
<?php
    session_start();

    header("Content-Type: text/html; charset=utf-8");
    include("../connMysql_fc.php");
    $seldb = @mysqli_select_db($db_link, "fc");
    if (!$seldb) die("資料庫選擇失敗！");

    $sql = "SELECT * FROM member";
    $result = mysqli_query($db_link, $sql);

if(!isset($_SESSION["m_account"]) || ($_SESSION["m_account"]=="")){
    if(isset($_POST["login"])){


        $account = $_POST["input_account"];
        $password = $_POST["input_password"];
        while($pass = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            if($account==$pass["m_account"] && $password==$pass["m_password"]){
                $_SESSION["m_account"]=$account;
                echo '<script language="javascript">';
                echo 'alert("登入成功！");';
                echo "window.location.href='member.php'";
                echo '</script>';
                
            }
        }
    }
}

    


    if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
        unset($_SESSION["m_account"]);
        header("Location: member.php");
    }

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
                    <span class="top_text"><a href="latest_news.html">&nbsp;最新消息&nbsp; </a>|</span>
                </span>
                <span class="change_color">
                    <span class="top_text"><a href="process.html">&nbsp;購物流程&nbsp; </a>|</span>
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
                <?php
                    if(!isset($_SESSION["m_account"]) || $_SESSION["m_account"] == ""){
                ?>
                <form method="post" action="member.php">
          		<h3 class="ct">會員登入</h3>
                <table class="table_style text_height">
                    <tr>
                        <td class="ct table_c1">帳號：</td>
                        <td class="table_c4"><input type="text" name="input_account"></td>
                    </tr>
                    <tr>
                        <td class="ct table_c1">密碼：</td>
                        <td class="table_c4"><input type="password" name="input_password"></td>
                    </tr>
                </table>
          		
          		<div class="ct">
          			<input type="submit" name="login" value="登入">
                    <a href="sign_up.php"><input type="button" name="sign" value="會員註冊">
            	</div>
            </form>
            <?php 
                }else{
            ?>
            <h3 class="ct"><i><?php echo $_SESSION["m_account"];?>, 你好！</i></h3>
            <div class="ct">
                <span class="change_color">
                    <span class="top_text"><a href="member.php?logout=true">登出</a></span>
                </span>
            </div>
            <?php } ?>   
          	</div>
        	
               <div id="bottom" class="ct">
          	    頁尾版權 &nbsp;20191021<br>
          	    *本網頁純屬虛構*
               </div>      
		</div>
	</div>
	
</body>
</html>