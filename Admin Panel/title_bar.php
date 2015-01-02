<nav>
<ul>

<?php
/**
 * Created by PhpStorm.
 * User: kliko
 * Date: 25.12.2014 г.
 * Time: 22:34 ч.
 */

if(loggedin()): ?>
<?php if($user_level == 1): ?>
<li>
    <a href="Index.php">Home</a>
</li>
<li>
    <a href="profile.php">Profile</a>
</li>
<li>
    <a href="logout.php">Logout</a>
</li>
<?php else: ?>
<li>
    <a href="Index.php">Home</a>
</li>
<li>
    <a href="profile.php">Profile</a>
</li>
<li>
    <a href="logout.php">Logout</a>
</li>
<?php endif; ?>
<?php else: ?>
<li>
    <a href="Index.php">Home</a>
</li>
<li>
    <a href="login.php">Login</a>
</li>
<li>
    <a href="register.php">Register</a>
</li>
<?php endif; ?>
</ul>
</nav>