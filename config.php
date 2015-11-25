<?php


$mysqli = new mysqli('mysql.hostinger.com.ua', 'u802398134_bot', 'veronika87', 'u802398134_magic'); 
if (mysqli_connect_errno()) { 
   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 



/* Посылаем запрос серверу */ 


/* Закрываем соединение */ 
//$mysqli->close(); 


class port_class{
	var $file_name;
	var $path;
	var $order;
	var $id;
	var $capture;
	var $left;
	var $right;
	
	function __construct($id)
	{
		global $mysqli;
$sql = "SELECT * FROM `portfolio` WHERE `id` = '".$id."'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$id=$row['id'];
		$file_name=$row['file_name'];
		$order=$row['number'];
		$path=$row['path'];
		$capture=$row['capture'];

		$category=$row['category'];
		$left=$row['number']-1;
		$right=$row['number']+1;
		$sql_l="SELECT `id` FROM `portfolio` WHERE `category` LIKE '".$category."' AND `number` LIKE '".$left."'";
		$result_l = $mysqli->query($sql_l);
		if ($result_l->num_rows > 0) { while($row_l = $result_l->fetch_assoc()) {
		$id_l=$row_l['id'];}}
		else { $id_l=1;}
		
		$sql_r="SELECT `id` FROM `portfolio` WHERE `category` LIKE '".$category."' AND `number` LIKE '".$right."'";
		$result_r = $mysqli->query($sql_r);
		if ($result_r->num_rows > 0) { while($row_r = $result_r->fetch_assoc()) {
		$id_r=$row_r['id'];}}
		else {$id_r=1;}

		

}
	$this->id=$id;
	$this->path=$path;
	$this->order=$order;
	$this->left=$id_l;
	$this->right=$id_r;
	$this->file_name=$file_name;
	$this->capture=$capture;
	
}
}}


?> 
