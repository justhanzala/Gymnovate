<?php
include "db_conn.php";

function getMembersData($columns, $active = 1, $member_id = 0, $search_param = ""){
	global $conn;
	$query = "SELECT ".$columns." FROM members WHERE active='".$active."' ";
	
	if(!empty($member_id)){
		$query = $query." AND member_id = '".$member_id."'";
	}

	if(!empty($search_param)){
		$query = $query." AND (member_id LIKE '%".$search_param."%' OR full_name LIKE '%".$search_param."%' OR mobile_number LIKE '%".$search_param."%') ";
	}

	$result = $conn->query($query);
	$data = array();

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$temp_arr = array();
			if(isset($row['member_id'])) $temp_arr['member_id'] = $row['member_id'];
			if(isset($row['full_name'])) $temp_arr['full_name'] = $row['full_name'];
			if(isset($row['mobile_number'])) $temp_arr['mobile_number'] = $row['mobile_number'];
			if(isset($row['doj'])) $temp_arr['doj'] = $row['doj'];
			$data[] = $temp_arr;
		}
	}
	return $data;
}

function getTotalFees(){
	global $conn;
	$query = "SELECT SUM(fees) FROM members_fee";

	$sum = $conn->query($query);
	$sum = $sum->fetch_assoc();

	return $sum['SUM(fees)'];
}

function getMembersfeerecord($member_id = 0){
	global $conn;

	$query = "SELECT members.full_name, members_fee.* FROM members_fee, members WHERE members.member_id=members_fee.member_id";
	$feedata = array();

	if(!empty($member_id)){
		$query = $query." AND members_fee.member_id=".$member_id."";
	}

	$feeresult = $conn->query($query);

	if($feeresult->num_rows > 0){
		while($feerow = $feeresult->fetch_assoc()){
			$feedata[] = array(
				"transaction_id" => $feerow['transaction_id'], 
				"member_id" => $feerow['member_id'],
				"date" => $feerow['date'],
				"fees" => $feerow['fees'],
				"month" => $feerow['month'],
				"year" => $feerow['year'],
				"full_name" => $feerow['full_name']
			);
		}
	}

	return $feedata;
}

function insertdata($table, $columns, $values){
	global $conn;

	$values = explode(", ", $values);

	$i = 0;
	$countvalues = count($values);

	while ($i < $countvalues) {
		$values[$i] = "'".$values[$i] ."'";	
		$i++;
	}

	$values = implode(",", $values);
	$query = "INSERT INTO ".$table." (".$columns.") VALUES (".$values.")";

	$insert = $conn->query($query);

	return $insert;
}

function updatemember($table, $columns, $member_id){
	global $conn;

	$query = 'UPDATE '.$table.' SET ';
	$count = count($columns) - 1;
	$i = 0;

	foreach ($columns as $index => $v) {
		$query = $query.$index."='".$v."'";

		if ($count > $i) {
			$query = $query.",";
		}
		$i++;
	}
	$query = $query.' WHERE member_id="'.$member_id.'"';

	$query = $conn->query($query);

	return $query;
}

function deletemember($table, $member_id){
	global $conn;

	$query = "DELETE FROM ".$table." WHERE member_id='".$member_id."'";
	// echo $query;
	$query = $conn->query($query);

	return $query;
}

function GetUsersData($username, $Password){
	global $conn;

	$query = "SELECT * FROM users WHERE username='".$username."' AND password='".$Password."'";
	// echo $query;
	$ret = false;
	$select = $conn->query($query);

	if($select->num_rows === 1){
		$ret = true;
	}
	
	return $ret;
}

?>