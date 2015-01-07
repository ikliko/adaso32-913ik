<nav id="nav">
    <ul id="menu">
    <?php
    /**
     * Created by PhpStorm.
     * User: kliko
     * Date: 2.1.2015 г.
     * Time: 20:29 ч.
     */
    include "connect.php";
    $list_query = mysql_query("SELECT id, page_title, content FROM site_page");
    while($run_list = mysql_fetch_array($list_query)):

    $p_id = $run_list['id'];
    $p_name = $run_list['page_title'];
    $p_content = $run_list['content'];
    ?>
        <li>
            <a href="index.php?id=<?php echo $p_id?>&t=<?php echo $p_name;?>&c=<?php echo $p_content?>" id="<?php echo $p_name; ?>"><?php echo "$p_name"; ?></a>
        </li>
    <?php endwhile; ?>
    </ul>
</nav>