<?php session_start(); ?>
<?php
if (!(isset($_SESSION['email']) && isset($_SESSION['id']))) {
    header("Location: login.php");
}
require('header.php');

?>


<div class="container">
    <br>
    <?php if (isset($_GET)) {
        if (isset($_GET['message']))
            echo '<div class="alert alert-success" role="alert">' . $_GET['message'] . '</div>'; //Alert if the registration failed
    } ?>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1> Hello <?php echo $_SESSION['full_name']; ?></h1>
        </div>
    </div>
</div>

<?php require('footer.php') ?>