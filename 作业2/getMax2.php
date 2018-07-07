<!--getMax2.php-->
<html>
<?php
$num = explode(',', $_GET['num']);

/*var_dump($num[0],$num[1],$num[2]);*/    //array('a','b','c');
$max=$num[0];
for($i=0;$i<count($num);$i++){
    if($max<(int)$num[$i]){
        $max=(int)$num[$i];
    }
}
var_dump($num);

?>
<form action="getMax2.php" method="get">
    <table align="center" border="1" width="50%">
        <tr>
            <td colspan="2" align="center">求最大值</td>
        </tr>
        <tr>
            <td width="40%">
                请输入一个数组（用逗号空开）
            </td>
            <td>
                <input type="text"  name=num   size="50"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="提交"/></td>
        </tr>
        <tr>
            <td>最大值为</td>
            <td><?php echo $max;?></td>
        </tr>
    </table>
</form>
</html>
