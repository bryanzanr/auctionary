<?php
class DBConnection {
  var $conn;

  /*
    Ini constructornya, nanti idupin kayak ngidupin objek java
    argumennya nama db lu, username psql lu, sama password psql lu
    wkwkwkwkwk
  */
  function DBConnection($dbname, $username, $password) {
    $this->conn = pg_connect(
                      "host='localhost'
                       port='5432'
                       dbname='$dbname'
                       user='$username'
                       password='$password'") or
                    die ("Unable to connect to database");
  }
}
?>
