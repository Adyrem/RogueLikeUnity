<?php

if (isset($_POST['Password'])) {
    if (password_verify($_POST['Password'],MASTERPW)) {
        $_SESSION['loggedIn'] = true;
        header("Location: index.php?site=home");
    }
}
?>

<div class="content">
    <Form method="post" class="bordered">
        <label for="Password">Password</label>
        <br>
        <input name="Password" id="Password" type="password">
        <br>
        <button type="submit" style="margin-top: 50px;">Submit</button>
    </Form>
</div>