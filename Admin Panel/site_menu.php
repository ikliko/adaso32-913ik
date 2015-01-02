<?php
/**
 * Created by PhpStorm.
 * User: kliko
 * Date: 31.12.2014 г.
 * Time: 13:29 ч.
 */
$list_query = mysql_query("SELECT id, page_title, content FROM site_page");
while($run_list = mysql_fetch_array($list_query)):

$p_id = $run_list['id'];
$p_name = $run_list['page_title'];
$p_content = $run_list['content'];
?>
<li>
    <a href="site_menu_editor.php?id=<?php echo $p_id?>&t=<?php echo $p_name;?>&c=<?php echo $p_content?>"><?php echo "$p_name"; ?></a>
</li>
<li> | </li>
<?php endwhile; ?>