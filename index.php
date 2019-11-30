<?php session_start(); ?>
<?php
if (!(isset($_SESSION['email']) && isset($_SESSION['id']))) {
    header("Location: login.php");
}
if (isset($_POST['update'])) {
    $conn = mysqli_connect("localhost", "root", "", "coform");
    if (!$conn) {
        echo mysqli_connect_error(); //for debugging
        exit;
    }
    $text = mysqli_escape_string($conn, $_POST['textArea']);
    $queryUpdate = mysqli_query($conn, "UPDATE `message` SET `message`=' $text' WHERE 
        id = '" . $_POST['idHid'] . "'");
} else if (isset($_POST['delete'])) {
    $conn = mysqli_connect("localhost", "root", "", "coform");
    if (!$conn) {
        echo mysqli_connect_error(); //for debugging
        exit;
    }
    $queryUpdate = mysqli_query($conn, "DELETE FROM `message` WHERE id='" . $_POST['idHid1'] . "'");
} else if (isset($_POST['reply'])) {
    $conn = mysqli_connect("localhost", "root", "", "coform");
    if (!$conn) {
        echo mysqli_connect_error(); //for debugging
        exit;
    }
    $messageId = $_POST['idHid2'];
    $replyText = mysqli_escape_string($conn, $_POST['replyTextarea']);

    $conn = mysqli_connect("localhost", "root", "", "coform");
    if (!$conn) {
        echo mysqli_connect_error(); //for debugging
        exit;
    }
    $queryReplyAdd = mysqli_query($conn, "INSERT INTO `replies` (`id`, `message_id`, `reply`, `createdOn`) VALUES (NULL, '$messageId', '$replyText', current_timestamp())");
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
            <h2> Hello <?php echo $_SESSION['full_name']; ?></h2>
        </div>

    </div>
    <div class="row justify-content-start">
        <div class="col-lg-12">
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
                <?php
                if ($_SESSION['id']) {
                    $conn = mysqli_connect("localhost", "root", "", "coform");
                    if (!$conn) {
                        echo mysqli_connect_error(); //for debugging
                        exit;
                    }

                    $query = mysqli_query($conn, "SELECT * FROM `message` WHERE user_id = '" . $_SESSION['id'] . "'");
                    if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) {
                            $queryReply = mysqli_query($conn, "SELECT * FROM `replies` WHERE message_id =  '" . $data['id'] . "'");
                            $dataReply = mysqli_fetch_assoc($queryReply);

                            echo '
            <div class="message shadow p-3 mb-5 bg-white rounded col-lg-6 m-3">
                <div class="user"><small class="time text-muted">' . $data['createdOn'] . '</small></div>
                <div class="userMessage">' . $data['message'] . '
                </div>
                <div class="border-bottom">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#messageUpdate' . $data['id'] . '">
                        Update
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="messageUpdate' . $data['id'] . '" tabindex="-1" role="dialog" aria-labelledby="messageUpdateLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="messageUpdateLabel">Update</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <input type="hidden" name="idHid" id="idHid" value="' . $data['id'] . '" />
                                    <div class="modal-body">
                                        <textarea class="form-control" id="textArea" name="textArea" rows="3">' . $data['message'] . '</textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button tybe="submit" class="btn btn-primary" name="update" id="update">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div >
                        <form method="post">
                        <input type="hidden" name="idHid1" id="idHid1" value="' . $data['id'] . '" />

                        <button type="submit" id="delete" name="delete" class="mt-1 mb-1 btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
                
                <div class="replies m-3">
                    <div class="userMessage">' . $dataReply['reply'] . ' </div>
                    <small class="time text-muted">' . $dataReply['createdOn'] . '</small>
                    <a class="text-secondary" data-toggle="collapse" href="#txtArea' . $data['id'] . '" role="button" aria-expanded="false" aria-controls="txtArea' . $data['id'] . '">Add reply</a>
                    <div class="collapse" id="txtArea' . $data['id'] . '">
                        <div class="card card-body">
                        <form method="post">    
                        <div class="form-group purple-border">
                                <input type="hidden" name="idHid2" id="idHid2" value="' . $data['id'] . '" />
                                <label for="replyTextarea' . $data['id'] . '">Type Here</label>
                                <textarea class="form-control" name="replyTextarea" id="replyTextarea' . $data['id'] . '" rows="3" value=""></textarea>
                            </div>
                            <button type="submit" name="reply" id="reply" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>';
                        }
                    } else {
                        echo "nothing to show";
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>
<script>
    function ContentPage(elem) {
        location.href = "index.php" + "?id=" + elem;
    };
</script>

<?php require('footer.php') ?>