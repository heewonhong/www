<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       

	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$file_name[0]   = $row[file_name_0];
	$file_name[1]   = $row[file_name_1];
	$file_name[2]   = $row[file_name_2];

	$file_type[0]   = $row[file_type_0];
	$file_type[1]   = $row[file_type_1];
	$file_type[2]   = $row[file_type_2];

	$file_copied[0] = $row[file_copied_0];
	$file_copied[1] = $row[file_copied_1];
	$file_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = str_replace(" ", "&nbsp;", $row[content]);
	$item_content = str_replace("\n", "<br>", $item_content);
	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>인재채용-채용공고</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<link href="../common/css/common.css" rel="stylesheet">
	<link href="../sub5/common/css/sub5common.css" rel="stylesheet">
	<link href="./css/view.css" rel="stylesheet">
	<script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 수 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
</head>
<body>
	<? include "../common/sub_header.html" ?>

	<div class="visual">
		<img src="./images/visual.jpg" alt="비주얼이미지">
		<h3>인재채용</h3>
		<p>RECRUITMENT</p>
	</div>

	<!-- 서브메뉴 -->
	<div class="sub_menu">
		<ul>
			<li><a href="../sub5/sub5_1.html">인재상</a></li>
			<li><a href="../sub5/sub5_2.html">복리후생</a></li>
			<li><a href="../sub5/sub5_3.html">채용절차</a></li>
			<li class="current"><a href="./list.php">채용공고</a></li>
		</ul>
	</div>

	<article id="content">
		<div class="title_area">
				<div class="line_map">HOME &gt; 인재채용 &gt; <strong>채용공고</strong></div>
				<h2>채용공고</h2>
		</div>
		<div class="content_area">
			<div id="view_title">
				<div id="view_title1"><?= $item_subject ?></div>
				<ul id="view_title2">
					<li><i class="fas fa-user-cog"></i><?= $item_nick ?></li>
					<li><strong>게시일</strong> : <?= $item_date ?></li>
					<li><strong>조회수</strong> : <?= $item_hit ?></li>
				</ul>
			</div>
	
			<div id="view_content">
	<?
		for ($i=0; $i<3; $i++)
		{
			if ($userid && $file_copied[$i])
			{
				$show_name = $file_name[$i];
				$real_name = $file_copied[$i];
				$real_type = $file_type[$i];
				$file_path = "./data/".$real_name; 
				$file_size = filesize($file_path);
	
				echo "■ 첨부파일 : $show_name ($file_size Byte) &nbsp;&nbsp;
					   <a href='download.php?table=$table&num=$num&real_name=$real_name&show_name=$show_name&file_type=$real_type'>[저장]</a><br>";
			}
		}
	?>
				<br>
				<?= $item_content ?>
			</div>
	
			<div id="view_button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
	<? 
		if($userid && $userid==$item_id && $userid='admin')
		{
	?>
					<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
					<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>&nbsp;
	<?
		}
	?>
	<? 
		if($userid)
		{
	?>
					<a href="write_form.php?table=<?=$table?>">글쓰기</a>
	<?
		}
	?>
			</div>
			<div class="clear"></div>
		</div>
	</article>
	<? include "../common/sub_footer.html" ?>
</body>
</html>