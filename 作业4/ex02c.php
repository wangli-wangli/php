<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $host = "127.0.0.1";
    $userName = "root";
    $password = "root";
    $database = "php_database";
    $sql1 = "delete from student where id=".$id;
    if (($connID = mysqli_connect($host, $userName, $password, $database))) {
        $result = mysqli_query($connID, $sql1);
        echo '<script>alert("数据删除成功");</script>';
      header("Location:ex02b.php");
    }
}
    session_start();
    $name=$_SESSION['name'];

    $host = "127.0.0.1";
    $userName = "root";
    $password = "root";
    $database = "php_database";
    $sql1 = "select * from student where name='" . $name."'";
    if (($connID = mysqli_connect($host, $userName, $password, $database))) {
        $result = mysqli_query($connID, $sql1);


        ?>
        <form action="ex02c.php" method="get">
            <table border="2" align="center" width="40%">
                <tr>
                    <td colspan="2" bgcolor="#778899" align="center">
                        学生个人信息表
                    </td>
                </tr>
                <?php
                $attr = $result->fetch_all();
                foreach ($attr as $v) {
                    ?>
                    <tr>
                        <td width="30%" align="right">真实姓名</td>
                        <td width="70%">
                            <?php echo $v[1]; ?></td>
                    </tr>
                    <tr>
                        <td align="right">性别</td>
                        <td>
                            <?php echo $v[2]; ?>
                    </tr>
                    <tr>
                        <td align="right">年龄</td>
                        <td><?php echo $v[3]; ?></td>
                    </tr>
                    <tr>
                        <td align="right">家庭住址</td>
                        <td>
                            <?php echo $v[4]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            兴趣爱好
                        </td>
                        <td>
                            <?php echo $v[5]; ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" align="center">
                        <a href='ex02c.php?id=<?php echo $v[0];?>'>删除</a>
                        <a href='ex02d.php?id=<?php echo $v[0];?>'>修改</a>
                    </td>
                </tr>
            </table>

        </form>

        <?php
    }

    ?>