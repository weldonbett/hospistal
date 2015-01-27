<?php
session_start();
include('../model/database.php');
?>   
   <table class="table table-hover">
	<?php
		$sql = mysql_query("SELECT * FROM hos_news ORDER BY id DESC") or die(mysql_error());
		 while($res = mysql_fetch_array($sql)){
			 echo "<tr><td><div class='col-md-8'>
    					<h4><strong>".strtoupper($res['title'])."</strong></h4>
						<p>
							$res[news]
						</p>
    				</div>
    				<div class='col-md-4'>
    					<small>Posted on :$res[date]</small>
    				</div>";
			echo "<div class='col-md-12'>
						<button style='float:right;' class='btn btn-danger btn-xs'>Delete</button>
						<button style='float:right;' class='btn btn-info btn-xs'>Edit</button>
					</div></td></tr>"; 
		 }
	?>    
    </table>