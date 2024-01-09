<?
    // giống import
    require "init_session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>
<body>
    <h2>You are access: <? echo $_SESSION['counter']; ?> time(s)</h2>
    <? if(isset($_SESSION['name'])): ?>
        <h2>
            welcome
            <? echo $_SESSION['name']; ?>
        </h2>
        Click here to <a href="logout.php">Logout</a>
    <? else : ?>
        <h2>
            Vui lòng đăng nhập
            <? echo $_SESSION['name']; ?>
        </h2>
        Click here to <a href="login.php">Login</a>
    <? endif; ?>
</body>
</html>