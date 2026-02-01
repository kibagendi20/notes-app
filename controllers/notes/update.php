<?php

    use Core\Database;
    use Core\App;
    use Core\Validator;

    $db = App::resolve(Database::class);


    
    $note = $db -> query('select * from notes where id = :id', ['id' => $_POST['id']]) -> findOrFail();
      
    authorize($note['user_id'] == 1);

    $errors = [];

 
   if (! strlen(Validator::string($_POST['body'], 1, 100)) ) {
      $errors['body'] = "A body with not more that 1,000 characters is required";
   }

   if (count($errors)) {
        return view('notes/edit.view/php', [
            'heading' => 'Eidt Note',
            'errors' => $errors,
            'note' => $note,

        ]);
   }



   $db -> query('UPDATE notes set body = :body where id = :id',[
    'id' => $_POST['id'],
    'body' => $_POST['body']
   ]);

   header('location: /notes');
   die();