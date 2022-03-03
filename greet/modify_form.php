<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
   //세션변수 4
    //num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>뉴스</title>
	<link href="../common/css/common.css" rel="stylesheet">
	<link href="../sub6/common/css/sub6common.css" rel="stylesheet">
	<link href="./css/modify_form.css" rel="stylesheet">
</head>
<body>
<? include "../common/sub_header.html" ?>

<div class="visual">
   <img src="./images/visual.jpg" alt="비주얼이미지">
   <h3>고객센터</h3>
   <p>SERVICE CENTER</p>
</div>

<div class="sub_menu">
   <ul>
	   <li class="current"><a href="./list.php">뉴스</a></li>
	   <li><a href="../concert/list.php">나눔실천뉴스</a></li>
	   <li><a href="../sub6/sub6_3.html">선박기초상식</a></li>
	   <li><a href="../sub6/sub6_4.html">온라인문의</a></li>
   </ul>
</div>

<article id="content">
   <!-- 타이틀 -->
   <div class="title_area">
	   <div class="line_map">HOME &gt; 고객센터 &gt; <strong>뉴스</strong></div>
	   <h2>뉴스</h2>
   </div>

   <div class="content_area">     
   <form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>"> 
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1">
				<div class="col1">작성자</div>
				<div class="col2"><?=$usernick?></div>
			</div>

			<div class="write_line"></div>
			<div id="write_row2">
				<div class="col1">제목</div>
			    <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>"></div>
			</div>

			<div class="write_line"></div>
			<div id="write_row3">
				<div class="col1">내용</div>
			    <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
		</div>

		<div id="write_button">
			<input type="submit" value="완료">
			<a href="list.php?page=<?=$page?>">목록</a>
		</div>
		</form>
   </div>
</article>
<? include "../common/sub_footer.html" ?>
</body>
</html>



