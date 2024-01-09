<?
    require "config.php";
    require "classes/database.php";
    require "classes/user.php";

    $conn = require "inc/db.php";

    if($conn) {
        echo "Kết nối thành công <br />";
        $username = "abc";
        $password = "abc123";
        
        $rs = User::authenticate($conn, $username , $password);
        if($rs){
            echo "Đăng nhập thành công";

            //tạo sesion
            $_SESSION['id'] = "???";
            $_SESSION['user'] = $username;
        }else {
            die("Thông tin đăng nhập không đúng");
        }
    }
?>