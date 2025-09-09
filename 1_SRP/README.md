# 1. Single Responsibility Principle (SRP)
This principle states that a class or module should have only a single, well-defined responsibility. It's aim is to make software easier to understand, maintain and extend.

## In an easy way to understand
We could think this principle like `Swiss Army knife` vs. a `dedicated toolset`. A Swiss Army knife has a lot of functions, but if we need to fix a broken blade, we have to deal with the entire tool. A dedicated toolset, on the other hand, has separate tools for each job—a hammer for hammering, a screwdriver for screwing, and so on. If our screwdriver breaks, we only need to replace the screwdriver, not the entire set. SRP promotes the dedicated toolset approach.

## Code Demo
In the code demo I have created two designs to understand this principle:

1. Bad Design (bad_design.php): In this example a class is doning multiple things apart from its own responsibility.

2. Good Design (good_desgn.php): To fix issues in the `Bad Design` example, I separate the responsibilities into multiple classes that make it easier to maintain and extend. 