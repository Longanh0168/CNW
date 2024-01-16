<?
    class User{
        public $id;
        public $username;
        public $password;

        // phương thức khởi tạo
        public function __construct($username, $password)
        {
            $this->username = $username;
            $this->password = $password;
        }

        // phương thức chứng thực
        // So khớp password trên DB vơi password người dùng cung cấp 

        public static function authenticate($conn, $username, $password){
            $sql = "select * from users where username=:username";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $stmt->execute();
            $user = $stmt->fetch();
            if($user){
                $hash = $user->password;
                return password_verify($password, $hash);
            }
        }

        // phương thức nhập dữ liệu
        protected function validate(){
            $rs = $this->username != "" && $this->password !="";
            return $rs;
        }

        public function addUser($conn){
            if($this->validate()){
                $sql = "insert into users(username, password) values(:username, :password);";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":username", $this->username, PDO::PARAM_STR);
                $hash = password_hash($this->password, PASSWORD_DEFAULT);
                $stmt->bindValue(":password", $hash, PDO::PARAM_STR);
                
                return $stmt->execute();
            }else {
                return false;
            }
        }
    }
?>