<?
    // require "config.php";
    // require "classes/database.php";
    // require "classes/user.php";

    require "inc/init.php";

    

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username != "" && $password != ""){
            $conn = require "inc/db.php";
            // tạo 1 user
            $user = new User($username, $password);
    
            try {
                if($user->addUser($conn)){
                    echo "Added user successfully"; 
                } else {
                    echo "Cannot Add User !";
                };
            } catch (PDOException $e) {
                echo $e->getMessage();
                // xử lý lỗi ở đây
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Books Store</title>
</head>
<body>
    <h2>Add New User</h2>
    <form name="frmADDUSER" method="post">
        <fieldset>
            <legend>User Information</legend>
            <p>
                <label for="username">User name:</label>
                <input name="username" id="username" type="text" placeholder="User name">
            </p>
            <p>
                <label for="password">Password: </label>
                <input name="password" id="password" type="password" placeholder="Password" >
            </p>
            <p>
                <input type="submit" value="save">
                <input type="reset" value="Hủy">
            </p>
        </fieldset>
    </form>
</body>
</html>