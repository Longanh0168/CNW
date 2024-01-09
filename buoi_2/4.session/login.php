<?
    require "init_session.php";
    $message = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "timduongdi" && $password == "abc123"){
            $_SESSION['id'] = '1';
            $_SESSION['name'] = 'username';
        }else {
            $message = "Invalid Username or Password";
        }
    }
    if(isset($_SESSION['id'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form name="frmLOGIN" action="" method="post">
        <fieldset>
            <div>
                <?
                    if($message != ""){
                        echo $message;
                    }
                ?>
            </div>

            <h3>Thông tin đăng nhập</h3>
            <p>
                <label for="username">User name: </label>
                <input name="username" id="username" type="text" placeholder="Nhập User Name">
            </p>
            <p>
                <label for="password">Password: </label>
                <input name="password" id="password" type="password" placeholder="Nhập password" >
            </p>
            <p>
                <input type="submit" value="Đăng nhập">
                <input type="reset" value="Hủy">
            </p>
        </fieldset>
    </form>
</body>
</html>