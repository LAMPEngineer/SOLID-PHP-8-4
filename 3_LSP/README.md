# 3. Liskov Subsitution Principle (LSP)
This principle states that if we have a parent class and child classes, we should be able to use any child class wherever we use the parent class without breaking our program.

If we have a class B that is a subtype of class A, then we should be able to replace object of type B without breaking the application. In simple term, a subclass should be able to stand in for its parent class.

## In an easy way to understand
If we have a "Bird" class and create "Eagle" and "Penguin" subclasses, both should work wherever "Bird" is expected - but if "Bird" has a fly() method, "Penguin" would break this principle since penguin can't fly, which would violet the LSP because we cannot substitute a Penguin object for a Bird object without causing an issue (e.g, throwing an error or having unexpected behavior). 

A better design would be to have a more general "Bird" class without the fly() method, and create an interface like canFly() that "Eagle" can implement.


## Real World Code Demo
In the code demo I have created two designs to understand this principle:

1. Bad Design ([bad_design.php](bad_design.php/)): In this example, a parent class "PaymentMethod" has a refund() method. It's one child class "CashOnDelivery" breaks this rule because we can't expect refund from CashOnDelivery.

2. Good Design ([good_desgn.php](good_design.php/)): To fix issues in the `Bad Design` example, I splitted responsibilities into the different abstractions -  "PaymentMethod" and "RefundablePaymentMethod". 
Now our CashOnDelivery class does not breaks LSP.