<header>
    <div>
        <ul>
            <li>
                <a href="">
                    <img src="img/Facebook%20Logo.png" alt="Link to Facebook group" width="25px"/>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="img/Twitter%20Logo.png" alt="Link to Twitter group" width="25px"/>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="img/Vine%20Logo.png" alt="Link to Vine group" width="25px"/>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="img/GooglePlus%20Logo.png" alt="Link to Vine group" width="25px"/>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="img/Linkedind%20Logo.png" alt="Link to Vine group" width="25px"/>
                </a>
            </li>
        </ul>
        <?php include 'login.php'; ?>
    </div>
    <h1>
        <?php
        include 'connect.php';
        $list_query = mysql_query("SELECT id, page_title, content FROM site_page");
        $tabs = mysql_fetch_array($list_query);
        $id = $tabs[0];
        $t = $tabs[1];
        $c = $tabs[2]; ?>
        <a href="index.php?id=<?php echo$id; ?>&t=<?php echo $t; ?>&c=<?php echo $c;?>">
            <strong>
                <img src="img/logo.jpg" alt="Logo link to home"/>
            </strong>
        </a>
    </h1>
    <img src="img/Header%20HighLights.png"/>
    <?php include 'navigation.php';?>
    <?php if(isset($_GET['t'])):?>
        <script>
            var curPage = document.getElementById('<?php echo $_GET['t']; ?>');
            curPage.setAttribute('class', 'current');
        </script>
    <?php else : ?>
        <script>
            var menu = document.getElementById('menu'),
                list = menu.getElementsByTagName('li'),
                curLi = list[0],
                aTags = curLi.getElementsByTagName('a'),
                curPage = aTags[0];

            curPage.setAttribute('class', 'current');
        </script>
    <?php endif ?>
    <h1 class="title"> WELCOME TO <strong>SOCIAL UNITS</strong> </h1>
    <p>In our site you can find many<br/>of our products..</p>
</header>