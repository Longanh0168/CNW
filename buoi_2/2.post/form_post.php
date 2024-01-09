<?
    //Nhận thông tin từ index.php (GET)
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Kiểm tra password
    if($password == "abc123"){
        echo "Chào ! " . $hoten . " - " . $email;
    }else{
        echo "Đăng ký tk đê";
    }
?>