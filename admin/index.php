<?php include("includes/header.php"); ?>
<?php
if (!$session->isSignedIn())
{
    redirect("login.php");
}
?>

        <!-- Navigation -->

            <!-- Top Menu Items -->
            <?php include "includes/topNavigation.php"; ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php  include "includes/sideNavigation.php" ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <?php include "includes/adminContent.php" ?>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>