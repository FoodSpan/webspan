# WebSpan

WebSpan is a companion app to [FoodSpan](http://matthewwang.me/foodspan/). This repository contains the code for the WebSpan Web Application, as well as a setup script to make your own backend database.

This web application is still a huge work-in-progress, and is definitely not production ready! As such, be wary using our code/software, as it might be super buggy. If it is, please let us know on our issues tracker!

## Resources

Here's a list of all the awesome resources we've used to make this WebSpan app possible!

* Git and GitHub
* MAMP and WAMP Installation Servers
* DigitalOcean LAMP-based Webserver (to host final Web Application)
* [jQuery](https://jquery.com/) JavaScript Library
* [Bootstrap](http://getbootstrap.com) HTML/CSS/JS Framework
* [Material Kit Bootstrap Theme](http://www.creative-tim.com/product/material-kit)
* [Font Awesome](http://fontawesome.io) Font Icon Toolkit
* [Google Material Icons](https://design.google.com/icons/)
* [Moment](https://github.com/moment/moment) JavaScript Date Library
* [Animate.css](https://github.com/daneden/animate.css) CSS Animation Library
* [Roboto](https://fonts.google.com/specimen/Roboto) and [Roboto Slab](https://fonts.google.com/specimen/Roboto+Slab) Fonts
* In-house graphic designs

## Setup

In order to run the WebSpan app locally, you'll need a few things.

* A MySQL server, to store and access the information used in the web application
* A PHP/Apache server stack, to run the PHP code that's used in the WebApp
* [Git](https://git-scm.com/), to clone this repository
* A Browser, to view the website of course!

To download this repository, just type this in your command line:

```
git clone https://github.com/FoodSpan/webspan.git
```

### Server Installations

You can get a MySQL server + PHP/Apache Server, all bundled in one, using some packages. Which one you'll use depends on your Operating System.

* Windows: [WAMP](http://www.wampserver.com/en/)
* Mac: [MAMP](https://www.mamp.info/en/)
* Linux: While there isn't a dedicated bundle installer, you can follow [these steps](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu) to get LAMP running.

After you're done that, we need to configure our MySQL Database. Luckily, we've done most of the work for you. You need to do **two things**.

### 1. Change the root password in common.php

In `common.php`, there's a section of code that looks like this:

```php

$username = "root";
$password = "";
$host = "localhost";
$dbname = "webspan";

```

Ensure that your variables look like that. Then, we're going to change the `$password` string to "root".

It should now look like this:

```php

$username = "root";
$password = "root";
$host = "localhost";
$dbname = "webspan";

```

### 2. Run the MySQL Setup Script

Now, you can run your WAMP/LAMP/MAMP configuration. Included in this repository is a file named `webspan.sql`. Running this SQL script sets up all the Databases and Tables you'll need to run WebSpan locally.

### Conclusion

Once you're done these two steps, simply visit wherever the WebSpan repository was placed (we recommend placing the repository in your webroot, which depends on the server installation you use). And ta-da, you have your own working version of the WebSpan app! Of course, you'll need to hack your own FoodSpan Control Panel to interact with WebSpan. If you have any problems, please let us know on our issue tracker.
