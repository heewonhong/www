<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "concert"; //테이블명 처리
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>나눔실천뉴스</title>
<link href="../common/css/common.css" rel="stylesheet">
<link href="../sub6/common/css/sub6common.css" rel="stylesheet">
<link href="./css/concert.css" rel="stylesheet">
</head>
<?
	include "../lib/dbconn.php";

    
   if (!$scale)
    $scale=10;			// 한 화면에 표시되는 글 수

    
    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>

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
			<p>“<span>삼성중공업의</span> 새로운 나눔 실천 소식을 알려드립니다.</p>
		</div>

    	<div class="content_area">
		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
			<div id="list_total">총 <strong><?= $total_record ?></strong> 개의 소식이 있습니다.</div>
			<ul id="list_search">
					<li id="list_search1">
						<select name="find">
							<option value='subject'>제목</option>
							<option value='content'>내용</option>
							<option value='nick'>닉네임</option>
							<option value='name'>이름</option>
						</select>
					</li>
					<li id="#list_search2">
                        <label for="search" class="hidden">검색</label>
                        <input type="text" id="search" name="search">
                    </li>
                    <li id="list_search3">
                        <label for="search_button" class="hidden">검색버튼</label>
                        <input type="submit" id="search_button" value="검색">
                    </li>
				</ul>
				<div class="slist">
					<select name="scale" onchange="location.href='list.php?scale='+this.value">
						<option value=''>보기</option>
						<option value='5'>5</option>
						<option value='10'>10</option>
						<option value='15'>15</option>
						<option value='20'>20</option>
					</select>
				</div>
				</form>

			<div class="clear"></div>

			<div id="list_top_title">
				<ul>
					<li id="list_title1">번호</li>
					<li id="list_title2">제목</li>
					<li id="list_title3">작성자</li>
					<li id="list_title4">등록일</li>
					<li id="list_title5">조회</li>
				</ul>		
			</div>

		<div id="list_content">
	<?		
	for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
	{
		mysql_data_seek($result, $i);       
		// 가져올 레코드로 위치(포인터) 이동  
		$row = mysql_fetch_array($result);       
		// 하나의 레코드 가져오기
		
		$item_num     = $row[num];
		$item_id      = $row[id];
		$item_name    = $row[name];
		$item_nick    = $row[nick];
		$item_hit     = $row[hit];
		$item_date    = $row[regist_day];
		$item_date = substr($item_date, 0, 10);  
		$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
			
		if($row[file_copied_0]){ //첨부된 첫번째 이미지가 있나?
			$item_img = './data/'.$row[file_copied_0]; // ./data/2022_02_22_10_43_13_0.jpg 
		}else{
			$item_img = './data/default.jpg'  ;
		}
		
	?>
				<ul class="list_item">
					<li class="list_item1"><?= $number ?></li>
					<li class="list_item2">
						<a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
						<img src="<?=$item_img?>" alt="이미지">
						<span><?= $item_subject ?></span>
						</a>
					</li>
					<li class="list_item3"><?= $item_nick ?></li>
					<li class="list_item4"><?= $item_date ?></li>
					<li class="list_item5"><?= $item_hit ?></li>
				</ul>

	<?
		$number--;
	}
	?>
				<div id="page_button">
					<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
	<?
	// 게시판 목록 하단에 페이지 링크 번호 출력
	for ($i=1; $i<=$total_page; $i++)
	{
			if ($page == $i)     // 현재 페이지 번호 링크 안함
			{
				echo "<b> $i </b>";
			}
			else
			{ 
				
			if($mode=="search"){
				echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
			}else{    
				
				echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
			}
				
			
			}      
	}
	?>			
				&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
					</div>
					<div id="button">
						<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
	<? 
		if($userid)
		{
	?>
			<a href="write_form.php?table=<?=$table?>">글쓰기</a>
	<?
		}
	?>
				</div>
			</div>	
        </div> 
		<div class="clear"></div>

  </div>
</article>
<? include "../common/sub_footer.html" ?>
</body>
</html>
