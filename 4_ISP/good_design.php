
<?php
/*
 * To solve ISP issues in bad design, we segregate the large interface
 * into smaller, more specific ones.
 */
interface Workable
{
    public function work();
}

interface Manageable
{
    public function mangeProjects();
}

interface Codeable
{
    public function writeCode();
}

/*
 * Now, Developer class only implement the interfaces they need:
 * Workable and Codeable
 *
 */
class Developer implements Workable, Codeable
{
    public function work() : void
    {
        echo "Developer is working..." . PHP_EOL;
    }

    public function writeCode()
    {
        echo "Developer is writhing code..." . PHP_EOL;
    }
}

/*
 * And, Manager class only implement the interfaces they need:
 * Workable and Manageable
 *
 */
class Manager implements Workable, Manageable
{
    public function work() : void
    {
        echo "Manager is working..." . PHP_EOL;
    }

    public function mangeProjects()
    {
        echo "Manager is managing projects..." . PHP_EOL;
    }
}

// Usages
$developer = new Developer();
$developer->work();
$developer->writeCode(); // works

$manager = new Manager();
$manager->work();
$manager->mangeProjects(); // works
