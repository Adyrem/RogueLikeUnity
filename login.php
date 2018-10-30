<?php
    $PW = "test";
    if (isset($_POST['Password'])) {
        if ($_POST['Password'] == $PW) {
            $_SESSION['loggedIn'] = true;
            header("Location: index.php?site=home");
        }
    }
?>

<div class="content">
    <Form method="post">
        <label for="Password">Password</label>
        <br>
        <input name="Password" id="Password" type="password">
        <br>
        <button type="submit" style="margin-top: 50px;" >Submit</button>
    </Form>
</div>