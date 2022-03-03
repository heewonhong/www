<?
    session_start();

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보수정</title>
    <link href="../common/css/common.css" rel="stylesheet">
    <link href="./css/member_modify.css" rel="stylesheet"> 

<?
    //$userid='green; //세션변수
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>

</head>
<body>
    <div class="wrap">
        <header> 
            <h1><a class="logo" href="../index.html">삼성중공업로고</a></h1>
        </header>
        <article id="content">
            <h2>회원정보수정</h2>
            <p>* 모든 항목은 필수 입력 사항입니다.</p>
            <form  name="member_form" method="post" action="modify.php"> 

            <div id="form_join">
                <table>
                    <tbody>
                    <tr>
                        <th>아이디</th>
                        <td><?= $row[id] ?></td>
                    </tr>
                    <tr>
                        <th><label for="pass">비밀번호</label></th>
                        <td>
                            <input type="password" name="pass" id="pass" required>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="pass_confirm">비밀번호확인</label></th>
                        <td>
                            <input type="password" name="pass_confirm" id="pass_confirm" required>
                        </td>
                    </tr>
                    <tr>
                        <th>이름</th>
                        <td><input type="text" name="name" value="<?= $row[name] ?>"></td>
                    </tr>
                    <tr>
                        <th>닉네임</th>
                        <td>
                            <input type="text" name="nick" id="nick" value="<?= $row[nick] ?>">
                            <div id="loadtext2"></div>
                        </td>
                    </tr>
                    <tr>
                        <th>휴대폰</th>
                        <td><input type="text" class="hp" name="hp1" value="<?= $hp1 ?>"> 
                         - <input type="text" class="hp" name="hp2" value="<?= $hp2 ?>"> - <input type="text" class="hp" name="hp3" value="<?= $hp3 ?>"></td>
                    </tr>
                    <tr>
                        <th>이메일</th>
                        <td><input type="text" id="email1" class="email" name="email1" value="<?= $email1 ?>"> @ <input type="text" class="email" name="email2" value="<?= $email2 ?>"></td>
                    </tr>
                    </tbody>
                </table>

                <div class="clear"></div>
            </div>
            
            <div id="button">
                <a href="#" onclick="check_input()">저장하기</a>
                <a href="#" onclick="reset_form()">취소하기</a>
            </div>

            </div>   
            </form>
        </article>
    </div>

    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="./js/member_modify.js"></script>
</body>
</html>






