<?php
$num1=$_GET['num1'];
$num2=$_GET['num2'];
$yunsuan=$_GET['yunsuan'];
$num3=0;
if($yunsuan=="+"){
    $num3=$num1+$num2;
}
elseif ($yunsuan=="-"){
    $num3=$num1-$num2;
}
elseif ($yunsuan=="*"){
    $num3=$num1*$num2;
}
elseif ($yunsuan=="/"){
    $num3=$num1/$num;
}
?>
<input type="text" name="num1">
<select name="yunsuan">
    <option value="+">+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
</select>
<input type="text" name="num2">
<input type="submit" value="=">
<input type="text" value="<?php echo $num3;?>" >
<form action="" method="get"></form>


