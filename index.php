<?php session_start(); ?>
<?php
if (!(isset($_SESSION['email']) && isset($_SESSION['id']))) {
    header("Location: login.php");
}
$messageDisplay = "";
$error = "";
if (isset($_POST['addMessage'])) {
    if (!(empty($_POST['messageBody']))) {
        $conn = mysqli_connect("localhost", "root", "", "coform");
        if (!$conn) {
            echo mysqli_connect_error(); //for debugging
            exit;
        }
        $message = mysqli_escape_string($conn, $_POST['messageBody']);
        $userId = $_SESSION['id'];
        $query = mysqli_query($conn, "INSERT INTO `message` (`id`, `user_id`, `message`, `createdOn`) VALUES (NULL, '$userId', '$message', current_timestamp())");

        if ($query) {
            $messageDisplay = "Message added";
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Message is empty";
    }
}

require('header.php');

?>


<div class="container">
    <br>
    <?php if (isset($_GET)) {
        if (isset($_GET['message']))
            echo '<div class="alert alert-success" role="alert">' . $_GET['message'] . '</div>'; //Alert if the registration failed
    }
    ?>
    <br>
    <div class="row justify-content-start">
        <div class="col-md-6">
            <h1> Hello <?php echo $_SESSION['full_name']; ?></h1>
        </div>

    </div>
    <div class="row justify-content-start">
        <div class="col-md-6">
            <p>
                <?php if (isset($_POST)) {
                    if ($messageDisplay != "")
                        echo '<div class="alert alert-success" role="alert">' . $messageDisplay . '</div>'; //Alert if the registration failed
                } ?>
                <a class=" btn btn-primary" data-toggle="collapse" href="#txtArea" role="button" aria-expanded="false" aria-controls="txtArea">
                    Add Message
                </a>
            </p>
            <div class="collapse" id="txtArea">

                <div class="card card-body">
                    <form method="post">
                        <div class="form-group purple-border">
                            <label for="messageBody">Type Here</label>
                            <textarea class="form-control" id="messageBody" name="messageBody" rows="3"></textarea>
                        </div>
                        <button class="btn btn-primary" id="addMessage" name="addMessage">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-start">
        <div class="col-lg-12">
            <div class="row justify-content-center userMessages">
                <div class="message shadow p-3 mb-5 bg-white rounded col-lg-5 m-3">
                    <div class="user"><small class="time text-muted">2019-11-30</small></div>
                    <div class="userMessage">Here is some message for my web page messages i try it for now
                    </div>
                    <div class="border-bottom">
                        <a class="text-secondary"><button style="border:none;">Update</button></a>
                        <a class="text-secondary"><button style="border:none;">Delete</button></a>
                    </div>
                    <div class="replies m-3">
                        <div class="userMessage">Here is some message for my web page messages i try it for now </div>
                        <small class="time text-muted">2019-11-30</small>
                        <a class="text-secondary" data-toggle="collapse" href="#txtArea2" role="button" aria-expanded="false" aria-controls="txtArea2">Add reply</a>
                        <div class="collapse" id="txtArea2">
                            <div class="card card-body">
                                <div class="form-group purple-border">
                                    <label for="exampleFormControlTextarea4">Type Here</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
                                </div>
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message shadow p-3 mb-5 bg-white rounded col-lg-5 m-3">
                    <div class="user"><small class="time text-muted">2019-11-30</small></div>
                    <div class="userMessage">Here is some message for my web page messages i try it for now
                    </div>
                    <div class="border-bottom">
                        <a class="text-secondary"><button style="border:none;">Update</button></a>
                        <a class="text-secondary"><button style="border:none;">Delete</button></a>
                    </div>
                    <div class="replies m-3">
                        <div class="userMessage">Here is some message for my web page messages i try it for now </div>
                        <small class="time text-muted">2019-11-30</small>
                        <a class="text-secondary" data-toggle="collapse" href="#txtArea2" role="button" aria-expanded="false" aria-controls="txtArea2">Add reply</a>
                        <div class="collapse" id="txtArea2">
                            <div class="card card-body">
                                <div class="form-group purple-border">
                                    <label for="exampleFormControlTextarea4">Type Here</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
                                </div>
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('footer.php') ?>