<?php


$mysqli = new mysqli('mysql.hostinger.com.ua', 'u802398134_bot', 'veronika87', 'u802398134_magic'); 
if (mysqli_connect_errno()) { 
   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 



/* Посылаем запрос серверу */ 


/* Закрываем соединение */ 
//$mysqli->close(); 

class port_menu
{
	
	
	var $name;
	var $url;
	var $id;
	var $text;
	var $number;

function last_num($category, $sub)
{
global $mysqli;
if (isset($sub) && $sub!=0)
{$sql="SELECT * FROM `portfolio` WHERE `category` = '".$category."' 
AND `sub` = '".$sub."' AND `icon` != '1' ORDER BY `portfolio`.`number` DESC LIMIT 0, 1";
}
else{
$sql="SELECT * FROM `portfolio` WHERE `category` = '".$category."' ORDER BY `portfolio`.`number` DESC LIMIT 0, 1";}
	$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$number=$row['number'];

	}//while

		
			



}
else {$number=0;}	
$this->number=$number;

}

function first_num($category)

{
	
	global $mysqli;
$sql="SELECT * FROM `portfolio` WHERE `category` = '".$category."' ORDER BY `portfolio`.`number` ASC LIMIT 0, 1";
	$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$number=$row['number'];

	}//while

	$this->number=$number;
		
			



}
	
}
	
	function current_menu($url, $what, $where)
	{
	global $mysqli;
	
	$sql="SELECT `".$what."` FROM `port_menu` WHERE `".$where."` LIKE '".$url."' ";
//echo $sql;
	$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$id=$row['id'];
		$name=$row['name'];
		$url=$row['url'];
		$text=$row['text'];
	}//while
	$this->id=$id;
	$this->name=$name;
	$this->url=$url;
	$this->text=$text;
	$this->number=$result->num_rows;
		
			

}}//func

function port_menu_list($param)
{
			global $mysqli;

$sql="SELECT * FROM `port_menu`";
	$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
if($param=="ul"){
    while($row = $result->fetch_assoc()) {
		
		
		echo "<li><a href=\"portfolio.php?theme=".$row['url']."\">".$row['name']."</a></li>";

		

		
}}
if ($param=="select")
{
    while($row = $result->fetch_assoc()) {echo " <option value=".$row['id'].">".$row['name']."</option>";}}
	
if ($param=="select_url")
{
    while($row = $result->fetch_assoc()) {echo " <option value=".$row['url'].">".$row['name']."</option>";}}	
	
}
	
}
}//class

class port_class{
	var $file_name;
	var $path;
	var $order;
	var $id;
	var $capture;
	var $left;
	var $right;
	
	
	function get_one_img($what, $id)
	{
		
		global $mysqli;
$sql = "SELECT * FROM `portfolio` WHERE `".$what."` = '".$id."'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) 
{

    while($row = $result->fetch_assoc()) {
		
		$id=$row['id'];
		$file_name=$row['file_name'];
		$order=$row['number'];
		$path=$row['path'];
		$capture=$row['capture'];
		$category=$row['category'];

    }	
	$this->id=$id;
	$this->path=$path;
	$this->order=$order;
	$this->file_name=$file_name;
	$this->capture=$capture;
	$this->category=$category;

	
}
		
	}
	
	function get_img($what, $id)
	
	{
		
global $mysqli;
$sql = "SELECT * FROM `portfolio` WHERE `".$what."` = '".$id."' ORDER BY `category`";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) 
{
echo "<table>
<tr><td>№</td><td>картинка</td><td>подпись</td><td>категория</td><td>подкатегория</td></tr>";
    while($row = $result->fetch_assoc()) {
		
		
        echo "
		<tr style=\"cursor:pointer\" onclick=\"popup(".$row["id"].")\" >
		<td>".$row['number']."</td>
		<td><img style=\"max-width:100px; \" 
		src=\"/".$row["path"]."/thumb/".$row["file_name"]."\" alt=\"".$row["file_name"]."\"></td>
		<td>".$row['capture']."</td>
		<td>".$row['category']."</td>";
		$sql_sub="SELECT `name` FROM `sub_cat` WHERE `id` = '".$row['sub']."'";
		$result_sub = $mysqli->query($sql_sub);
		while($row_sub = $result_sub->fetch_assoc()){
		echo"<td>".$row_sub['name']."</td>";}
	echo"
		</tr>";

    }	
	
}
		
	}
	function slider($what, $id)
	{
		global $mysqli;
$sql = "SELECT * FROM `portfolio` WHERE `".$what."` = '".$id."'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$id=$row['id'];
		$file_name=$row['file_name'];
		$order=$row['number'];
		$path=$row['path'];
		$capture=$row['capture'];
		$sub=$row['sub'];

		$category=$row['category'];
		$left=$row['number']-1;
		$right=$row['number']+1;
		$sql_l="SELECT `id` FROM `portfolio` WHERE `category` = '".$category."' AND `sub` = '".$sub."' AND `number` = '".$left."'";
		$result_l = $mysqli->query($sql_l);
		if ($result_l->num_rows > 0) { while($row_l = $result_l->fetch_assoc()) {
		$id_l=$row_l['id'];}}
		else {
			$sql="SELECT * FROM `portfolio` WHERE `category` = '".$category."'  AND `sub` = '".$sub."'  ORDER BY `portfolio`.`number` DESC LIMIT 0, 1";
	$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$id_l=$row['id'];	}}}
		
		$sql_r="SELECT `id` FROM `portfolio` WHERE `category` = '".$category."' AND `sub` = '".$sub."' AND `number` = '".$right."'";
		$result_r = $mysqli->query($sql_r);
		if ($result_r->num_rows > 0) { while($row_r = $result_r->fetch_assoc()) {
			
		$id_r=$row_r['id'];}}
		else {
			$sql="SELECT * FROM `portfolio` WHERE `category` = '".$category."'  AND `sub` = '".$sub."'  ORDER BY `portfolio`.`number` ASC LIMIT 0, 1";
	$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$id_r=$row['id'];	}}}
	

		

}
	$this->id=$id;
	$this->path=$path;
	$this->order=$order;
	$this->left=$id_l;
	$this->right=$id_r;
	$this->file_name=$file_name;
	$this->capture=$capture;
	
}
$mysqli->close();

}}


?> 
