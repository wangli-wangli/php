<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/6/6
 * Time: 15:18
 */
$name=$_POST['name'];
$sex=$_POST['sex'];
$career=$_POST['career'];
$education=$_POST['education'];
$yijian=$_POST['yijian'];
echo "十分感谢用户 ",$name," 的意见。",'<br/>',"请确认下列信息：",'<br/>';
echo '您的性别：',$sex,'<br/>';
echo '您的职业：',$career,'<br/>';
echo '您的学历：',$education,'<br/>';
echo '您的意见：',$yijian,'<br/>';

