<?php
/**
 * Connect to database
 */

function db() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "c3_s2";
    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        return $db;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}


/**
 * Create new student record
 */
function createStudent($value) {
    $db = db();
    $stmt = $db->prepare("INSERT INTO student (name, age, email, profile) VALUES (?, ?, ?, ?);");
    $stmt->bindValue(1, $value['name'], PDO::PARAM_STR);
    $stmt->bindValue(2, $value['age'], PDO::PARAM_INT);
    $stmt->bindValue(3, $value['email'], PDO::PARAM_STR);
    $stmt->bindValue(4, $value['profile'], PDO::PARAM_STR);
    $stmt->execute();
}

/**
 * Get all data from table student
 */
function selectAllStudents() {
    $db = db();
    $students = $db->query("SELECT * FROM student;");
    return $students;
}
/**
 * Get only one on record by id 
 */
function selectOnestudent($id) {
    $db = db();
    $sql = "SELECT * FROM student WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Delete student by id
 */
function deleteStudent($id) {
    $db = db();
    $sql = "DELETE FROM student WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("refresh:0.1;url=index.php");
}


/**
 * Update students
 * 
 */
function updateStudent($value) {
    $db = db();
    $stmt = $db->prepare("UPDATE student SET name = ?, age = ?, email = ?, profile = ? WHERE id = ?;");
    $stmt->bindValue(1, $value['name'], PDO::PARAM_STR);
    $stmt->bindValue(2, $value['age'], PDO::PARAM_INT);
    $stmt->bindValue(3, $value['email'], PDO::PARAM_STR);
    $stmt->bindValue(4, $value['profile'], PDO::PARAM_STR);
    $stmt->bindValue(5, $value['id'], PDO::PARAM_STR);
    $stmt->execute();
}

// <?php
/**
 * Connect to database
 */
// function db() {
//     $host     = 'localhost'; // Because MySQL is running on the same computer as the web server
//     $database = 'students'; // Name of the database you use (you need first to CREATE DATABASE in MySQL)
//     $user     = 'root'; // Default username to connect to MySQL is root
//     $password = 'mysql'; // Default password to connect to MySQL is empty
//     try {
//         $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
//         // set the PDO error mode to exception
//         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//       } catch(PDOException $e) {
//         echo "Connection failed: " . $e->getMessage();
//       }
//     return $db;
// }

// /**
//  * Create new student record
//  */
// function createStudent($value) {
//     $db = db();
//     $stmt = $db->prepare("INSERT INTO student (name, age, email, profile) VALUES (?, ?, ?, ?);");
//     $stmt->bindValue(1, $value['name'], PDO::PARAM_STR);
//     $stmt->bindValue(2, $value['age'], PDO::PARAM_INT);
//     $stmt->bindValue(3, $value['email'], PDO::PARAM_STR);
//     $stmt->bindValue(4, $value['profile'], PDO::PARAM_STR);
//     $stmt->execute();
// }

// /**
//  * Get all data from table student
//  */
// function selectAllStudents() {
//     $db = db();
//     $students = $db->query("SELECT * FROM student;");
//     return $students;
// }

// /**
//  * Get only one on record by id 
//  */
// function selectOnestudent($id) {
//     $db = db();
//     $sql = "SELECT * FROM student WHERE id = :id";
//     $stmt = $db->prepare($sql);
//     $stmt->bindParam(':id', $id);
//     $stmt->execute();
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $result;
// }

// /**
//  * Delete student by id
//  */
// function deleteStudent($id) {
//     $db = db();
//     $sql = "DELETE FROM student WHERE id = :id";
//     $stmt = $db->prepare($sql);
//     $stmt->bindParam(':id', $id);
//     $stmt->execute();
// }


// /**
//  * Update students
//  * 
//  */
// function updateStudent($firstName, $LastName) {
//     $db = db();
//     $sql = "UPDATE student SET name = :name";
//     $stmt = $db->prepare($sql);
//     $stmt->bindParam(':name', $firstName + $LastName);
//     $stmt->execute();
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $result;
// }
