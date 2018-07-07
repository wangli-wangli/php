<script  language='javaScript'>
    function bt_click(){
           var number=document.getElementById('num').value;
           var sum=0;
           for(var i=1;i<=number;i++)
          {
            sum=sum+i;
          }
        alert("1+2+....+"+number+"="+sum);
    }
</script>
<form action="getSum.php" method="get">
<span style="color:blue;font-size:30px">计算累加和 </span>
<p>1+2+....+<input type="text" name="num" id="num"><input type="button"  id="submit" value="计算" onClick="bt_click();"></p>
</form>
