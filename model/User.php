<?php
include '../util/MySQLUtil.php';
class User
{

    private $username;
    private $password;


    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function __destruct()
    {
        $this->username = "";
        $this->password = "";
    }

    public function showInfo()
    {
        echo $this->username . " " . $this->password;
    }
    public function getuser()
    {
        return $this->username;
    }
    public function setuser($username)
    {
        $this->username = $username;
    }

    public function getpassword()
    {
        return $this->password;
    }
    public function setpassword()
    {
        return $this->password;
    }
    public function insertUser()
    {
        $mysql = new MySQLUtil();

        $data = [
            'name' => $this->username,
            'pass' => $this->password,

        ];

        $sql = "INSERT INTO user (username, password) VALUES (:name, :pass)";
        $mysql->insertData($sql, $data);
    }

    public function getUsers($username)
    {
        $mysql = new MySQLUtil();
        $query = "select * from user where username = :username";
        $data = ['username' => $username];

        return $mysql->getData($query, $data);
    }

    public function deleteUser()
    {
        $mysql = new MySQLUtil();
        $pdo = $mysql->connected();
        if ($pdo != null) {
            $data = [
                'name' => $this->username,
                'pass' => $this->password,
            ];
            $sql = "DELETE FROM user WHERE password = :pass AND username = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
        }
        echo "Cúc";
    }
}
