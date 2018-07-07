<?php
$value=" ";
$num1=$_GET['firstnumber'];
$num2=$_GET['secondnumber'];
$fuhao=$_GET['fuhao'];
if($fuhao=='+'){
    $value=$num2+$num1;
}
if($fuhao=='-'){
   $value=$num1+$num2;
}
if($fuhao=='*'){
    $value=$num1*$num2;
}
if($fuhao=='/'){
    $value=$num1/$num2;
}
?>
<form action="" method="get">
    <table border="0">
        <tr>
            <td colspan="2" style="text-align: center">第一个数：
            <input type="text" name="firstnumber" value="<?php echo $num1;?>"></td>
        </tr>
        <tr>
            <td>
                <?php
                if($fuhao=='+') {
                    ?>
                    <input type="radio" name="fuhao" value="+" checked>+
                    <input type="radio" name="fuhao" vlaue="-">-
                    <input type="radio" name="fuhao" vlaue="*">*
                    <input type="radio" name="fuhao" vlaue="/">/
                    <?php
                }
                else if($fuhao=='-'){
                    ?>
                    <input type="radio" name="fuhao" value="+">+
                    <input type="radio" name="fuhao" vlaue="-" checked>-
                    <input type="radio" name="fuhao" value="*">*
                    <input type="radio" name="fuhao" value="/">/
                <?php
                }
                else if($fuhao=='*'){
                ?>
                <input type="radio" name="fuhao" value="+">+
                <input type="radio" name="fuhao" vlaue="-" >-
                <input type="radio" name="fuhao" value="*" checked>*
                <input type="radio" name="fuhao" value="/">/
                    <?php
                }
                else if($fuhao=='/') {
                    ?>
                    <input type="radio" name="fuhao" value="+">+
                    <input type="radio" name="fuhao" vlaue="-">-
                    <input type="radio" name="fuhao" value="*">*
                    <input type="radio" name="fuhao" value="/" checked>/
                    <?php
                }
                else {
                    ?>
                    <input type="radio" name="fuhao" value="+">+
                    <input type="radio" name="fuhao" value="-">-
                    <input type="radio" name="fuhao" value="*">*
                    <input type="radio" name="fuhao" value="/">/
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center" >第二个数：<input type="text"
                name="secondnumber" value="<?php echo $num2;?>">

            </td>
        </tr>
        <tr>
            <td>结果：
                <input type="text" value="<?php echo $value;?>">

            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="tijiao" value="提交"></td>
            </td>
        </tr>
    </table>
</form>
