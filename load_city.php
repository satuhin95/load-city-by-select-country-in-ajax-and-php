<?php 
$db = mysqli_connect('localhost','root','','ajax');

$id= $_POST['id'];
$type= $_POST['type'];
if ($type=='citid') {
	$sql = "select * from city where cntid='$id'";
}
else{
	$sql = "select * from upazila where ctyid='$id'";
}

$result = mysqli_query($db,$sql);

if ($result->num_rows > 0) {
	while ($data  = mysqli_fetch_assoc($result)) {
		$arr[]=$data;	
	}
}

$html = '';
foreach ($arr as $value) {
	$html.='<option value='.$value['id'].'>'.$value['name'].'</option>';

}
echo $html;


