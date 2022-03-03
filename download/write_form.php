<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	include "../lib/dbconn.php";

	if ($mode=="modify")
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>인재채용-채용공고</title>
	<link href="../common/css/common.css" rel="stylesheet">
	<link href="../sub5/common/css/sub5common.css" rel="stylesheet">
	<link href="./css/write_form.css" rel="stylesheet">
	<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요.");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요.");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
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
			<?
				if($mode=="modify")
				{
			
			?>
				<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
			<?
				}
				else
				{
			?>
			  <form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
			<?
				}
			?>
			  <div id="write_form">
				  <div class="write_line"></div>
				  <div id="write_row1">
					  <div class="col1">닉네임</div>
					  <div class="col2"><?=$usernick?></div>
				  </div>
	  
				  <div class="write_line"></div>
				  <div id="write_row2">
					  <div class="col1">제목</div>
					  <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
				  </div>
	  
				  <div class="write_line"></div>
				  <div id="write_row3">
					  <div class="col1">내용</div>
					  <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
				  </div>
	  
				  <div class="write_line"></div>
				  <span>5MB까지 업로드 가능</span>
				  <ul id="write_row4">
					  <li class="col1">첨부파일1</li>
					  <li class="col2"><input type="file" name="upfile[]"></li>
				  </ul>
				  <div class="clear"></div>
	  <? 	if ($mode=="modify" && $item_file_0)
		  {
	  ?>
				  <div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
				  <div class="clear"></div>
	  <?
		  }
	  ?>
				  <div class="write_line"></div>
				  <ul id="write_row5">
					  <li class="col1">첨부파일2</li>
					  <li class="col2"><input type="file" name="upfile[]"></li>
				  </ul>
	  <? 	if ($mode=="modify" && $item_file_1)
		  {
	  ?>
				  <div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</div>
				  <div class="clear"></div>
	  <?
		  }
	  ?>
				  <div class="write_line"></div>
				  <div class="clear"></div>
				  <ul id="write_row6">
					  <li class="col1">첨부파일3</li>
					  <li class="col2"><input type="file" name="upfile[]"></li>
				  </ul>
	  <? 	if ($mode=="modify" && $item_file_2)
		  {
	  ?>
				  <div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
				  <div class="clear"></div>
	  <?
		  }
	  ?>
				  <div class="write_line"></div>
	  
				  <div class="clear"></div>
			  </div>
	  
			  <div id="write_button"><a href="#" onclick="check_input()">글쓰기</a>
									  <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
			  </div>
	  
			  </form>
	  
		</div>
	</article>
	<? include "../common/sub_footer.html" ?>
</body>
</html>

