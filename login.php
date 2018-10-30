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
    <br>
    <Form method="post">

        <label for="Password">Password</label>
        <input name="Password" type="password">
        <br>
        <button type="submit" >Submit</button>

    </Form>
</div>