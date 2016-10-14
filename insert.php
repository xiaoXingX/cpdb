<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="tab/css" href="tab.css" />
<link rel="stylesheet" type="tab/css" href="czwj.css" />
<title>产品输入页面</title>
</head>

<body>
 <?php
 session_start();
 exit();
 if(empty($_SESSION['username']))
{
    header("Location:login.php");
    exit();
}
 ?>
<form enctype="multipart/form-data"  action="insert_handle.php" method="post">
 <table width="500" border="0" bordercolor="ffffff" rules="all" cellpadding="5">
      <tr class="blue">
          <td colspan="5">产品信息</td>
      </tr>
      <tr>
         <td width="100" align="right">产品分类：</td>
         <td border="none"><p><select id="product_type" name="product_type" >
                     <option value="">请选择</option>
               <option value="云主机">云主机</option>
               <option value="服务器托管">服务器托管</option>
               <option value="服务器租用">服务器租用</option>
               <option value="机柜/带宽">机柜/带宽</option>
                </select> 
                </p>
              </td>
      </tr>
     
      <tr>
         <td width="100" align="right">公司名称：</td>
         <td><input type="text" name="company" id="company"/>
              <input type="hidden" name="company1" id="company1"/><span>相同公司输入完后，点击其它地方后，下面logo框会消失。没有消失请重新输入</span>
         </td>
      </tr>
      <tr id="company_logo" style="display">
         <td width="100" align="right">公司logo：</td>
         <td><input type="file" name="company_logo" />图片名不能为汉字
              
         </td>
      </tr>
      <tr>
         <td width="100" align="right">公司机房：</td>
         <td><input type="text" name="machine_room" /></td>
      </tr>
      <tr>
         <td width="100" align="right">产品：</td>
         <td><input type="text" name="product" /></td>
      </tr>
      <tr>
         <td width="100" align="right">厂商指导价：</td>
         <td><input type="text" name="product_price" /></td>
      </tr>
      <tr>
         <td width="100" align="right">市场价：</td>
         <td><input type="text" name="product_rprice" /></td>
      </tr>
      <tr>
         <td width="120" align="right">口碑综合评分：</td>
         <td><input type="text" name="product_reputation" /></td>
      </tr>
      <tr class="blue">
          <td colspan="5">带宽资源</td>
      </tr>
     <tr>
         <td width="100" align="right">节点：</td>
         <td><input type="text" name="node" /></td>
     </tr>
     <tr>
         <td width="100" align="right">带宽：</td>
         <td><input type="text" name="band_width" /></td>
     </tr>
     <tr class="blue">
        <td colspan="5">硬件配置</td>
     </tr>
     <tr>
         <td width="100" align="right">硬盘：</td>
         <td><input type="text" name="disk" /></td>
     </tr>
     <tr>
         <td width="100" align="right">内存：</td>
         <td><input type="text" name="memory" /></td>
     </tr> 
     <tr>
         <td width="100" align="right">CPU：</td>
         <td><input type="text" name="CPU" /></td>
     </tr> 
     <tr class="blue">
        <td colspan="5">机器性能</td>
     </tr>
      <tr>
         <td width="100" align="right">读写速度：</td>
         <td><input type="text" name="rw_speed" /></td>
     </tr>
     <tr>
         <td width="100" align="right">备份：</td>
         <td><select name="backups">
                <option value="是">是</option>
                <option value="否">否</option>
                </select>
         </td>
     </tr> 
     <tr>
         <td width="100" align="right">防护：</td>
         <td><select name="protect">
                <option value="是">是</option>
                <option value="否">否</option>
                </select>
         </td>
     </tr> 
     <tr>
         <td width="100" align="right">热迁移：</td>
         <td><select name="heat_transfer">
                <option value="是">是</option>
                <option value="否">否</option>
                </select>
         </td>
     </tr> 
     <tr>
         <td width="100" align="right">在线不停机升级带宽：</td>
         <td><select name="not_stop">
                <option value="是">是</option>
                <option value="否">否</option>
                </select>
         </td>
     </tr>
     <tr class="blue">
         <td colspan="5">服务体系</td>
     </tr> 
     <tr>
         <td width="100" align="right">服务时间：</td>
         <td><input type="text" name="hours" /><span>小时</span></td>
     </tr>
     <tr>
          <td width="100" align="right">免费备案：</td>
          <td><select name="free_record">
                  <option value="是">是</option>
                  <option value="否">否</option>
              </select>
           </td>
     </tr> 
     <tr>
         <td width="100" align="right">几天无条件退款：</td>
         <td><input type="text" name="uncondition_refund" /><span>天</span></td>
     </tr> 
     <tr>
         <td>&nbsp;</td>
         <td> <input type="submit" value="提交" />
              <input type="reset" value="重置" />
         
        </td>
      </tr>
 </table>
</form>
</body>
<script src="./jquery-1.8.3.min.js" type="text/javascript"></script>
<script  type="text/javascript">
$('#company').change(function(){
   var txt=$("#company").val();
               
            $.post("insert_ajax.php",{company:txt},function(result){
               result = eval('(' + result +')');
              if(result.re){
                 $('#company_logo').css('display','none');
                $('#company1').val(result.company_logo);
              } 
            })
  }); 
</script>
</html>
