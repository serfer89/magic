<?php
include "config.php";



switch ($_POST['action'])
{
	case "slider":
	$id=$_POST['id'];
$a=new port_class();
$a->slider("id", $id);
echo "<div>
";
	$full_name="/".$a->path."/".$a->file_name;
	echo "<div ><div id=\"left\" class=\"left_slide\" onclick=\"left(".$a->left.")\"></div>
	<img id=\"image_div\" class=\"port_img\" src=\"".$full_name."\" alt=\"".$a->file_name."\" onclick=\"right(".$a->right.")\">
	<div style=\"background-color: rgb(149, 242, 143); width: 60%; margin: 0px auto;\">".$a->capture."</div></div></div>
	<script>
	var h=$(window).height();
h=h-150;
			$('#image_div').css('max-height',h);
	</script>";
	 
	
	$a=null;
	break;
	
	case "edit_port_photo":
	
	
		$category=$_POST['category'];
		$a=new port_class();
	
		$a->get_img("category", $category);

	
	break;
	
	
	case "selected_last_num":
		$id=$_POST['id'];


	
		$sql="SELECT `url` FROM `port_menu` WHERE `id` LIKE '".$id."'";
	
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
    // output data of each row
   		 while($row = $result->fetch_assoc()) {
		$name=$row['url'];

		}//while


		}
	
			$sql_sub="SELECT `id` FROM `portfolio` WHERE `sub` != '' AND `category` LIKE '".$name."'";
			$result_sub = $mysqli->query($sql_sub);

				if ($result_sub->num_rows > 0)
					{
					$result_get_sub = $mysqli->query("SELECT * FROM `sub_cat` WHERE `category` LIKE '".$name."'");	
					echo "<select name=\"get_sub\"><option>...</option>";
					   		 while($row = $result_get_sub->fetch_assoc()) {
							echo "<option value=".$row['id'].">".$row['name']."</option>";
 							}	
					echo "</select>";
					}
		$l=new port_menu();
		$l->last_num($name, $sub);
		echo $l->number;
	
	break;
	
	
	case "edit_one_photo":
		
		$id=$_POST['id'];
		$img=new port_class();
		$img->get_one_img("id", $id);
			$full_name="/".$img->path."/".$img->file_name;

		echo "<div id=\"image_div\">
		<img class=\"port_img\" src=\"".$full_name."\" alt=\"".$img->file_name."\">
		<textarea style=\"width:80%\" id=\"upt_capture\">".$img->capture."</textarea>
		<input type=\"hidden\" name=\"upd_id\" value=\"".$id."\">
		<input type=\"button\" value=\"Upd\" onclick=\"update()\">
		<input type=\"button\" value=\"Del\" onclick=\"delete_it()\">
		</div>";
		break;
	case "upd_port_photo":
	
		echo $id=$_POST['id'];
		echo $capture=$_POST['capture'];
		
		$sql="UPDATE `u802398134_magic`.`portfolio` SET `capture` = '".$capture."' WHERE `portfolio`.`id` ='".$id."';";
		
		if ($mysqli->query($sql) === TRUE) {
    		echo "Запись успешно обновлена!";
		$_POST['edit']=null;
		$mysqli->close();
			} else 
				{
  				  echo "Error: " . $sql . "<br>" . $conn->mysqli_error;
					$mysqli->close();
				}
		
		
	break;

	case "del_port_photo":
		$id= $_POST['id'];
		$sql="DELETE FROM `portfolio` WHERE `id` = '".$id."'";
		echo $sql;
		if ($mysqli->query($sql) === TRUE) {
 		  echo "Запись успешно удалена!";
			$_POST['edit']=null;
			$mysqli->close();
			} else 
				{
  				  echo "Error: " . $sql . "<br>" . $conn->mysqli_error;
					$mysqli->close();
				}

	break;
	
	case "edit_port_text":
	$title=$_POST['title'];
	$p=new port_menu();
	$p->current_menu($title, "text", "id");
	echo "
	
	
	<script type=\"text/javascript\">
  	 tinymce.PluginManager.load('moxiecut', '/sys/js/tinymce/plugins/moxiecut/plugin.min.js');
  	  tinymce.init({
        selector: \"textarea\",
		keep_styles: false,
		extended_valid_elements : 'h3[onclick|class|id]',
        theme: \"modern\",
        plugins: [
    	    \"advlist autolink lists link image charmap print preview anchor\",
    		\"searchreplace visualblocks code fullscreen textcolor\",
    		\"insertdatetime colorpicker emoticons colorpicker media table contextmenu moxiecut\"
    	],
    	toolbar: \"code emoticons | styleselect | bold italic | alignleft aligncenter alignright alignjustify | forecolor backcolor | link insertfile image\",
      
    });
	</script>	
	
	
<form method=\"post\" action=\"../sys/action.php\" enctype='multipart/form-data'>
<span>Текст категории :</span><textarea id=\"mytextarea\" name=\"text\" class=\"moxie\" >". $p->text. "</textarea></div>
<input type=\"hidden\" name=\"edit_portfolio\" value=\"1\">
<input type=\"hidden\" name=\"title\" value=\"".$title."\">

<div><button type=\"submit\" value=\"save\">save</div>
<input type=\"button\" onclick=\"javascript:location.reload();\" value=\"Reset\">

</form>";

	
	
}






/*
case "left":
	$id=$_POST['id'];
$l=new port_class($id);

echo "<div>
<div class=\"left\" onclick=\"left($id)\">left</div><div class=\"right\" onclick=\"right($id)\">right</div>";
	$full_name="/".$a->path."/".$a->file_name;
	echo "<div><img id=\"image_div\" class=\"port_img\" src=\"".$full_name."\" alt=\"".$a->file_name."\">good</div></div>";
	echo $a->order;
	
	$a=null;

break;
*/
?>
