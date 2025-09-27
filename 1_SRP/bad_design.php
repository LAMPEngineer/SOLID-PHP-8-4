<?php
/*
 * In this demo code, the `User` class is doing multiple things.
 * It's responsible for managing user data as well as handling user persistence (save to a database).
 * If we need to change how users are saved (e.g., from MySQL to Oracle or MongoDB),
 * we have to modify the User class, which violates the SRP.
 */
class User
{

    // Constructor property promotion
    public function __construct(
            private string $name,
            private string $email
        ){}


    public function getName() : string
    {
        return $this->name;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    // Saving data into DB is vilotion of SRP
    public function saveToDatabase(): void
    {
        // Imagine database logic comes here
        echo 'Saving user ' . $this->name. ' data into db...' . PHP_EOL;

    }
}

// Usage
try {
    $user = new User(email: 'john@example.com', name: 'John'); //Named arguments

    $user->saveToDatabase();

} catch (\Throwable $th) {

    print $th->getMessage();
}

/* Output::

    Saving user John data into db...

*/