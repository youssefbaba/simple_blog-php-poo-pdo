<?php

require_once(dirname(__FILE__) . '/dbh-classe.php');

class Posts extends Dbh  
{

    public function getPost()
    {
      $connectionDb = $this->connect();

      if($connectionDb == null) {
          return;
      }
      
      $query = $connectionDb->query("SELECT *  FROM posts ");
      $data = $query->fetchAll(PDO::FETCH_ASSOC);

      $querry = null ;
      $connectionDb = null ;

      return $data ;
    

    }
    public function idetPostById($id)
    {
      $connectionDb = $this->connect();

      if($connectionDb == null) {
          return;
      }

      $requeteSql1 = "SELECT * FROM posts where id =:id ";

      $statement1 = $connectionDb->prepare($requeteSql1);

      $statement1->execute([
          ":id" => $id
      ]);

     $data= $statement1->fetch(PDO::FETCH_ASSOC); 
     $statement = null;
     $connectionDb = null;

     if (!$data) {
       echo "data not Found 404 " ;
     }
     return $data ;
      
    }



    public function addPost($title, $body ,$author) {

      $connectionDb = $this->connect();

      if($connectionDb == null) {
          return;
      }

      $requeteSql = "INSERT INTO posts (title , body , author ) VALUES (:title, :body, :author)";

      $statement = $connectionDb->prepare($requeteSql);

      $statement->execute([
          ":title" => $title,
          ":body" => $body,
          ":author" => $author,
          
      ]);

      //echo " <div  style='padding:20px ;background-color:yellow;' > Data Added Successfully </div> ";
      $statement = null;
      $connectionDb = null;


   }

   
  public function updatePost($id, $title, $body,$author) {
      
    $connectionDb = $this->connect();

    if($connectionDb == null) {
        return;
    }

    $requeteSql3 = "UPDATE posts SET title = :title, body = :body , author= :author  WHERE id = :id";

    $statement3 = $connectionDb->prepare($requeteSql3);

    $statement3->execute([
        ":id" => $id,
        ":title" => $title,
        ":body" => $body,
        ":author" => $author

    ]);
    //echo " <div  style='padding:20px ;background-color:yellow;' > Data Updated Successfully </div> ";
    $statement3 = null;
    $connectionDb = null;

    
}
public function deletPost($id) {
      
    $connectionDb = $this->connect();
  
    if($connectionDb== null) {
        return;
    }
  
    $requeteSql4 = "DELETE FROM posts WHERE id = :id";
  
    $statement4 = $connectionDb->prepare($requeteSql4);
  
    $statement4->execute([
        ":id" => $id
    ]);
    echo " <div  style='padding:20px ;background-color:yellow;' > Data Deleted Successfully </div> ";
    $statement4 = null;
    $connectionDb= null;
  }



}
