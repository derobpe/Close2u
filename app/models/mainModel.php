<?php
namespace app\models;

use PDO;
use PDOException;
use PDOStatement;

if (file_exists(__DIR__ . "/../../config/server.php")) {
    require_once __DIR__ . "/../../config/server.php";
}

class mainModel
{
    private $server = DB_SERVER;
    private $db = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;

    /**
     * Connect to the database
     * @return PDO
     */
    protected function connect()
    {
        try {
            $connexion = new PDO(
                "mysql:host=" . $this->server . ";dbname=" . $this->db . ";charset=utf8",
                $this->user,
                $this->pass
            );
            return $connexion;
        } catch (PDOException $e) {
            error_log("Connection error: " . $e->getMessage());
            die("Database connection failed. Please try again later.");
        }
    }

    /**
     * Run a query on the database
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    protected function runQuery($query)
    {
        try {
            $sql = $this->connect()->prepare($query);
            $sql->execute(); // TODO future: Use parameterized queries to prevent SQL injection
            return $sql;
        } catch (PDOException $e) {
            error_log("Query error: " . $e->getMessage());
            die("An error occurred while processing your request. Please try again later.");
        }
    }

    /**
     * Clean a string to prevent malicious content
     * Note: Use parameterized queries for SQL instead of relying solely on this.
     * @param string $string
     * @return string
     */
    public function clearString($string)
    {
        $words = [
            "<script>",
            "</script>",
            "<script src",
            "<script type=",
            "SELECT * FROM",
            "SELECT ",
            " DELETE ",
            "INSERT INTO",
            "DROP TABLE",
            "DROP DATABASE",
            "TRUNCATE TABLE",
            "SHOW TABLES",
            "SHOW DATABASES",
            "<?php",
            "?>",
            "--",
            "^",
            "<",
            ">",
            "==",
            "=",
            ";",
            "::"
        ];

        if (!is_null($string)) {
            $string = mb_convert_encoding($string, 'UTF-8', 'UTF-8');
        } else {
            error_log("Warning: Attempted to encode a null string to UTF-8.");
            $string = '';
        }

        $string = trim($string);
        $string = stripslashes($string);

        // Remove blacklisted words
        foreach ($words as $word) {
            $string = str_ireplace($word, "", $string);
        }

        // Final cleanup
        $string = trim($string);
        $string = stripslashes($string);

        return $string;
    }

    /**
     * Validates a string against a regular expression pattern.
     *
     * @param string $pattern The regular expression pattern to validate against.
     * @param string $input The string to be validated.
     * @return bool True if the input matches the pattern (valid), false otherwise.
     */
    protected function verifyData($pattern, $input)
    {
        // Validate the input against the pattern
        return preg_match("/^" . $pattern . "$/", $input) === 1;
    }

    protected function saveData($table, $data)
    {

        $query = "INSERT INTO $table(";
        $i = 0;
        foreach ($data as $key) {
            if ($i >= 1) {
                $query .= ",";
            }
            $query .= $key["name_field"];
            $c++;
        }
        $query .= ") VALUES(";
        $i = 0;
        foreach ($data as $key) {
            if ($i >= 1) {
                $query .= ",";
            }
            $query .= $key["marcador_field"];
            $c++;
        }
        $query .= ")";

        $sql = $this->connect()->prepare($query);

        foreach ($data as $key) {
            $sql->bindParam($key["marcador_field"], $key["name_value"]);
        }

        $sql->execute();

        return $sql;
    }
}
