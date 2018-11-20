<div class="content">
    <h1>Users</h1>
    <table>
        <tr>
            <td><a class="icon" href="index.php?site=UserList&func=download"><i class="fa fa-download"></i></a></td>
            <td><a class="icon" href="index.php?site=adduser"><i class="fa fa-plus"></i></a></td>
        </tr>
</table>
</div>
<div id="userList">
    <?php
    require_once('User.php');
    require_once('UserDAO.php');
    $userDAO = new UserDAO();

    if (isset($_GET['func']))
    {
        $func = $_GET['func'];
        if ($func == "add")
        {
            $userDAO->addRound($_GET['name']);
            header("Location: index.php?site=UserList");
        }
        elseif ($func == "rem")
        {
            $userDAO->deleteRound($_GET['name']);
            header("Location: index.php?site=UserList");
        }
        elseif ($func == "confirmDel")
        {
            echo "
            <script>
                if(confirm('Delete User?')) {
                location.href = " . "href='index.php?site=UserList&func=delete&name=".$_GET['name']."';
              }
            </script>
            ";
        }
        elseif ($func == "delete")
        {
            $userDAO->deleteUser($_GET['name']);
            header("Location: index.php?site=UserList");
        }
        elseif ($func == "download")
        {
            //https://stackoverflow.com/questions/22265472/how-to-download-a-file-from-specific-directory-using-php-header
            $file = 'data/users.txt';
            if (file_exists($file))
            {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                exit;
            }
        }
    }

    $userArray = $userDAO->readUsers();

    ?> <div class='content'> <?php
    foreach ($userArray as $user) {
        $name = $user->getName();
        ?>
        <table class='bordered'>
            <tr>
                <td style="width: 100%">
                    <?php echo $name ?>
                </td>
                <td><a <?php echo 'href="index.php?site=UserList&func=add&name='.$name.'"'; ?>><i class="fa fa-plus"></i></a></td>
                <td><a <?php echo 'href="index.php?site=UserList&func=remove&name='.$name.'"'; ?>><i class="fa fa-minus"></i></a></td>
                <td><a <?php echo 'href="index.php?site=UserList&func=confirmDel&name='.$name.'"'; ?>><i class="fa fa-trash"></i></td>
            </tr>
            <tr>
                <td>
                    <?php echo "Beer paid: ". $user->getbeerPaid(); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo "Beer consumed: ". $user->getbeerConsumed(); ?>
                </td>
            </tr>
        </table>
    <?php }?>
    </div>
</div>