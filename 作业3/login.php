<script  language='javaScript'>
    function bt_click(){
        if (document.getElementById("name").value.length == 0) {
            alert("用户不能为空");
            document.getElementById("name").focus();
            return false;
        }
        else if((document.getElementById("password").value)!=(document.getElementById("password1").value)){
            alert("两次密码不一样");
            document.getElementById("password1").focus();
            document.getElementById("password").focus();
            return false;
        }
        else{
            return true;
        }
    }
</script>
<form action="getSum.php" method="get" onsubmit="return bt_click()">
    <table align="center">
        <tr>
            <td></td>
            <th>用户注册</th>
        </tr>
        <tr>
            <td>
                用户名：
            </td>
            <td>
                <input type="text" name="name" id="name">
            </td>
        </tr>
        <tr>
            <td>
                密码：
            </td>
            <td>
                <input type="password" name="password" id="password">
            </td>
        </tr>
        <tr>
            <td>
                确认密码：
            </td>
            <td>
                <input type="password" name="password1" id="password1">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="提交" name="Submit">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>