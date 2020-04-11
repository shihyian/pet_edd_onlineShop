<!DOCTYPE html>
<?php
    session_start();

    header("Content-Type: text/html; charset=utf-8");
    include("connMysql_fc.php");
    $seldb = @mysqli_select_db($db_link, "fc");
    if (!$seldb) die("資料庫選擇失敗！");
    $ap = $_GET['ap'];
    $sql1 = "SELECT * FROM `product_in_detail` WHERE name ='$ap'";
    $sql2 = "SELECT * FROM category";
    $sql3 = "SELECT * FROM big_category";
    $sql4 = "SELECT * FROM small_category";
    $result1 = mysqli_query($db_link, $sql1);
    $result2 = mysqli_query($db_link, $sql2);
    $result3 = mysqli_query($db_link, $sql3);   
    $result4 = mysqli_query($db_link, $sql4); 
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
                
                <h3 class="ct">修改商品</h3>
                <form name="p_alter" method="post" enctype="multipart/form-data" action="">
                    <table class="table_style text_height">
                        <tr>
                            <td class="ct table_c1">所屬大分類</td>
                            <td class="table_c4">
                                <?php
                                    echo "<select name='category_big'>";
                                    $detail = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                                    echo "<option value=".$detail["big_category"].">".$detail["big_category"]."</opiton>";
                                    while($c = mysqli_fetch_array($result3,MYSQLI_ASSOC)){
                                        if($c["c_big"] != $detail["big_category"]){
                                            echo "<option value=".$c["c_big"].">".$c["c_big"]."</opiton>"; 
                                        }
                                    }
                                    echo "</select>";
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">所屬中分類</td>
                            <td class="table_c4">
                                <?php
                                    echo "<select name='category_small'>";
                                    echo "<option value=".$detail["small_category"].">".$detail["small_category"]."</opiton>";
                                    while($c = mysqli_fetch_array($result4,MYSQLI_ASSOC)){
                                        if($c["c_small"] != $detail["small_category"]){
                                            echo "<option value=".$c["c_small"].">".$c["c_small"]."</opiton>"; 
                                        }
                                    }
                                    echo "</select>";
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">商品名稱</td>
                            <td class="table_c4">
                                <?php echo"<input type='text' name='p_name' size='40' value=".$detail["name"].">"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">商品價格</td>
                            <td class="table_c4">
                                <?php echo"<input type='number' name='p_price' size='40' value=".$detail["price"].">"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">庫存量</td>
                            <td class="table_c4">
                                <?php echo"<input type='number' name='p_amount' size='40' value=".$detail["amount"].">"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">商品圖片</td>
                            <td class="table_c4">
                                <input type="file" name="p_pic" accept="image/png">
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">商品介紹</td>
                            <td class="table_c4">
                                <?php echo"<textarea name='p_caption1' style='width: 300px; height: 50px'>".$detail["caption_1"]."</textarea>";?>
                            </td>
                        </tr>
                        <tr>
                            <td class="ct table_c1">商品備註</td>
                            <td class="table_c4">
                                <?php echo"<textarea name='p_caption2' style='width: 300px; height: 35px'>".$detail["caption_2"]."</textarea>";?>
                            </td>
                        </tr>
                    </table>
                     <div class="ct">
                        <input type="submit" name="alter" value="確認">
                        <input type="reset" value="重置">
                        <?php
                            mysqli_query($db_link, $sql1);
                            if(isset($_POST["alter"])){
                                $c_big = $_POST["category_big"];
                                $c_small = $_POST["category_small"];
                                $name = $_POST["p_name"];
                                $price = $_POST["p_price"];
                                $amount = $_POST["p_amount"];
                                $caption1 = $_POST["p_caption1"];
                                $caption2 = $_POST["p_caption2"];
                                $tmpname=$_FILES['p_pic']['tmp_name'];
                                $fp= fopen($tmpname, 'r');
                                $fileContent=fread($fp,filesize($tmpname));
                                $file_uploads = base64_encode($fileContent);
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
                                    $product_detail = "UPDATE `product_in_detail` SET `name`='$name',`picture`='data:image/png;base64,".$file_uploads."',`caption_1`='$caption1',`caption_2`='$caption2',`amount`='$amount',`price`='$price',`big_category`='$c_big',`small_category`='$c_small' WHERE name ='$ap'";
                                    if(mysqli_query($db_link, $product_detail)){
                                        echo '<script language="javascript">';
                                        echo 'alert("商品修改成功！");';
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