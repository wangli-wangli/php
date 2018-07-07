<!--getFactorial2.php-->
<html>
<?php
$num =$_GET['num'];
$factorial=1;
for($i=(int)$num;$i>0;$i--){

    $factorial=$factorial*$i;
}
?>
<form action="getFactorial2.php" method="get">
    <table align="center" border="1" width="50%">
        <tr>
            <td colspan="2" align="center">求阶乘</td>
        </tr>
        <tr>
            <td width="40%">
                请输入一个数
            </td>
            <td>
                <input type="text"  name=num  value="<?php echo $num;?>" size="50"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="提交"/></td>
        </tr>
        <tr>
            <td>阶乘为</td>
            <td><?php echo  $factorial;?></td>
        </tr>
    </table>
</form>
</html>
