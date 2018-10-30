<div class="content">
    <h1>Users</h1>
    <div id="userList">
        <?php

        $userArr = Array(
            $user1 = "Hans Peter",
            $user2 = "Kohan Kobeli",
            $user1 = "Jimbob Queedudle"
        );

        foreach ($userArr as $user) {
            ?>
            <div id="singleUser">
                <?php
                echo $user;
                ?>
            </div>

            <?php
        }

        class UserList
        {
        }

        ?>
    </div>
</div>