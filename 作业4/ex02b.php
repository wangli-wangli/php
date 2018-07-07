<?php
session_start();
if(isset($_SESSION['name'])){
    $name = $_SESSION['name'];
    $sex = $_SESSION['sex'];
    if ($sex == '男') {
        ?>
        <span style="color:green "><?php $name ?>先生，您好，对不起，没有找到您的个人资料,请填写您的详细信息！</span>
        <?php
    } else {
        ?>
        <span style="color:green "><?php $name ?>女士，您好，对不起，没有找到您的个人资料,请填写您的详细信息！</span>
        <?php
    }

?>
<hr style="color: red"/>
<?php
}
?>

<?php
if(isset($_GET['name2']))
{
    $name2 = $_GET['name2'];
    $sex2 = $_GET['sex2'];
    $hobby = $_GET['hobby'];
    $address = $_GET['address'];
    $age = $_GET['age'];
    $sql1 = "insert into student values(' ','" . $name2 . "','" . $sex2 . "','" . $age . "','" . $address . "','" . $hobby . "')";
    if (($connID = mysqli_connect('127.0.0.1','root', 'root','php_database'))) {
        $result = mysqli_query($connID, $sql1);
        echo "<script>alert('保存成功')</script>";
        header("Location:ex02a.php");
    } else {
        echo "数据连接失败！";

    }
}
?>

<form action="ex02b.php" method="get">
    <table border="2" align="center">
        <tr>
            <td colspan="2" bgcolor="#778899" align="center">
                添加个人资料
            </td>
        </tr>


        <tr>
            <td width="30%" align="right" >真实姓名</td>
            <td width="70%"><input type="text" name="name2"></td>
        </tr>
        <tr>
            <td align="right">性别</td>
            <td><input type="radio" name="sex2" value="男">男<input type="radio" name="sex2" value="女">女</td>
        </tr>
        <tr>
            <td align="right">年龄</td>
            <td><input type="radio" name="age" value="17">17
                <input type="radio" name="age" value="18">18
                <input type="radio" name="age" value="19">19
                <input type="radio" name="age" value="20">20

            </td>
        </tr>
        <tr>
            <td align="right">家庭住址</td>
            <td><select name="address">
                    <option>请选择你的居住区域</option>
                    <option value="河北省石家庄市桥东区">河北省石家庄市桥东区</option>
                    <option value="河北省石家庄市桥西区">河北省石家庄市桥西区</option>
                    <option value="河北省石家庄市长安区">河北省石家庄市长安区</option>
                    <option value="河北省石家庄市桥南区">河北省石家庄市桥南区</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">
                爱好特长：
            </td>
            <td>
                <textarea cols="40" rows="3" name="hobby"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="保存"><input type="reset" value="重置">
            </td>
        </tr>
    </table>

</form>



