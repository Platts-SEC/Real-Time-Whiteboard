<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('/Users/tylerlegge/sqlite3_data/test.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      INSERT INTO SAVE (ID,NAME)
      VALUES (1, 'Paul');

      INSERT INTO SAVE (ID,NAME)
      VALUES (2, 'Allen');

      INSERT INTO SAVE (ID,NAME)
      VALUES (3, 'Teddy');

      INSERT INTO SAVE (ID,NAME)
      VALUES (4, 'Mark');
EOF;
   header('Content-type: text/plain');
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
   $db->close();
?>