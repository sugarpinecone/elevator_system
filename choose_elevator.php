<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>log_in</TITLE>

<style>


input{border:0;
  background-color:#C7976B;
  color:#fff;
  border-radius:10px;
  width:320px;height:60px;
  text-align: center; 
  
  display:flex;
  align-items:center;
  justify-content:center;

  
  
  cursor:pointer;}

input:hover{
  color:#fff;
  background-color:#8C7373;
  border:2px #CF9E9E solid;
}
.hh1{
	color:#fff;
	border-radius: 6px;
    background-color:#5A5AAD;
	width:1200px;height:160px;
	text-align: center; 
	
	 
	
}
</style>

</HEAD>


<BODY>

	<?php
		$con = mysqli_connect("localhost","root","4869aptx96","log_in");
		
		$log_page = mysqli_query($con ,"select * from log_page ");
						
		$rt = mysqli_fetch_assoc($log_page);
		
		
		?>
		<h1 class="hh1"> welcome worker <?php echo $rt['page_num'];  ?> </h1>
		<?php
		$data = mysqli_query($con ,"select * from id_log_in order by idTime desc");      //讓資料由最新呈現到最舊
								
			for($i=1;$i<=mysqli_num_rows($data);$i++){
						
				$rs=mysqli_fetch_assoc($data);
				
				if( $rt['page_num'] == $rs['idTime'] ){
					
					
					
					if($rs['elevator1'] == 1){
							
					?>
					<center>
					<Form method="post"   action="http://192.168.43.70/TEST201207PI.php">
						
						<input type="submit"  name="btn_ele1" id="btn_ele1" value="進入elevator1" />
				
					</Form>
					</center>
					<?php
					}if($rs['elevator1'] == 0){
						
						?>
						<center>
						<Form method="post"    action="http://192.168.43.70/TEST201207PI.php">
						
						<input type="submit"  disabled="disabled" name="btn_ele1" id="btn_ele1" style="background-color:#666666" value="無權進入elevator1" />
				
						</Form>
						</center>
						<?php
						
					}		
					
					//elevator2
					
					if($rs['elevator2'] == 1){
							
					?>
					<center>
					<Form method="post"   action="http://192.168.43.70/TEST201207PI.php">
						
						<input type="submit"  name="btn_ele2" id="btn_ele2" value="進入elevator2" />
				
					</Form>
					</center>
					<?php
					}if($rs['elevator2'] == 0){
						
						?>
						<center>
						<Form method="post"    action="http://192.168.43.70/TEST201207PI.php">
						
						<input type="submit" disabled="disabled" name="btn_ele2" id="btn_ele2" style="background-color:#666666" value="無權進入elevator2" />
				
						</Form>
						</center>
						<?php
						
					}		
					
					//elevator3
					
					if($rs['elevator3'] == 1){
							
					?>
					<center>
					<Form method="post"   action="http://192.168.43.70/TEST201207PI.php">
						
						<input type="submit"  name="btn_ele3" id="btn_ele3" value="進入elevator3" />
				
					</Form>
					</center>
					<?php
					}if($rs['elevator3'] == 0){
						
						?>
						<center>
						<Form method="post"    action="http://192.168.43.70/TEST201207PI.php">
						
						<input type="submit"  disabled="disabled"  name="btn_ele3" id="btn_ele3" style="background-color:#666666" value="無權進入elevator3" />
				
						</Form>
						</center>
						<?php
						
					}		
					
					
				}
		
			}
		

		
	?>	
	
	<?php
		$con = mysqli_connect("localhost","root","4869aptx96","log_in");
		
		$log_worker2 = mysqli_query($con ,"select * from who_is_log ");
						
		$rd = mysqli_fetch_assoc($log_worker2);
		//echo "who_log  =  ";
		//echo $rd['who_log'];
	
	?>
	
	<?php
		function log_set0()
		{
			echo "Your test function on button click is working";
			$aa = 0;
			$con = mysqli_connect("localhost","root","4869aptx96","log_in");
			mysqli_query($con,"UPDATE who_is_log SET who_log = $aa");
			$log_worker = mysqli_query($con ,"select * from who_is_log ");     
			$rd = mysqli_fetch_assoc($log_worker);
			echo "who_log (log_out) =  ";
			echo $rd['who_log'];
			header('Location:http://localhost/log_in.php');
			//header('Location:http://192.168.43.70/TEST201207PI.php');
		}
	
	
	?>
	<br><br><br><br><br><br>
	<Form method="post"    >
		<center>				
		<input type="submit"  name="btn_log_out" id="btn_log_out" value="登出" />
		</center>				
	
	</Form>
	
	
	<?php
	
	
		if(array_key_exists('btn_log_out',$_POST)){
			//testfun();
			log_set0();
		}
		
	?>	
	
	
	

</BODY>

