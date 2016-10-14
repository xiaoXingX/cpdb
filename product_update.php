<?php
require_once('./config.php');
session_start();
   if(empty($_SESSION['username']))
  {
      header("Location:login.php");
      exit();
  } 
 /* header("Content-type:text/html;charset=utf-8");
   $db_link=mysql_connect("127.0.0.1","root","");
                mysql_select_db('dh');
                mysql_query("set names 'utf8'");*/
    $id = $_GET['id'];
    $sql = "select * from product where id=?";
     $stmt=$pdo->prepare($sql);
    $stmt->execute(array($id));
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
     
 ?>
  <form enctype="multipart/form-data"  action="product_update_handle.php" method="post">
   <table width="500" border="0" bordercolor="ffffff" rules="all" cellpadding="5">
      <tr class="blue">
          <td colspan="5">产品信息</td>
      </tr>
      <tr>
         <td width="100" align="right">产品分类：</td>
         <td border="none"><input type="text" value="<?php echo $result['product_type']; ?>" /><p><select id="product_type" name="product_type" >

                     <option value="">请选择</option>
               <option value="云主机">云主机</option>
               <option value="服务器托管">服务器托管</option>
               <option value="服务器租用">服务器租用</option>
               <option value="机柜/带宽">机柜/带宽</option>
                </select> 
                一定选择与上面产品分类一样</p>
              </td>
      </tr>
     
      <tr>
         <td width="100" align="right">公司名称：</td>
         <td><input type="text" name="company" id="company" value="<?php echo $result['company'];?>" />
               
         </td>
      </tr>
      <tr id="company_logo" >
         <td width="100" align="right">公司logo：</td>
         <td><input type="text"  name="company_logo1" value="<?php echo $result['company_logo']; ?>" />logo存储路径为images/filename<input type="file" name="company_logo" />图片名不能为汉字
              
         </td>
      </tr>
      <tr>
         <td width="100" align="right">公司机房：</td>
         <td><input type="text" name="machine_room" value="<?php echo $result['machine_room']; ?>"/></td>
      </tr>
      <tr>
         <td width="100" align="right">产品：</td>
         <td><input type="text" name="product" value="<?php echo $result['product']; ?>"/></td>
      </tr>
      <tr>
         <td width="100" align="right">厂商指导价：</td>
         <td><input type="text" name="product_price" value="<?php echo $result['product_price']; ?>"/></td>
      </tr>
      <tr>
         <td width="100" align="right">市场价：</td>
         <td><input type="text" name="product_rprice" value="<?php echo $result['product_rprice']; ?>"/></td>
      </tr>
      <tr>
         <td width="120" align="right">口碑综合评分：</td>
         <td><input type="text" name="product_reputation" value="<?php echo $result['product_reputation']; ?>" /></td>
      </tr>
      <tr class="blue">
          <td colspan="5">带宽资源</td>
      </tr>
     <tr>
         <td width="100" align="right">节点：</td>
         <td><input type="text" name="node" value="<?php echo $result['node']; ?>" /></td>
     </tr>
     <tr>
         <td width="100" align="right">带宽：</td>
         <td><input type="text" name="band_width" value="<?php echo $result['band_width']; ?>"/></td>
     </tr>
     <tr class="blue">
        <td colspan="5">硬件配置</td>
     </tr>
     <tr>
         <td width="100" align="right">硬盘：</td>
         <td><input type="text" name="disk" value="<?php echo $result['disk']; ?>"/></td>
     </tr>
     <tr>
         <td width="100" align="right">内存：</td>
         <td><input type="text" name="memory" value="<?php echo $result['memory']; ?>" /></td>
     </tr> 
     <tr>
         <td width="100" align="right">CPU：</td>
         <td><input type="text" name="CPU" value="<?php echo $result['CPU']; ?>"/></td>
     </tr> 
     <tr class="blue">
        <td colspan="5">机器性能</td>
     </tr>
      <tr>
         <td width="100" align="right">读写速度：</td>
         <td><input type="text" name="rw_speed" value="<?php echo $result['rw_speed']; ?>"/></td>
     </tr>
     <tr>
         <td width="100" align="right">备份：</td>
         <td><input type="text" value="<?php echo $result['backups']; ?>" /><select name="backups">
                <option value="是">是</option>
                <option value="否">否</option>
                </select>
         </td>
     </tr> 
     <tr>
         <td width="100" align="right">防护：</td>
         <td><input type="text" value="<?php echo $result['protect']; ?>" /><select name="protect">
                <option value="是">是</option>
                <option value="否">否</option>
                </select>
         </td>
     </tr> 
     <tr>
         <td width="100" align="right">热迁移：</td>
         <td><input type="text" value="<?php echo $result['heat_transfer']; ?>" /><select name="heat_transfer">
                <option value="是">是</option>
                <option value="否">否</option>
                </select>
         </td>
     </tr> 
     <tr>
         <td width="100" align="right">在线不停机升级带宽：</td>
         <td><input type="text" value="<?php echo $result['not_stop']; ?>" /><select name="not_stop">
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
         <td><input type="text" name="hours" value="<?php echo $result['hours']; ?>" /><span>小时</span></td>
     </tr>
     <tr>
          <td width="100" align="right">免费备案：</td>
          <td><input type="text" value="<?php echo $result['free_record']; ?>" /><select name="free_record">
                  <option value="是">是</option>
                  <option value="否">否</option>
              </select>
           </td>
     </tr> 
     <tr>
         <td width="100" align="right">几天无条件退款：</td>
         <td><input type="text" name="uncondition_refund" value="<?php echo $result['uncondition_refund']; ?>"/><span>天</span></td>
     </tr> 
     <tr>
         <td>&nbsp;</td>
         <td> <input type="hidden" name="id" value="<?php echo $id; ?>"/><input type="submit" value="提交" />
              <input type="reset" value="重置" />
         
        </td>
      </tr>
 </table>
</form>