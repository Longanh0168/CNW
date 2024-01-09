<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minh họa method POST</title>
</head>
<body>
    <h1>Lớp CT06N - Lập trình web với PHP</h1>
    <form name="frmPOST" action="form_post.php" method="post">
        <fieldset>
            <legend>Thông tin người dùng</legend>
            <p>
                <label for="hoten">Họ tên: </label>
                <input name="hoten" id="hoten" type="text" placeholder="Nhập họ tên">
            </p>
            <p>
                <label for="email">Email: </label>
                <input name="email" id="email" type="email" placeholder="Nhập Email">
            </p>
            <p>
                <label for="password">Password: </label>
                <input name="password" id="password" type="password" placeholder="Nhập password" >
            </p>
            <p>
                <input type="submit" value="Lưu">
                <input type="reset" value="Hủy">
            </p>
        </fieldset>
    </form>
</body>
</html>