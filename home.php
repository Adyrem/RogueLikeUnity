<script>

    <?php

    /**
     * This is the main feature site.
     *
     * It contains the Big Red Button (B.R.B.)
     * The B.R.B. suggests the users in ascending order, ordered by the Beerfactor (Beer consumed / Beer paid)
     */

    require_once("UserDAO.php");
    $userDAO = new UserDAO();

    //accepted suggestion
    if (isset($_GET['name'])){
        $userDAO->addRound($_GET['name']);
        header("Location: index.php?site=UserList");
    }

    $userArray = $userDAO->readUsers();
    ?>

    //all users to js array
    let arr = <?php echo json_encode($userArray); ?>;


    let counter = 0;
    //get next name
    function showname(){
        document.getElementById("show").innerText = arr[counter].name;
        counter = counter==arr.length-1?0:counter+1;
        document.getElementById("confirmSelection").style.display = "block";
    }

    function confirmName() {
        let name = document.getElementById("show").innerText;
        location.href = "index.php?site=home&name=" + name;
    }

    //button animation
    function mdown() {
        document.getElementById("bigBtn").className = "down";
    }
    function mup(){
        document.getElementById("bigBtn").className = "up";
    }

</script>

<br style="height: 20px;">
<div class="content">
    <button id="bigBtn" onclick="showname()" onmousedown="mdown()" onmouseup="mup()"></button>
    <p id="show"></p>
    <!-- button is not displayed until big button is pressed -->
    <button onclick="confirmName()" id="confirmSelection" style="display: none;">OK</button>
</div>