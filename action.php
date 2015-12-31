<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="refresh" content="2; url=http://magicdecor.com.ua/admin.php" />
</head>
<body>
<?php
include 'config.php';
include 'si.php';

if (isset($_POST['tel']))
{
$email="sergpavlov89@gmail.com";
echo $message=$_POST['message']."\r\n От: ".$_POST['name']."\r\n Телефон: ".$_POST['tel']."\r\n Почта: ".$_POST['email'];



$headers = 'From: Magicbot ' . "\r\n" .
    'Reply-To: magic.decorkiev@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
//mail("".$email."", "".$product_name."", "С мобильного приложения\nДата: ".$conv."  \nИмя: ".$user_name." \nТелефон: ".$user_phone." \nЦена: ".number_format($product_price, 0, ',', ' ')." грн ", $headers);
//$email="magic.decorkiev@gmail.com";
$email2="sergpavlov89@gmail.com";
$email="magic.decorkiev@gmail.com";
if(
mail("".$email2."", "Сообщение с сайта", "Вам пришло новое сообщение: \r\n".$message."", $headers).
mail("".$email."", "Сообщение с сайта", "Вам пришло новое сообщение: \r\n".$message."", $headers)
)

{
    echo "Запрос отправлен успешно!";
header("Location:/index.php?mes=mail_ok");}
else {header("Location:/index.php?mes=mail_er");}
//mail($email, "Заявка с сайта", $message, $_POST['email'], "-fwebmaster@$SERVER_NAME");
}	


 if (isset($_POST['add']))

{

echo "start...";


	$title=$_POST['title'];
	$small_text=$_POST['small_text'];
	$text=$_POST['text'];
	$date=date("Y-m-d");
/*
if ($result = $mysqli->query('SELECT title_ua, text_ua FROM text WHERE var="progect"')) { 


    // Выбираем результаты запроса: 
    while( $row = $result->fetch_assoc() ){ 
        echo $row['title_ua'].'</div>
	<div id="uslugi_all">
<div id="proect_all" class="menu_second" >

<span class="uslugi_text">'.$row['text_ua']; 
    }

    // Освобождаем память 
    $result->close(); 
} 


INSERT INTO `u802398134_magic`.`news` (`id`, `title`, `text`, `small_text`, `img_url`, `date`) VALUES (NULL, 'first article', 'first article|_|small_text', 'first article|_|main_text', 'image/1.jpg', '2015-10-23');*/ 


/*
if ($result= $mysqli->query('INSERT INTO `u802398134_magic`.`news` (`title`, `text`, `small_text`, `img_url`) VALUES ($title, $small_text, $text, "image/1.jpg", $date'))
{echo "ADD";}
else echo mysqli_error($mysqli);
*/




if (file_exists($filename2="../images/")) {
    echo "Файл $filename2 существует";



if (isset($_FILES))
{
  //пролистываем весь массив изображений по одному $_FILES['file']['name'] as $k=>$v
  foreach ($_FILES['file']['name'] as $k=>$v)
  {
    //директория загрузки
    $uploaddir = "../images/";
    //новое имя изображения
    $apend=date('YmdHi').rand(100,1000);
    //путь к новому изображению

 
    //Проверка расширений загружаемых изображений
    if($_FILES['file']['type'][$k] == "image/gif" || $_FILES['file']['type'][$k] == "image/png" ||
    $_FILES['file']['type'][$k] == "image/jpg" || $_FILES['file']['type'][$k] == "image/jpeg")
    {
      //черный список типов файлов
      $blacklist = array(".php", ".phtml", ".php3", ".php4");
      foreach ($blacklist as $item)
      {
        if(preg_match("/$item\$/i", $_FILES['file']['name'][$k]))
        {
          echo "Нельзя загружать скрипты.";
          exit;
        }
      }
 
      //перемещаем файл из временного хранилища
      if (move_uploaded_file($_FILES['file']['tmp_name'][$k], "../images/".$apend))
      {

$text = $mysqli->real_escape_string($text);
$small_text = $mysqli->real_escape_string($small_text);

$sql = "INSERT INTO `u802398134_magic`.`news` (`title`, `small_text`, `text`, `img_url`, `show`)
VALUES ('$title', '$small_text', '$text', '$apend', '0')";

if ($mysqli->query($sql) === TRUE) {
    echo "Запись добавлена успешно!";
	$mysqli->close();
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->mysqli_error;
$_POST['add']=0;
	$mysqli->close();
}

        
          echo "<center><br>Файл -".$apend."  загружен.</center>";
        
      }
      else
        echo "<center><br>Файл не загружен, вернитесь и попробуйте еще раз.</center>";
    }
    else
      echo "<center><br>Можно загружать только изображения в форматах jpg, jpeg, gif и png.</center>";
  }
}




}

} else {
    echo "";
}



if (isset($_POST['edit']))


{

$_POST['title'] = $mysqli->real_escape_string($_POST['title']);
$_POST['text'] = $mysqli->real_escape_string($_POST['text']); 
$_POST['small_text'] = $mysqli->real_escape_string($_POST['small_text']); 


$sql = "UPDATE `u802398134_magic`.`news` SET `small_text`='".$_POST['small_text']."', `title`='".$_POST['title']."', `text`='".$_POST['text']."' WHERE `id` LIKE '".$_POST['id']."'";



if ($mysqli->query($sql) === TRUE) {
    echo "Запись успешно обновлена!";
	$_POST['edit']=null;
	$mysqli->close();
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->mysqli_error;
	$mysqli->close();
}

}

if (isset($_POST['add_services']))

{
$text=$_POST['text'] = $mysqli->real_escape_string($_POST['text']);

$sql = "UPDATE `u802398134_magic`.`services` SET `text`='".$text."' WHERE `id` LIKE '1'";

if ($mysqli->query($sql) === TRUE) {
    echo "Запись добавлена успешно!";
	$mysqli->close();
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->mysqli_error;
$_POST['add']=0;
	$mysqli->close();
}
}

if (isset($_POST['edit_contacts']))

{
$text=$_POST['text'] = $mysqli->real_escape_string($_POST['text']);

$sql = "UPDATE `u802398134_magic`.`contacts` SET `text`='".$text."' WHERE `id` LIKE '1'";

if ($mysqli->query($sql) === TRUE) {
    echo "Запись добавлена успешно!";
	$mysqli->close();
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->mysqli_error;
$_POST['add']=0;
	$mysqli->close();
}
}

if (isset($_POST['edit_prices']))

{
$text=$_POST['text'] = $mysqli->real_escape_string($_POST['text']);

$sql = "UPDATE `u802398134_magic`.`prices` SET `text`='".$text."' WHERE `id` LIKE '1'";

if ($mysqli->query($sql) === TRUE) {
    echo "Запись добавлена успешно!";
	$mysqli->close();
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->mysqli_error;
$_POST['add']=0;
	$mysqli->close();
}
}

if (isset($_POST['edit_partners']))

{
$text=$_POST['text'] = $mysqli->real_escape_string($_POST['text']);

$sql = "UPDATE `u802398134_magic`.`partners` SET `text`='".$text."' WHERE `id` LIKE '1'";

if ($mysqli->query($sql) === TRUE) {
    echo "Запись добавлена успешно!";
	$mysqli->close();
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->mysqli_error;
$_POST['add']=0;
	$mysqli->close();
}
}

if (isset($_POST['edit_portfolio']))

{
$text=$_POST['text'] = $mysqli->real_escape_string($_POST['text']);
$title=$_POST['title'];


$sql = "UPDATE `u802398134_magic`.`port_menu` SET `text`='".$text."' WHERE `id` LIKE '".$title."'";

if ($mysqli->query($sql) === TRUE) {
    echo "Запись добавлена успешно!";
	$mysqli->close();
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->mysqli_error;
$_POST['add']=0;
	$mysqli->close();
}
}

if (isset($_POST['add_photo_port']))

{
	/*
		function current_menu($url, $what, $where)
	{
	global $mysqli;
	
	$sql="SELECT `".$what."` FROM `port_menu` WHERE `".$where."` LIKE '".$url."' ";
	*/
	$name=$_POST['select'];
	$text=$_POST['text'];
	
	$sub=$_POST['get_sub'];


	


  foreach ($_FILES['uploadfile']['name'] as $k=>$v)
  {

  $u=new port_menu();
	$u->current_menu($name, 'url', 'id');
	
	 $uploaddir = "../tree/portfolio/img/".$u->url."/";
$uploaddir2 = "tree/portfolio/img/".$u->url;
$uploaddir3 = "../tree/portfolio/img/".$u->url."/thumb/"; 
	  

 $apend=date('dHi').rand(100,1000);	  
$uploadfile = $uploaddir.$apend.basename($_FILES['uploadfile']['name'][$k]);
$uploadfile2 = $uploaddir3.$apend.basename($_FILES['uploadfile']['name'][$k]);

$file=$apend.basename($_FILES['uploadfile']['name'][$k]);
$u->last_num($u->url, $sub);

$last_num=$u->number+1;

   $image = new SimpleImage();
   $image->load($_FILES['uploadfile']['tmp_name'][$k]);
   $image->resizeToWidth(400);
   $image->save($uploadfile2);

// Копируем файл из каталога для временного хранения файлов:

if (move_uploaded_file($_FILES['uploadfile']['tmp_name'][$k], $uploadfile))
{
echo "<h3>Файл успешно загружен на сервер</h3>";
if (isset($sub) && $sub!=''){
$sql="INSERT INTO `portfolio`(`category`, `file_name`, `capture`, `number`, `path`, `sub`) 
VALUES ('".$u->url."', '".$file."', '".$text."', '".$last_num."', '".$uploaddir2."', '".$sub."')";}
else {
	$sql="INSERT INTO `portfolio`(`category`, `file_name`, `capture`, `number`, `path`) 
VALUES ('".$u->url."', '".$file."', '".$text."', '".$last_num."', '".$uploaddir2."')";
}

if ($mysqli->query($sql) === TRUE) {
    echo "Запись добавлена успешно!";
	//$mysqli->close();
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->mysqli_error;

$_POST['add']=0;
	//$mysqli->close();
}



}
else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }

// Выводим информацию о загруженном файле:
 
echo "<h3>Информация о загруженном на сервер файле: </h3>";
echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['uploadfile']['name'][$k]."</b></p>";
echo "<p><b>Mime-тип загруженного файла: ".$_FILES['uploadfile']['type'][$k]."</b></p>";
echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['uploadfile']['size'][$k]."</b></p>";
echo "<p><b>Временное имя файла: ".$_FILES['uploadfile']['tmp_name'][$k]."</b></p>";
echo $uploaddir; 

}
	}


?>
</body>
</html>
