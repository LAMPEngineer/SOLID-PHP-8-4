<?php
/* 
 *  To follow SRP, we seperate the responsibilities.
 *  Now, if the database logic needs to change, we only need to modify 
 *  the UserRepository class, leaving the User class untouched.
 */


/* 
 * The User class is now only responsible for representing a user. 
 */
class User
{

    // Constructor property promotion 
    public function __construct(private string $name, private string $email)
    {}


    public function getName() : string
    {
        return $this->name;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

}

/* 
 * The UserRepository class is responsible to handle the persistence of user data. 
 */
class UserRepository
{
    public function save(User $user) : void
    {
        echo 'Saving user ' . $user->getName() . " data into db. \n";
        // Imagine complex database logic comes here

    }
}


// Usage
$user = new User(name: 'John', email: 'john@example.com'); //Named arguments

$userRepository = new UserRepository();

$userRepository->save($user); // dependency injection