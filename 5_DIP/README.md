# 5. Dependency Inversion Principle (DIP)
This principle states that:

1. High-level modules (business logis) should not depend on low-level modules (details like database, APIs, ect.). Both should depend on abstractions (Interfaces).

2. Abstractions should not depend on details. Details should depend on abstractions.


## In an easy way to understand
Imagine a simple system with a light switch and a light bulb.

A light switch is hardwired to a specific brand of light bulb. If the bulb burns out or we want to switch to a different type of lighting (e.g., an LED), we have to rip out and replace the entire switch and its wiring. The high-level module (the switch) is tightly dependent on the low-level module (the specific bulb). The Bad Way (Violation of DIP).

A light switch is connected to a generic "light interface". The light bulb also implements this interface. We can now use any kind of light bulb—from an incandescent bulb to an LED—as long as it fits the same "light interface" contract. The switch and the bulb are decoupled, and both depend on the abstract idea of a "light", not on each other. The Good Way (Following DIP).


## Real World Code Demo
In the code demo I have created two designs to understand this principle:

1. Bad Design ([bad_design.php](bad_design.php/)): In this example, High-level module `NotificationService` is directly depends on concrete classes - `EmailSender` & `SMSSender`. If we want to add a new `PushSender`, we have to modify high level module.

2. Good Design ([good_desgn.php](good_design.php/)): To fix issues in the `Bad Design` example, I introduce an abstraction: a `MessageSender` interface. Now, `NotificationService` depends on the interface (abstraction), not the concrete classes. We easily add new senders - `PushSender` without touching `NotificationService`.