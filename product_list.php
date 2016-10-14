 <?php
 require_once('./config.php');
 //header("Content-type:text/html;charset=utf-8");
error_reporting ( E_ERROR  |  E_WARNING  |  E_PARSE );
 
	$nPage 		= isset($_GET['page'])?$_GET['page']:'';
	$action 	= isset($_GET['action'])?$_GET['action']:'';
 	$sKeyword 	= isset($_GET['keyword'])?$_GET['keyword']:'';

 	$sKeyword 	= addslashes($sKeyword); 
 	exit();
 session_start();
 if(empty($_SESSION['username']))
{
    header("Location:login.php");
    exit();
}
 
 
?>
  
 <h1><a href="./insert.php">产品录入</a></h1>
 产品关键字查询：<input id="txtKeyword" name="txtKeyword" type="text" size="20" maxlength="64"  value="<?php echo $sKeyword; ?>"/>
					<input name="btn_search"  type="submit" style="width:80px;height:28px" id="btn_search" value="查询" style="cursor:pointer;" onClick="fikcdn_search();" /> 
		  <table width="100%" border="0" class="dataintable" id="domain_table" style="border-collapse:collapse;">
			<tr id="tr_domain_title" style="border: solid 1px #a0c6e5; height: 20px;">
				<th align="center"  style="border: solid 1px #a0c6e5;" >公司</th> 
				<th align="center"  style="border: solid 1px #a0c6e5;"  >图片路径</th>				
				<th align="center"  style="border: solid 1px #a0c6e5;"  >机房</th>						
				<th align="center" style="border: solid 1px #a0c6e5;" >产品</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >产品类型</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >产品市场价</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >产品口碑</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >产品指导价</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >节点个数</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >带宽</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >硬盘</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >内存</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >CPU</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >读写速度</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >是否备份</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >是否防护</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >热迁移</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >在线不停机升级带宽</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >服务时间</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >免费备案</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >几天无条件退款</th>
				<th align="center" style="border: solid 1px #a0c6e5;" >操作</th>									
				 
			</tr>			
<?php
	  
	if(!is_numeric($nPage))
	{
		$nPage=1;
	}
	
	if($nPage<=0)
	{
		$nPage = 1;
	}		
	
	if($action!="frist" && $action !="pagedown" && $action !="pageup" && $action !="tail" && $action !="jump")
	{
		$action="frist";
	}

	if(strlen($sKeyword)<=0)
	{
		$sql = "SELECT count(*) row FROM `product`";					
	}
	else{
		$sql = "SELECT count(*) row FROM `product` WHERE product like '%$sKeyword%' ";
	}
		 
				
	 $sth  =  $pdo -> prepare ($sql);
	 $sth -> execute (); 
	 $result  =  $sth -> fetch ( PDO :: FETCH_ASSOC );
 	 if($result['row']>0)
	{
		 
		$total_host  = $result['row'];	
	}
	 $PubDefine_PageShowNum=15;
	$total_pages = floor($total_host/$PubDefine_PageShowNum);
	if(($total_host%$PubDefine_PageShowNum)>0)
	{
		$total_pages+=1;
	}
	
	if($nPage>$total_pages)
	{
		$nPage = $total_pages;
	}
	
	$pagedown = $nPage+1;
	if($pagedown>$total_pages)
	{	
		$pagedown = $total_pages;			
	}
	
	$pageup = $nPage-1;
	if($pageup<=0)
	{
		$pageup = 1;
	}			
	$offset = (($nPage-1)*$PubDefine_PageShowNum);
	if($offset<0) $offset=0;
	if(strlen($sKeyword)<=0)
	{
		$sql = "SELECT * FROM product Limit $offset,$PubDefine_PageShowNum;";
	}
	else
	{
		$sql = "SELECT * FROM product WHERE product like '%$sKeyword%' Limit $offset,$PubDefine_PageShowNum;";
	}
	 
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	for($i=0;$i<count($result);$i++)
	{
		echo '<tr style="border: solid 1px #a0c6e5; height: 20px;">';
		 
		echo '<td align="left"  style="border: solid 1px #a0c6e5;" >'.$result[$i]['company'].'</td>';
		echo '<td align="center"  style="border: solid 1px #a0c6e5;" >'.$result[$i]['company_logo'].'</td>';
		echo '<td align="right" style="border: solid 1px #a0c6e5;" >'.$result[$i]['machine_room'].'</td>';
		echo '<td align="right" style="border: solid 1px #a0c6e5;" >'.$result[$i]['product'].'</td>';
		echo '<td align="left"  style="border: solid 1px #a0c6e5;" >'.$result[$i]['product_type'].'</td>';
		echo '<td align="center"  style="border: solid 1px #a0c6e5;" >'.$result[$i]['product_rprice'].'</td>';
		echo '<td align="right" style="border: solid 1px #a0c6e5;" >'.$result[$i]['product_reputation'].'</td>';
		echo '<td align="right" style="border: solid 1px #a0c6e5;" >'.$result[$i]['product_price'].'</td>';
		echo '<td align="left"  style="border: solid 1px #a0c6e5;" >'.$result[$i]['node'].'</td>';
		echo '<td align="center"  style="border: solid 1px #a0c6e5;" >'.$result[$i]['band_width'].'</td>';
		echo '<td align="right" style="border: solid 1px #a0c6e5;" >'.$result[$i]['disk'].'</td>';
		echo '<td align="right" style="border: solid 1px #a0c6e5;" >'.$result[$i]['memory'].'</td>';
		echo '<td align="left"  style="border: solid 1px #a0c6e5;" >'.$result[$i]['CPU'].'</td>';
		echo '<td align="center"  style="border: solid 1px #a0c6e5;" >'.$result[$i]['rw_speed'].'</td>';
		echo '<td align="right" style="border: solid 1px #a0c6e5;" >'.$result[$i]['backups'].'</td>';
		echo '<td align="right" style="border: solid 1px #a0c6e5;" >'.$result[$i]['protect'].'</td>';
		echo '<td align="left"  style="border: solid 1px #a0c6e5;" >'.$result[$i]['heat_transfer'].'</td>';
		echo '<td align="center"  style="border: solid 1px #a0c6e5;" >'.$result[$i]['not_stop'].'</td>';
		echo '<td align="right" style="border: solid 1px #a0c6e5;" >'.$result[$i]['hours'].'</td>';
		echo '<td align="right" style="border: solid 1px #a0c6e5;" >'.$result[$i]['free_record'].'</td>';
		echo '<td align="left"  style="border: solid 1px #a0c6e5;" >'.$result[$i]['uncondition_refund'].'</td>';
		echo '<td style="border: solid 1px #a0c6e5;" ><a href="product_update.php?id='.$result[$i]['id'].'" title="修改产品">修改</a>&nbsp;<a href="product_delete.php?id='.$result[$i]['id'].'" title="删除产品">删除</a></td>';
		echo '</tr>';
	}
 
?>
		 </table> 
		 <table width="800" border="0" class="disc">
			<tr>
			<td bgcolor="#FFFFE6"><div class="div_page_bar"> 记录总数：<?php echo $total_host;?>条&nbsp;&nbsp;&nbsp;当前第<?php echo $nPage; ?>页|共<?php echo $total_pages; ?>页&nbsp;&nbsp;&nbsp;跳转
				<select id="pagesSelect" name="pagesSelect" style="width:50px" onChange="selectPage(this)">
				<?php
					for($i=1;$i<=$total_pages;$i++){
						if($nPage==$i)
						{
							echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
						}
						else
						{
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
				?>							
				</select> 
				页&nbsp;&nbsp;&nbsp;&nbsp;<a href="product_list.php?page=1&action=first&keyword=<?php echo $sKeyword; ?>">首页</a>&nbsp;&nbsp;
				<a href="product_list.php?page=<?php echo $pageup; ?>&action=pageup&keyword=<?php echo $sKeyword; ?>">上一页</a>&nbsp;&nbsp;				
				<a href="product_list.php?page=<?php echo $pagedown; ?>&action=pagedown&keyword=<?php echo $sKeyword; ?>">下一页</a>&nbsp;&nbsp;
				<a href="product_list.php?page=<?php echo $total_pages; ?>&action=tail&keyword=<?php echo $sKeyword; ?>">尾页 </a></div></td>
			</tr>
		</table>	
	
	  </td> 
	   
  </tr>
  
    
</table>
</div>
 
 
<script type="text/javascript">	
function selectPage(obj){
	 
	var pagesSelect  =document.getElementById("pagesSelect").value;
 	var txtKeyword   =document.getElementById("txtKeyword").value;
	
	window.location.href="product_list.php?page="+pagesSelect+"&action=jump&keyword="+txtKeyword;
}
function fikcdn_search(){
	var txtKeyword   =document.getElementById("txtKeyword").value;
	  //alert(txtKeyword.length);
	if(txtKeyword.length==0 ){
		 window.location.href="product_list.php?page=1&action=jump&keyword="+txtKeyword;
	}else{
		window.location.href="product_list.php?page=1&action=jump&keyword="+txtKeyword;
	}	
}
</script>