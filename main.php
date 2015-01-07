<main>
    <?php
    /**
     * Created by PhpStorm.
     * User: kliko
     * Date: 3.1.2015 г.
     * Time: 17:09 ч.
     */
    include 'connect.php';

    if((isset($_GET['t']) && !empty($_GET['t'])) && ((isset($_GET['c']) && !empty($_GET['c'])))):
    $tab = $_GET['t'];
    $content = $_GET['c'];
    echo $content;
    ?>
    <?php else :
        $list_query = mysql_query("SELECT id, page_title, content FROM site_page");
        $tabs = mysql_fetch_array($list_query);
        $home = $tabs[2];
        ?>
        <?php echo $home; ?>
    <?php endif; ?>
</main>