<?
    class Book{
        private $id;
        private $title;
        private $description;
        private $author;
        private $imagefile;

        public function __construct($title, $description, $author, $imagefile)
        {
            $this->title = $title;
            $this->description = $description;
            $this->author = $author;
            $this->imagefile = $imagefile;
        }

        // phương thức nhập dữ liệu
        protected function validate(){
            $rs = $this->title && $this->description && $this->author && $this->imagefile ;
            return $rs;
        }

        public function addBook($conn) {
            if($this->validate()){
                $sql = "insert into books(title, description, author, imagefile) values(:title, :description, :author, :imagefile);";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":title", $this->title, PDO::PARAM_STR);
                $stmt->bindValue(":description", $this->description, PDO::PARAM_STR);
                $stmt->bindValue(":author", $this->author, PDO::PARAM_STR);
                $stmt->bindValue(":imagefile", $this->imagefile, PDO::PARAM_STR);

                return $stmt->execute();
            }else {
                return false;
            }
            
        }

        public function getAll ($conn){
            try {
                $sql = "select* from books;";
                $stmt = $conn->prepare($sql);
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
                $stmt->execute();
                $books = $stmt->fetch();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function getByID ($conn, $id){
            try {
                $sql = "select* from books where id=:id;";
                $stmt = $conn->prepare($sql);
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $books = $stmt->fetch();
                
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function update ($conn, $book){
        }

        public function updateImage ($conn, $id, $imagefile){
        }

        public function delete ($conn){
        }

        public function deleteByID ($conn, $id){
        }
        
    }
?>