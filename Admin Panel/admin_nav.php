<?php if($user_level == 1 || $user_level == 3):?>
<nav>
    <ul>
        <li>
            <a href="admin.php?type=user">Show users</a> |
        </li>
        <li>
            <a href="">Level Settings</a> |
        </li>
        <li>
            <a href="admin.php?type=key">Show Keys</a> |
        </li>
        <li>
            <a href="fill_access_keys_db.php">Fill Keys</a> |
        </li>
        <li>
            <a href="site_menu_editor.php">Site Menu</a>
        </li>
    </ul>
</nav>

<?php elseif($user_level == 2) :?>
<nav>
    <ul>
        <li>
            <a href="fill_access_keys_db.php">Fill Keys</a> |
        </li>
    </ul>
</nav>
<?php endif; ?>