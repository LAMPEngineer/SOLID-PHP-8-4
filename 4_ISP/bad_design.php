<?php
/*
 * A large interfsce called `Worker` with methods for all kind of tasks:
 * `work`, `manageProject`, `writeCode`
 */
interface Worker
{
    public function work();
    public function manageProjects();
    public function writeCode();
}

/*
 * A `Developer` needs to `work` and `writeCode` but
 * does not manage projects. But still we are forcing
 * developer to implement manageProjects() method.
 *
 */
class Developer implements Worker
{
    public function work() : void
    {
        echo "Developer is working..." . PHP_EOL;
    }

    // Problem: Developer doesn't manage projects
    public function manageProjects() : Exception
    {
        throw new MyCustomException("Developer does't manage projects...");
    }

    public function writeCode() : void
    {
        echo "Developer is writing code..." . PHP_EOL;
    }

}

/*
 * A `Manager` needs to `work` and `manageProjects` but
 * does not write code. But still we are forcing manager
 * to implement writeCode() method.
 *
 */
class Manager implements Worker
{
    public function work() : void
    {
        echo "Manager is working..." . PHP_EOL;
    }

    public function manageProjects() : void
    {
        echo "Manager is managing projects..." . PHP_EOL;
    }

    // Problem: Manager doesn't write code
    public function writeCode() : Exception
    {
        throw new MyCustomException("Manager doesn't write code.");
    }

}

class MyCustomException extends Exception
{
    // You can add custom properties or methods here if needed
    public function __construct($message = "", $code = 0)
    {
        parent::__construct($message, $code);
    }
}


// Usages
$developer = new Developer();
$developer->work(); // works
$developer->writeCode(); // works
//$developer->manageProjects(); // don't work, throw exception


$manager = new Manager();
$manager->work(); // works
$manager->manageProjects(); // works
//$manager->writeCode(); // don't work, throw exception

