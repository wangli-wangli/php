
<form action="Post2.php" method="post">

   <table   align="center">
        <tr>
            <td></td>
            <td colspan="2">
              <span style="color: red;font-size:50px; text-align: center">意见反馈</span>
             </td>
            <td></td>
        </tr>
       <tr>
           <td>您的姓名</td>
           <td><input type="text" name="name"></td>
           <td>您的性别</td>
           <td><input type="radio" name="sex" value="男">男
               <input type="radio" name="sex" value="女">女</td>
       </tr>
       <tr>
           <td>您的职业</td>
           <td><select name="career">
                   <option value="学生">学生</option>
                   <option value="学生">白领</option>
                   <option value="学生">工人</option>
                   <option value="学生">农民</option>
               </select></td>
           <td>您的最高学历</td>
           <td><select name="education">
                   <option value="初中">初中</option>
                   <option value="高中">高中</option>
                   <option value="本科">本科</option>
                   <option value="研究生">研究生</option>
               </select></td>
       </tr>
       <tr>
           <td>您对本站的意见</td>
           <td></td>
           <td></td>
           <td></td>
       </tr>
       <tr>
           <td></td>
           <td colspan="3">
              <textarea name="yijian" cols="57" rows="5" >

              </textarea>
           </td>
       </tr>
       <tr>
           <td></td>
           <td><input type="reset" value="重写"></td>
           <td></td>
           <td>
               <input type="submit" value="提交">
           </td>
       </tr>
   </table>

</form>
