# 2. Open Close Principle (OCP)

This principle states that software entities (classes, modules, functions, etc.) should be open for extension, but close for modification. This means we should be able to add new functionality without changing the existing working code. 

## In an easy way to understand
Think of it like building a house. We want the foundation and walls (our existing code) to be stable and finished. We don't want to have tear down a wall every time we want to add a new room or different type of window. Instead, we should be able to extend the house by building a new room or installing a different kind of window without altering the original structure.

This principle is generally achieved by using abstractions like `interfaces` or `abstract classes`. By programming to an interface, we can introduce new implementation without changing the code that uses the interface.

## Code Demo
In the code demo I have created two designs to understand this principle:

1. Bad Design (bad_design.php): In this example a class is generating reports in multiple formats and the calss is not closed for modification. We need to modify this class each time when a new format is introduced.

2. Good Design (good_desgn.php): To fix issues in the `Bad Design` example, I used `interface` that defines a contract for all report generators. This makes our code open for extension. To add a new format, we just extend the functionality without modifying existing code.