 <?php

 use Core\Validator;
 use Core\Database;
 use Core\App;

 $db = App::resolve(Database::class);



$errors = [];

 
   if (! strlen(Validator::string($_POST['body'], 1, 100)) ) {
      $errors['body'] = "A body with not more that 1,000 characters is required";
   }

   if (! empty($errors)) {
    view("notes/create.view.php", [
        'heading' => "Create Notes",
        'errors' => $errors,
    ]);
   }

   
   $db -> query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
      'body' => $_POST['body'],
      'user_id' => 1
   ]);
     
   header('location: /notes');
   die();