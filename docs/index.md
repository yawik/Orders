# Orders

the orders module injects a billing address to to wizard for entering job postings. In addition it adds a storage for orders.
By submitting a job posting, an order is created. 
The order contains all relevant data needed for billings. In addition, the module adds an invoice formular, which can be added into the order
process. Default values of the invoice formular can be set in Settings/Orders.

Technically, the orders module offers the feature to take a snapshot of an entity.


## Requirements

a running YAWIK

## Installation

to install the [yawik/orders Module](https://github.com/yawik/Orders) into a running YAWIK, change into the `YAWIK/modules` directory and clone
the yawik/orders module.

```
 git clone https://github.com/yawik/Orders
```

To activate the module create a php file named ``WhateverYouWant.module.php`` in your config autoload directory containing:

```
 <?php
 return ['Orders'];
```



