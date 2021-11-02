<div class="navbar background-gradient">
    <span class="logo"><a href="../index.php?action=index"><img src="../public/resources/image/logo.png" class="logo"></a></span>
    <nav>
        <ul>
            <?php
            if (!isset($_SESSION['mail'])) {
                if (isUserAdmin($_SESSION['mail'])) {
                    ?>
                    <li><a href="../index.php?action=admin" class="btn-navbar"><i class="fas fa-user-cog"></i> &nbsp; Admin</a></li>
                    <?php
                }
                ?>
                <li><a href="../index.php?action=register" class="btn-navbar"><i class="fas fa-user-plus"></i> &nbsp; Register</a></li>
                <li><a href="../index.php?action=login" class="btn-navbar"><i class="fas fa-sign-in-alt"></i> &nbsp; Login</a></li>
                <?php
            } else {
                ?>
                <li><a href="../index.php?action=profile" class="btn-navbar"><i class="far fa-user-circle"></i> &nbsp; <?=explode('@', $_SESSION["mail"])[0];?></a></li>
                <li><a href="../index.php?action=logout" class="btn-navbar"><i class="fas fa-sign-out-alt"></i> &nbsp; Log Out</a></li>
                <?php
            }
            ?>
        </ul>
    </nav>
</div>