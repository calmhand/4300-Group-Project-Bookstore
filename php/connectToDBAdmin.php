<?php
    // sets the parameters to connect to the database for this site.
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASS', '');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'NovelReads');
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // test if a connection to the database has been made
    // disclaimer: an error handler will be implemented later.
    if ($conn->ping()) {
        // printf ("Our connection is ok!\n");
    } else {
        printf ("Error: %s\n", $conn->error); 
    }
?>

<?php
class NovelConnection {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "NovelReads";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connect();
	}
	
	function connect() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if (!empty($resultset))
			return $resultset;
	}

    	function executeSingleQuery($query) {
		mysqli_query($this->conn,$query);
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>
