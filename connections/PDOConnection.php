<?php


class Connect{
    
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $dbname = "health_management";
    //data source name
    public $connection;
    
	public function __construct(){
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;";
        $this->connection = new PDO($dsn, $this->user, $this->password);
        //default is fetch object
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		if (!$this->connection) {
			echo "Not Connected";
		} 
	}


}





//$stm = $connection->query("SELECT * FROM accountinformation");


// while($row = $stm->fetch(PDO::FETCH_ASSOC)) :

//     echo $row['name'];

// endwhile;

// while($row = $stm->fetch(PDO::FETCH_OBJ)) :

//     echo $row->name;

// endwhile;

// while($row = $stm->fetch()) :

//     echo $row->name;

// endwhile;

// positional parameters
// $sql = "SELECT * FROM accountinformation WHERE id = ?";
// $stmt = $connection->prepare($sql);
// $stmt->execute([1]);

// $user = $stmt->fetchAll();

// foreach($user as $users) {
//     echo $users->name;
// }

//name parameter
// $sql = "SELECT * FROM accountinformation WHERE id = :id";
// $stmt = $connection->prepare($sql);
// $stmt->execute(['id' => 1]);

// $user = $stmt->fetchAll(); // getting morethan one value
// $user = $stmt->fetch(); // getting one value
// $user = $stmt->rowCount(); // counting all output


// foreach($user as $users) {
//     echo $users->name;
// }


?>

