<h3>Uppload Page</h3>
    <?php if (!isset($_SESSION['registered_user'])) : ?>
        <?php
            print_r($_SESSION);

                err_log('LOGIN', true);
                echo '<script>window.location= "index.php?page=4";</script>';
                ?>

    <?php elseif (!isset($_POST['uppbtn'])): ?>
        <form action="index.php?page=2" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <labe for="myfile">Select boy file for upload:</labe>
                <input type="file" class="form-control" name="myfile">
            </div>
            <div class="form-group">
                <button type="submit" name="uppbtn" class="btn btn-success">Send File</button>
            </div>
        </form>
    <?php else: ?>
        <?php

        if (isset($_POST['uppbtn'])) {
            if ($_FILES['myfile']['error'] != 0) {
                return err_log("Upload error code:" . $_FILES['myfile']['error']);
            }
            if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
                $tmp_name = $_FILES['myfile']['tmp_name'];
                $file_path = "images/" . $_FILES['myfile']['name'];
                move_uploaded_file($tmp_name, $file_path);
            }
            err_log('Uppload success', false);

        }

        ?>

    <?php endif; ?>

