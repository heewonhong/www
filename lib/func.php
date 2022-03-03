<?
   function latest_article($table, $loop, $char_limit) //테이블명, 리스트개수, 제목글제한수(byte)
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		echo "<ul>";

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			$len_subject = mb_strlen($row[subject], 'utf-8'); //한글도 1자로 처리, 제목의 총글자수 40
			$subject = $row[subject];


			if ($len_subject > $char_limit) //제한글자수(30) 보다 크면
			{
				//$subject = str_replace( "&#039;", "'", $subject);               
                $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}
			$regist_day = substr($row[regist_day], 0, 10);
            
            
           if($table=='greet'){ 
            
			echo "      

			<li><a href='./$table/view.php?table=$table&num=$num'><p>$subject</p><span>$regist_day</span></a></li>
			";
               
           }      
		}

		echo "</ul>";

		mysql_close();
   }
?>