<?php
require_once('conn.php');
?>
    <html>
    <head>
        <?php head()?>
        <title>学生登录</title>
    </head>
    <script language="javascript" type="text/javascript">
        function check(){
            if(form1.number.value=="")
            {
                lblnumber.innerHTML = "学号不能为空！";
                form1.number.focus();
                return false;
            }
            else
            {
                lblnumber.innerHTML = "";
            }

            if(form1.name.value=="")
            {
                lblname.innerHTML = "姓名不能为空！";
                form1.name.focus();
                return false;
            }
            else
            {
                lblname.innerHTML = "";
            }



            return true;
        }
        window.onload=function()
        {
            form1.number.focus();
        }
    </script>
    <body>
    <?php
    $action = isset($_GET["act"]) ? $_GET["act"] : "";

    if($action=="login"){
        $stu_name=$_GET["name"];
        $sql = "select * from students where number='".trim($_GET["number"])."' and name='".$_GET["name"]."'";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)<=0){
            mysqli_close($conn);
            failmsgbox('姓名或学号错误!');

        }else{
            $row=mysqli_fetch_array($query);
            $_SESSION["stu"]=$row["number"];
            $_SESSION["stu_name"]=$stu_name;
            mysqli_free_result($query);
            mysqli_close($conn);
            redirect("svote.php");
        }
    }
    else if($action=="logout"){
        logout();
    }

    ?>

    <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id="table1" style="border-collapse: collapse">
        <tr>
            <td valign="top">
                <table width="40%" border="1" align="center" cellpadding="5" cellspacing="1" bgcolor="#BFDFFF" id="table2" style="border-collapse: collapse; margin-top:50px;">
                    <form action='index2.php' method="get" name="form1" onSubmit="return check()">
                        <input type="hidden" name="act" value="login">
                        <tr id="TableTitle2">
                            <th colspan="2">请登陆选择相应科目老师参加评教！</th>
                        </tr>
                        <tr>
                            <td width="40%" align="right" bgcolor="#ECF5FF"><b>学&nbsp; 号：</b></td>
                            <td bgcolor="#ECF5FF"><input type="text" name="number"><label id="lblnumber"></label></td>
                        </tr>
                        <tr>
                            <td width="40%" align="right" bgcolor="#ECF5FF"><b>姓&nbsp; 名：</b></td>
                            <td bgcolor="#ECF5FF"><input type="text" name="name"><label id="name"></label></td>
                        </tr>

                        <tr>
                            <td height="30" colspan="2" align="center" bgcolor="#ECF5FF"><input class="btn" type="submit" name="submit" value="登 陆"> <input class="btn" type="reset" name="reset" value="取 消"></td>
                        </tr>
                    </form>

                </table>
            </td>
        </tr>

    </table>
    </body>
    <?php show_source("index.php");?>
    </html>
<?php mysqli_close($conn);?>
