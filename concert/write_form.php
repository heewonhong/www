<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table=concert


	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
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
	<title>나눔실천뉴스</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<link href="../common/css/common.css" rel="stylesheet">
	<link href="../sub6/common/css/sub6common.css" rel="stylesheet">
	<link href="./css/write_form.css" rel="stylesheet">
<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
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
            <h3>고객센터</h3>
            <p>SERVICE CENTER</p>
        </div>

		<div class="sub_menu">
            <ul>
                <li><a href="../greet/list.php">뉴스</a></li>
                <li class="current"><a href="./list.php">나눔실천뉴스</a></li>
                <li><a href="../sub6/sub6_3.html">선박기초상식</a></li>
                <li><a href="../sub6/sub6_4.html">온라인문의</a></li>
            </ul>
        </div>

		<article id="content">
            <!-- 타이틀 -->
            <div class="title_area">
                <div class="line_map">HOME &gt; 고객센터 &gt; <strong>나눔실천뉴스</strong></div>
                <h2>나눔실천뉴스</h2>
            </div>

            <div class="content_area">
				

<?
	if($mode=="modify") //수정글쓰기
	{

?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
	else // 새글쓰기
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<div id="write_form">
		<div class="write_line"></div>
			<div id="write_row1">
				<div class="col1">작성자</div>
				<div class="col2"><?=$usernick?></div>
<?
	if( $userid && ($mode != "modify") )
	{   //새글쓰기 에서만 HTML 쓰기가 보인다
?>
				<div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
<?
	}
?>						
			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1">제목</div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1">내용</div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
			<ul id="write_row4">
				<li class="col1"><i class="fas fa-file"></i>이미지파일1</li>
				<li class="col2"><input type="file" name="upfile[]"></li>
			</ul>
			<div class="clear"></div>
<? 	if ($mode=="modify" && $item_file_0)
	{
?>
			<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다.
			<input type="checkbox" name="del_file[]" value="0">삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>
			<ul id="write_row5">
				<li class="col1"><i class="fas fa-file"></i>이미지파일2</li>
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
				<li class="col1"><i class="fas fa-file"></i>이미지파일3</li>
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

		<div id="write_button"><a href="#" onclick="check_input()">완료</a>&nbsp;
								<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
		</div>
           
		</form>

        	</div>
    	</article>
	<? include "../common/sub_footer.html" ?>

</body>
</html>
