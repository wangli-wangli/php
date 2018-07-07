<?php

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $host = "127.0.0.1";
    $userName = "root";
    $password = "root";
    $database = "php_database";
    $sql1 = "select * from personal where id=".$id;

    if (($connID = mysqli_connect($host, $userName, $password, $database))) {
        $result = mysqli_query($connID, $sql1);
    }
    ?>
    <form action="ex01c.php" method="get">
        <table border="2" align="center">
            <tr>
                <td colspan="2" bgcolor="#778899" align="center">
                    修改学生信息
                </td>
            </tr>
            <?php
            $attr = $result->fetch_all();
            foreach ($attr as $v) {
                ?>
                <tr>
                    <td width="30%" align="right">真实姓名</td>
                    <td width="70%"><input type="hidden" name="id2" value="<?php echo $v[0]; ?>">
                        <input type="text" name="name" value="<?php echo $v[1]; ?>"></td>
                </tr>
                <tr>
                    <td align="right">性别</td>
                    <td>
                        <?php
                        if ($v[2] == '男') {
                            ?>
                            <input type="radio" name="sex" value="男" checked>男<input type="radio" name="sex" value="女">女
                            <?php
                        } else {
                            ?>
                            <input type="radio" name="sex" value="男">男<input type="radio" name="sex" value="女" checked>女
                        <?php } ?></td>
                </tr>
                <tr>
                    <td align="right">兴趣爱好</td>
                    <td><input type="text" name="hobby" value="<?php echo $v[3]; ?>"></td>
                </tr>
                <tr>
                    <td align="right">家庭住址</td>
                    <td>
                        <input type="text" name="address" value="<?php echo $v[4]; ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        备注
                    </td>
                    <td>
                        <textarea cols="40" rows="3" name="addition"> <?php echo $v[5]; ?></textarea>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="提交"><input type="reset" value="重置">
                </td>
            </tr>
        </table>

    </form>
    <?php
}
if(isset($_GET['id2'])) {
    $id2 = $_GET['id2'];
    $name = $_GET['name'];
    $sex = $_GET['sex'];
    $hobby = $_GET['hobby'];
    $address = $_GET['address'];
    $addition = $_GET['addition'];
    $host = "127.0.0.1";
    $userName = "root";
    $password = "root";
    $database = "php_database";
    $sql2 = "update personal set  name='" . $name . "',sex='" . $sex . "',hobby='" . $hobby . "',address='" . $address . "',adition='" . $addition . "' where id=" . $id2 ."";
    echo $sql2;
    if (($connID = mysqli_connect($host, $userName, $password, $database))) {
        $result = mysqli_query($connID, $sql2);

        header("Location:ex01b.php");
        echo 'result';
    } else {
        echo "数据连接失败！";
    }
}

?>