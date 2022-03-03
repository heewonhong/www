<meta charset="utf-8">
<?
   
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);


    if(!$pass_confirm) 
   {
      echo("비밀번호를 입력하세요.");
   }
   else
   {
      include "../lib/dbconn.php";
 
      $sql = "select * from member where pass='$pass' ";

      $result = mysql_query($sql, $connect);
      $num_record = mysql_num_rows($result);


     
      if ($num_record)
      {
       
         echo "<span style='color:red'>비밀번호가 일치하지 않습니다.</span>";
      }
      else
      {
         echo "<span style='color:green'>비밀번호가 일치합니다.</span>";
      }
    
 
      mysql_close();
   }

?>

