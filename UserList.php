<div class="content">
    <h1>Users</h1>
    <div id="userList">
        <?php
        require_once('User.php');
        $user1 = new User('Jakobeli', 6, 7);
        $user2 = new User('Hämpu', 8, 5);
        $user3 = new User('Jakobeli', 7, 8);

        $userArray = Array(
            $user1,
            $user2,
            $user3
        );

        foreach ($userArray as $user) {
            ?>
            <div id="singleUser">
                <?php
                echo $user->name;
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