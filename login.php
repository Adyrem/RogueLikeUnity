<?php

/**
 * Version 1.0
 * Created by Adrian Aeschlimann on 30.10.2018
 *
 * Version 1.1
 * Edited by Adrian Aeschlimann on 13.11.2018
 */

/**
 * Very basic login view
 *
 * We don't use usernames for the login, but only a global masterPW
 * this PWHash is defined in GLOBALS.php
 */

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