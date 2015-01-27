<?php
class Messages{
	function Count_Received_Messages($receiver_id, $type){
		$get = mysql_query("SELECT * FROM hos_message WHERE receiver='$receiver_id' AND type='$type' AND status='0'")or die(mysql_error());
		$res = mysql_num_rows($get);
		
		if($res > 0){
			echo $res;
		}
	}
	
	function Count_Sent_Messages($sender_id, $type){
		$get = mysql_query("SELECT * FROM hos_message WHERE sender='$sender_id' AND type='$type'")or die(mysql_error());
		$res = mysql_num_rows($get);
		
		if($res > 0){
			echo $res;
		}
	}
	
	function Get_Inbox_Messages($receiver_id, $type){
			$sql = mysql_query("SELECT * FROM hos_message WHERE receiver='$receiver_id' AND type='$type'");
		$res = mysql_fetch_array($sql);
		echo "<table class='table table-hover'>";
		if($res > 0){
			?>
				<div class="list-group">
					<?php
						do{
							if($res['status'] == 0){
								?>
								<tr><td><a href="read_message.php?shwmsg=<?php echo $res['id']; ?>"><strong><?php echo $res['title']; ?></strong><span style="float:right;"><small>Sent on : <?php echo $res['date']; ?></small></span></a></td></tr>
								<?php
							}else{
					?>
						<tr><td><a href="read_message.php?shwmsg=<?php echo $res['id']; ?>"><?php echo $res['title']; ?><span style="float:right;"><small>Sent on : <?php echo $res['date']; ?></small></span></a></td></tr>
					<?php
							}
						}while($res = mysql_fetch_array($sql));
					?>
				</div>
			<?php
		}else{
			
		}
		echo "</table>";
	}
	
	function Mark_As_Read($msg_id){
		$sql = mysql_query("SELECT * FROM hos_message WHERE id='$msg_id'");
		$res = mysql_fetch_array($sql);
		
		if($res['status'] == 0){
			$update = mysql_query("UPDATE hos_message SET status='1' WHERE id='$msg_id'");
		}
	}
	
	function Get_Sent_Messages($sender_id, $type){
		$sql = mysql_query("SELECT * FROM hos_message WHERE sender='$sender_id' AND type='$type'");
		$res = mysql_fetch_array($sql);
		echo "<table class='table table-hover'>";
		if($res > 0){
			?>
				<div class="list-group">
					<?php
						do{	
						?>
						<tr><td><a href="read_message.php?shwmsg=<?php echo $res['id']; ?>"><?php echo $res['title']; ?><span style="float:right;"><small>Sent on : <?php echo $res['date']; ?></small></span></a></td></tr>
					<?php
						}while($res = mysql_fetch_array($sql));
					?>
				</div>
			<?php
		}else{
			
		}
		echo "</table>";
	}
}
?>