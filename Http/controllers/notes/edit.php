<?php
   use Core\Database;
    use Core\App;
    $db = App::resolve(Database::class);


    
    $note = $db -> query('select * from notes where id = :id', ['id' => $_GET['id']]) -> findOrFail();
      
    authorize($note['user_id'] == 1);


    // $heading = "Note";

    // require "views/notes/show.view.php"; 
        view("notes/edit.view.php", [
        'heading' => "Edit Note",
        'errors'=>[],
        'note' => $note,
    ]);
