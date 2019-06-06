<?php

require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

$image_name=$_GET["name"];

if ($image_name=="Col-0"){

    echo "<a target='_blank' href='ecotype_image/Col-0.jpg'><img style='margin-left: 100px' height='50%' src='ecotype_image/Col-0.jpg'>";//输出图片数组

}
else {
    echo "
    <a target='_blank' href='ecotype_image/$image_name.png'><img style='margin-left: 100px' height='50%' src='ecotype_image/$image_name.png'>
   ";
}

?>


<?
require ('common_footer.php');
?>


