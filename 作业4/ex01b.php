
<?php
$host= "127.0.0.1";
$userName="root";
$password="root";
$database="php_database";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql1 = "delete from personal where id=".$id;
    if (($connID = mysqli_connect($host, $userName, $password, $database))) {
        $result = mysqli_query($connID, $sql1);
        echo "<script>alert('数据库删除成功！')</script>";
    } else {
        echo "数据连接失败！";
    }
}
?>
<form action="ex01b.php" method="get">
    <table border="2" align="center">
        <tr>
            <td colspan="6" bgcolor="#778899" align="center">
               学生个人信息表
            </td>
        </tr>
        <tr>
           <th>姓名</th>
            <th>性别</th>
            <th>爱好</th>
            <th>家庭住址</th>
            <th>备注</th>
            <th></th>
        </tr>
    <?php
     if(($connID=mysqli_connect($host,$userName,$password,$database))) {
         $result = mysqli_query($connID, "select * from personal");
         $attr = $result->fetch_all();
         foreach ($attr as $v) {
             echo "<tr>";

             echo "<td>{$v[1]}</td><td>{$v[2]}</td><td>{$v[3]}</td><td>{$v[4]}</td><td>{$v[5]}</td>";//当行数比较多时者采用下面的写法。
             echo "<td><a href='ex01c.php?id={$v[0]}'>修改</a> <a href='ex01b.php?id={$v[0]}'>删除</a></td>";
             echo "</tr>";
         }
     }else{
         echo "数据连接失败！";
     }


    ?>
    </table>
</form>
