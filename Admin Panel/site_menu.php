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
<li id="<?php echo $p_name; ?>">
    <a href="site_menu_editor.php?id=<?php echo $p_id?>&t=<?php echo $p_name;?>&c=<?php echo $p_content?>"><?php echo "$p_name"; ?></a>
</li>
<li id="<?php echo $p_id; ?>"> | </li>

<script>
    var li = document.getElementById('<?php echo $p_name; ?>');

    var span = document.createElement('span'),
        a = document.createElement('a'),
        aText = document.createTextNode('-');

    a.setAttribute("href", "tab_remover.php?t=<?php echo $p_name; ?>&id=<?php echo $p_id; ?>");

    a.appendChild(aText);
    span.appendChild(a);
    li.appendChild(span);
</script>
<?php endwhile; ?>
