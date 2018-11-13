<?php
if (isset($_POST['Name'])) {

    require_once("UserDAO.php");
    $userDAO = new UserDAO();
    $userDAO->addUser($_POST['Name']);

    header("Location: index.php?site=UserList");
}
?>

<div class="content">
    <Form method="post" class="bordered">
        <label for="Name">Username</label>
        <br>
        <input name="Name" id="Name" type="text">
        <br>
        <button type="submit" style="margin-top: 50px;">Submit</button>
    </Form>
</div

