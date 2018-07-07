
<?php
require_once('conn.php');
?>
<html>
<head>
    <?php head()?>

    <title>后台管理</title>
</head>

<body>
<?php
$action = isset($_GET["act"]) ? $_GET["act"] : "";
if($action=="vote") {
    echo 'lalala';
    $stu = $_SESSION["stu"];
    $class = $_SESSION["class"];
    $teacher = $_SESSION["teacher"];
    $stu_name=$_SESSION['stu_name'];
    $strstr=$_SESSION['strstr'];
    $sql2="insert into xh_userinfo value( null,".$stu.",'".$stu_name."','".$class."','".$teacher."'";
    $i=0;
    while($i<$strstr)
    {
        $key=$_GET["qid".$strstr."'"];

        $sql2=$sql2.",'".$key."'";
        $i++;
    }
    $sql2=$sql2.")";
     echo 'sql:',$sql2;
    $query = mysqli_query($conn, $sql2);
    echo "<script>alert('评课成功');</script>";
    header("Location:svote.php");
}
?>
<div align="center">

    <table width="40%" id="table1" cellspacing="1" cellpadding="4" bgcolor="#E1F0FF">
        <tr>

            <td colspan="4" align="center" bgcolor="#BFDFFF">感谢你的投票</td>
        </tr>





    </table><br>

</div>
<div align="center">
    <input class="btn" type="button" name="button" value="关闭" onClick="<script>window.close()</script>">
</div>

</body>
</html>
<?php mysqli_close($conn);?>