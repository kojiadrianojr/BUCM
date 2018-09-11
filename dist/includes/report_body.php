<!DOCTYPE html>
<html>
<head>
	<style>
table {
    width: 95%;
    float: center;
}

th, td {
    text-align: center;
    padding: 8px;
    width:15px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;

}
</style>
</head>


<body style="background-position: center; margin:0px; padding: 30px; ">
<table>
							<thead>
							  <tr>
								<th>Time</th>
								<th>Monday</th>
								<th>Tuesday</th>
								<th>Wednesday</th>
								<th>Thursday</th>
								<th>Friday</th>
								
							  </tr>
							</thead>
							
		<?php
				
				$query=mysqli_query($con,"select * from time where days='mtwthf' order by time_start")or die(mysqli_error());
					
				while($row=mysqli_fetch_array($query)){
						$id=$row['time_id'];
						$start=date("h:i a",strtotime($row['time_start']));
						$end=date("h:i a",strtotime($row['time_end']));
		?>
							  <tr >
								<td class="first" style="width: 13%;"><?php echo $start."-".$end;?></td>
								<td><?php 
								if ($member<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='m' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='m' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='m' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>" ")
											$displayrm= "<li>$row1[remarks]</li>";
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit' class='dropdown-toggle btn btn-success'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											echo $row1['subject_code'];
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room $row1[room]</li>";
											echo $displayrm;
											echo "</ul>";
										}	
									?>
								</td>
								<td>
								<?php 
								if ($member<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join member where day='t' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join member where day='t' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join member where day='t' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row1=mysqli_fetch_array($query2);
										$count=mysqli_num_rows($query2);
										$id1=$row1['sched_id'];
										
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>"")
											$displayrm= "<li>$row1[remarks]</li>";
											
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											echo $row1['subject_code'];
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room ".$row1['room']."</li>";
											echo $displayrm;
											echo "</ul>";
										}	
									?>
								</td>
								<td ><?php 
									if ($member<>"")
								{
									$query3=mysqli_query($con,"select * from schedule natural join member where day='w' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query3=mysqli_query($con,"select * from schedule natural join member where day='w' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query3=mysqli_query($con,"select * from schedule natural join member where day='w' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								
										$row1=mysqli_fetch_array($query3);
										$count=mysqli_num_rows($query3);
										$id1=$row1['sched_id'];
										//$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>"")
											$displayrm= "<li>$row1[remarks]</li>";
											
										
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											echo $row1['subject_code'];
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room ".$row1['room']."</li>";
											echo $displayrm;
											echo "</ul>";
										}	
									?>
								</td>
							 <td><?php 
								if ($member<>"")
								{
									$query4=mysqli_query($con,"select * from schedule natural join member where day='th' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query4=mysqli_query($con,"select * from schedule natural join member where day='th' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query4=mysqli_query($con,"select * from schedule natural join member where day='th' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row2=mysqli_fetch_array($query4);
										$count=mysqli_num_rows($query4);
										$id1=$row2['sched_id'];
										//$count=mysqli_num_rows($query1);
										$encode=$row2['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row2['remarks']<>"")
											$displayrm1= "<li>$row2[remarks]</li>";
											
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											echo $row2['subject_code'];
											echo "</li>";
											echo "<li class='$displayc'>$row2[cys]</li>";
											echo "<li class='$displaym'>$row2[member_last], $row2[member_first]</li>";											
											echo "<li class='$displayr'>Room ".$row2['room']."</li>";
											echo $displayrm1;
											echo "</ul>";
										}	
									?>
								</td>
								<td><?php 
								if ($member<>"")
								{
									$query5=mysqli_query($con,"select * from schedule natural join member where day='f' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query5=mysqli_query($con,"select * from schedule natural join member where day='f' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query5=mysqli_query($con,"select * from schedule natural join member where day='f' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row1=mysqli_fetch_array($query5);
										$count=mysqli_num_rows($query5);
										$id1=$row1['sched_id'];
										//$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>"")
											$displayrm= "<li>$row1[remarks]</li>";
											
										else
											$displayrm="";
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											echo $row1['subject_code'];
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room $row1[room]</li>";
											echo $displayrm;
											echo "</ul>";
										}	
									?>
								</td>
								
							  </tr>
							
		<?php }?>					  
		</table>    
		</body>

</html>