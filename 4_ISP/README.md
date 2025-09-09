# 4. Interface Segregation Principle (ISP)
This principle states that a client shouldn't be forced to depend on interfaces they don't use. Simply put, it's better to have many specific interfaces rather than one large, a general-purpose interface.


## In an easy way to understand
Imagine a single "universal" remote for your entire house that controls your TV, lights, sound system, and even the microwave. You only want to control your lights, but the remote still has buttons for cooking and brewing coffee, which are irrelevant and confusing for your goal.

A better design would be to have a separate, small remote for your TV, a different one for your lights, and another for your music system. Each remote has only the buttons you need for its specific device, making it much simpler and more efficient.



## Code Demo
Imagine you have a single, large interface called `Worker` with methods for all kind of tasks: `work`, `manageProject`, `writeCode`. 

Now, let's say we have two types of workers: a `Developer` and `Manager`. 

A `Developer` needs to `work` and `writeCode`. A `Manager` needs to `work` and `manageProjects`.

If both classes implement the `Worker` interface, they are forced to implement methods they don't need. The `Developer` has to implement manageProjects(), and the `Manager` has to implement writeCode(), which makes no sense and leads to a fat interface.

To solve this, we segregate the large interface into smaller, more speific ones. Instead on one `Worker` interface, we create:

1. `Workable`  : for things that can work.
2. `Manageable`: for things that can manage project.
3. `Codeable`  : for things that can write code.
 
 In this way, classes only implement the interfaces they need. It ensures that no class is forced 
 to implement methods that are irrelevant to its purpose.

In the code demo I have created two designs to understand this principle:

1. Bad Design (bad_design.php): In this example, there is a fat interfase `Worker` has a manageProject() which is not suitable for `Developer` and a writeCode() method that is not suitable for `Manager`.

2. Good Design (good_desgn.php): To fix issues in the `Bad Design` example, I segregate the large interface into smaller, more specific ones. 

Now our classes does not breaks ISP.