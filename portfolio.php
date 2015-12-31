
<?php

include 'header.php';

?>
<script>

function slider(id)

{





$.ajax({
                        type: "POST",
                        url: "./sys/php.php",
                        data: { action: 'slider', id: id},
                        cache: false,
                        success: function(responce){  $('div[name="slider"]').html(responce); }
                });


/* если переменная состояния окна равняется нулю, изменяем свойства DIV фона с именем back, а именно: задаем прозрачность opacity индексом 0.6 - данный индекс может принимать значения от 0.1 до 1 - чем больше цифра, тем меньше прозрачность, следовательно - темнее фон back */
$("#back").css("opacity", "0.6");
/* fadeIn - один стандартных визуальных эффектов, переводится как Из затемнения, блок popup появляется быстрее, активация темного фона back происходит медленнее   */
$("#slider").fadeIn(500);
$("#back").fadeIn(1500);
/* служебная переменная переходит в состояние 1 - окно открыто */
on = 1;
}

function left(id)
{
$.ajax({
                        type: "POST",
                        url: "./sys/php.php",
                        data: { action: 'slider', id: id},
                        cache: false,
                        success: function(responce){  $('div[name="slider"]').html(responce); }
                });	
}

function right(id)
{
$.ajax({
                        type: "POST",
                        url: "./sys/php.php",
                        data: { action: 'slider', id: id},
                        cache: false,
                        success: function(responce){  $('div[name="slider"]').html(responce); }
                });
	
}

function off() {

/* убираем окно-блок DIV с именем класса css "popup" с помощью эффекта Затемнение fadeOut */
document.getElementById("image_div").src="";
$("#popup").fadeOut("normal");
$("#slider").fadeOut("normal");
$("#phone_popup").fadeOut("normal");
/* возвращаем фону исходное состояние, дезактивируем затемненный фон back */
$("#back").fadeOut("normal");
/* не забываем про служебную переменную , возвращаем ей значение ноль */


/* функция закрытия окна завершена */
}

</script>
			<!-- Banner -->
<section id="banner" style="padding:12em 0 1em 0">
				<h2>Добро пожаловать! <br></h2>
					<p>
в мир цветов, декора и красоты с историей
</p>


					<!--<ul class="actions">
						<li><a href="#" class="button special">Sign Up</a></li>
						<li><a href="#" class="button">Learn More</a></li>
					</ul>-->
				</section>


			<!-- Main -->
				<section id="main" class="container" style="margin-top:0px">

					<section class="box special" id="step1">
						<header class="major">



<?php
echo '<input type=hidden id="theme" value='.$_GET['theme'].'>';
$intro= new port_menu();
echo "<h2>";
$intro->current_menu($_GET['theme'], "name", "url");
echo $intro->name;
echo "</h2><hr>

";

$intro->current_menu($_GET['theme'], "text", "url");


if (isset($_GET['sub']))
{


$sql = "SELECT * FROM `portfolio` WHERE `category` = '".$_GET['theme']."' AND `sub` = '".$_GET['sub']."' AND `icon`!='1' ORDER BY `portfolio`.`number` ASC";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	echo '<div class="grid_img">';
    // output data of each row
    while($row = $result->fetch_assoc()) {
		

        echo "<div class=\"img_thumb grid-item\" onclick=\"slider(".$row["id"].")\">
		<img src=\"/".$row["path"]."/thumb/".$row["file_name"]."\" alt=\"".$row["file_name"]."\">
		</div>

		";
		/*$i++; 
		if($i>3){$i=0; echo "<div class=\"img_thumb_long\"></div>";}*/


    }
} else {
    echo "Пока нет ни одной записи)";
}
}

else
{

if ($_GET['theme']=='rent')
{
$sql = "SELECT * FROM `portfolio` WHERE `category` = '".$_GET['theme']."' AND `icon`='1' ORDER BY `portfolio`.`number` ASC";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
echo $intro->text.'<div  >';
$i=0;
 while($row = $result->fetch_assoc()) {
		

        echo "<div style=\"vertical-align:middle\" class=\"img_thumb \">
		<a href=\"portfolio.php?theme=rent&sub=".$row["sub"]."\"><img src=\"/".$row["path"]."/thumb/".$row["file_name"]."\" alt=\"".$row["file_name"]."\">
		<div>".$row["capture"]."</div></a>
		</div>

		";
		$i++; 
		if($i>3){$i=0; echo "<div class=\"img_thumb_long\"></div>";}


    }
} else {
    echo "Пока нет ни одной записи)";
}
}

else
{

echo $intro->text;

$sql = "SELECT * FROM `portfolio` WHERE `category` = '".$_GET['theme']."' ORDER BY `portfolio`.`number` ASC";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	echo '<div class="grid_img">';
$i=0;
    // output data of each row
    while($row = $result->fetch_assoc()) {
		

        echo "<div class=\"img_thumb grid-item\" onclick=\"slider(".$row["id"].")\">
		<img src=\"/".$row["path"]."/thumb/".$row["file_name"]."\" alt=\"".$row["file_name"]."\">
		</div>


		";/*
		$i++; 
		if($i==10){$i=0;}*/


    }



} else {
    echo "Пока нет ни одной записи)";
}}}
$mysqli->close();


echo "


</div>
<div id=\"slider\" name=\"slider\"><img style=\"width:100%\"; src=\"/images/preloader.gif\"></div>
<div id=\"back\" onclick=\"off()\"></div>

";

?>


						</header>

					</section>

					



				</section>

			<!-- CTA -->



<?php

include "footer.php";

?>



