<?php

//process_data.php

$connect = new PDO("mysql:host=localhost:8889;dbname=moi_malade", "root", "root");

if(isset($_POST["query"]))
{	

	$data = array();

	$condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["query"]);

	$query = "
	SELECT commonMedicationsEn,id FROM commonmedications 
		WHERE commonMedicationsEn LIKE '%".$condition."%' 
		ORDER BY id DESC 
		LIMIT 10
	";

	$result = $connect->query($query);

	$replace_string = '<b>'.$condition.'</b>';

	foreach($result as $row)
	{
		$data[] = array(
			'commonMedications'		=>	str_ireplace($condition, $replace_string, $row["commonMedicationsEn"]),
            'id' => $row["id"]
		);
	}

	echo json_encode($data);
}

?>