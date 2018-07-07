<?php
$host= "127.0.0.1";
$userName="root";
$password="root";
$database="php_database";
if(isset($_GET['name'])) {
   $name = $_GET['name'];
   $sex = $_GET['sex'];
   $hobby = $_GET['hobby'];
   $address = $_GET['address'];
   $addition = $_GET['addition'];
    $sql1 = "insert into personal values(' ','" . $name . "','" . $sex . "','" . $hobby . "','" . $address . "','" . $addition . "')";
    if (($connID = mysqli_connect($host, $userName, $password, $database))) {
       $result = mysqli_query($connID, $sql1);
        header("Location:ex01b.php");
    } else {
        echo "数据连接失败！";
    }
}
?>
<form action="ex01a.php" method="get">
    <table border="2" align="center">
        <tr>
            <td colspan="2" bgcolor="#778899" align="center">
              添加个人资料
            </td>
        </tr>


        <tr>
            <td width="30%" align="right" >真实姓名</td>
            <td width="70%"><input type="text" name="name"></td>
        </tr>
        <tr>
            <td align="right">性别</td>
            <td><input type="radio" name="sex" value="男">男<input type="radio" name="sex" value="女">女</td>
        </tr>
        <tr>
            <td align="right">兴趣爱好</td>
            <td><input type="text" name="hobby"></td>
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
                备注
            </td>
            <td>
                <textarea cols="40" rows="3" name="addition"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
               <input type="submit" value="提交"><input type="reset" value="重置">
            </td>
        </tr>
       </table>

</form>