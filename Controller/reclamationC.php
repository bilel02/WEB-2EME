<?php
require_once('connection.php');

class Reclamation {
  private $id;
  private $name;
  private $familyName;
  private $email;
  private $category;
  private $reclamationText;
  
  private $conn;
  
  public function __construct() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reclamation_db";
    $this->conn = new mysqli($servername, $username, $password, $dbname);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }
  public function getId() {
    return $this->id;
  }
  
  public function setId($id) {
    $this->id = $id;
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function setName($name) {
    $this->name = $name;
  }
  
  public function getFamilyName() {
    return $this->familyName;
  }
  
  public function setFamilyName($familyName) {
    $this->familyName = $familyName;
  }
  
  public function getEmail() {
    return $this->email;
  }
  
  public function setEmail($email) {
    $this->email = $email;
  }
  
  public function getCategory() {
    return $this->category;
  }
  
  public function setCategory($category) {
    $this->category = $category;
  }
  
  public function getReclamationText() {
    return $this->reclamationText;
  }
  
  public function setReclamationText($reclamationText) {
    $this->reclamationText = $reclamationText;
  }

  public function updateReclamation($id, $name, $familyName, $email, $category, $reclamationText) {
    $date = date('Y-m-d H:i:s');
    $sql = "UPDATE reclamation SET name='$name', family_name='$familyName', email='$email', category='$category', reclamation_text='$reclamationText', updated_at='$date' WHERE id=$id";
    if ($this->conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $this->conn->error;
    }
}

  public function getReclamationsByEmail($email) {
    $sql = "SELECT * FROM reclamation WHERE email='$email'";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      $reclamations = array();
      while ($row = $result->fetch_assoc()) {
        $reclamations[] = $row;
      }
      return $reclamations;
    } else {
      return null;
    }
  }

  public function getReclamationById($id) {
    $sql = "SELECT * FROM reclamation WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
  
    if (!$result) {
      return null;
    }
  
    $reclamation = new Reclamation();
    $reclamation->setId($result['id']);
    $reclamation->setName($result['name']);
    $reclamation->setFamilyName($result['family_name']);
    $reclamation->setEmail($result['email']);
    $reclamation->setCategory($result['category']);
    $reclamation->setReclamationText($result['reclamation_text']);
  
    return $reclamation;
  }
  

  
  public function deleteReclamationById($id) {
    $sql = "DELETE FROM reclamation WHERE id='$id'";
    if ($this->conn->query($sql) === TRUE) {
      header('Location: suppPage.php');
    } else {
      echo "Error deleting record: " . $this->conn->error;
    }
  }

  
  
  public function getAllReclamations() {
    $sql = "SELECT * FROM reclamation";
    $result = $this->conn->query($sql);
    
    if ($result->num_rows > 0) {
      $reclamations = array();
      while ($row = $result->fetch_assoc()) {
        $reclamation = new Reclamation();
        $reclamation->setId($row['id']);
        $reclamation->setName($row['name']);
        $reclamation->setFamilyName($row['family_name']);
        $reclamation->setEmail($row['email']);
        $reclamation->setCategory($row['category']);
        $reclamation->setReclamationText($row['reclamation_text']);
        $reclamations[] = $reclamation;
      }
      return $reclamations;
    } else {
      return null;
    }
  }


  
  public function __destruct() {
    $this->conn->close();
  }
}

?>


