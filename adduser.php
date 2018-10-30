<?php
if (isset($_POST['Name'])) {

    //DAO.addUser($_POST['Name']);

    header("Location: index.php?site=home");

}
?>

<div class="content">
    <Form method="post">
        <label for="Name">Benutzername</label>
        <br>
        <input name="Name" id="Name" type="text">
        <br>
        <button type="submit" style="margin-top: 50px;">Submit</button>
    </Form>
</div

