<?php

if(isset($_GET['name'])) {
    $name = $_GET['name'];
    $sex = $_GET['sex'];
    $sql1 = "select count(*) from student where name='".$name."'and sex='".$sex."'";
    if (($connID = mysqli_connect('127.0.0.1','root', 'root','php_database'))) {

    $result = mysqli_query($connID, $sql1);
        $attr = $result->fetch_all();
        foreach ($attr as $v)
        echo 'attr:',$v[0];
        session_start();
        $_SESSION['name']=$name;
        $_SESSION['sex']=$sex;
       if($v[0]<=0){
    header("Location:ex02b.php");
        }
       else {
      header("Location:ex02c.php");
       }
    }
    else {
       echo '连接不上数据库';
    }
}
?>

<form action="ex02a.php" method="get">
    <div style="position:absolute;left:45%">
    <span style="color: green;font-size: 25px;">用户登录</span>
    <table border="2" >
        <tr>
            <td>
                姓名：
            </td>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td>
                性别：
            </td>
            <td>
                <input type="radio" name="sex" value="男">男<input type="radio" name="sex" value="女">女
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="提交"><input type="reset" value="重置">
            </td>
        </tr>
    </table>
    </div>
</form>
