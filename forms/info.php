<?php
	include_once("../config.php");
	$id = $_REQUEST['id']        ;
	
	$sql = "SELECT * FROM `visitor` 
	
				LEFT OUTER JOIN destination on visitor.dest_id = destination.dest_id 
	
				LEFT OUTER JOIN purpose on visitor.pur_id = purpose.pur_id 
				
				WHERE `id` = '".$id."'
		";
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
	
	$dateTimeIn = new DateTime($data['in']);
	if($data['out'] != ""){
		$dateTimeOut = new DateTime($data['out']);
	}
	
?>
<div>
    <table width="100%" border="0">
      <tr>
        <td width="305" rowspan="10" valign="top">
        	<img src="pictures/<?php echo $data['picture']; ?>_large.jpeg" />
        </td>
        <td width="100"><label class="label">ID</label></td>
        <td ><?php echo $data['id']; ?></td>
      </tr>
      <tr>
        <td><label class="label">Visitor Pass #</label></td>
        <td><?php echo $data['gatepassnum']; ?></td>
      </tr>
      <tr>
        <td><label class="label">Name</label></td>
        <td><?php echo $data['name']; ?></td>
      </tr>
      <tr>
        <td><label class="label">Time In</label></td>
        <td><?php echo $dateTimeIn->format("m/j/Y - h:i A"); ?></td>
      </tr>
      <tr>
        <td><label class="label">Time Out</label></td>
        <td><?php echo  ($data['out'] != "" ? $dateTimeOut->format("m/j/Y - h:i A") : ""); ?></td>
      </tr>
      <tr>
        <td><label class="label">Purpose</label></td>
        <td><?php echo ($data['purpose']=="" ? $data['others']:$data['purpose'] ); ?></td>
      </tr>
      <tr>
        <td><label class="label">Destination</label></td>
        <td><?php echo $data['destination']; ?></td>
      </tr>
      <tr>
        <td><label class="label">Plate Number</label></td>
        <td><?php echo $data['platenumber']; ?></td>
      </tr>
      <tr>
        <td valign="top"><label class="label">Remarks</label></td>
        <td rowspan="2" valign="top"><?php echo ( $data['remarks'] !="" && $data['remarks'] != "undefined" ? $data['remarks'] : ""); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
</div>