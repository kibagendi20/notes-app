<?php

use Core\Validator;
use Core\App;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

//validate the form inputs

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a passowrd of at leat 7 characters.';

}

 if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
 }

 $db = App::resolve(Database::class);



$result = $db->query('select * from user where email = :email',[
    'email'=> $email
])->find();
//check if the account already exists
if ($result)  {

//then someone with that email already exists and has an account
    //If yes, redirect to login page;
    header('location: /');
} else {
            //If not, save one to the database, and then log the user in, and redirect.
            $db->query('INSERT INTO user(email,password) VALUES(:email, :password)', [
                'email' => $email,
                'password'=> password_hash($password, PASSWORD_DEFAULT)
            ]); 

            //mark that user has logged in
            login([
                'email' => $email,
            ]);
            
            header('location: /');
            exit();

}


