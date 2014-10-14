phpMinimize()
=============

Minimize (Compress) HTML, XML, CSS and JS.

##Features:

* Written in well commented PHP.
* Removes white spaces from HTML, XML, CSS, JavaScript, you name it.
* Can be used to compress the whole output of a page by adding two lines of code to the beginning of the page.
* This project is very active and I'm always looking for ways to minimize and make this tool better.

##Usage:

###Minimize everything inside a PHP document:

```PHP
    <?php
    
    // Include phpMinimize()
    include "phpminimize.php";
    
    // Minimize the whole php output page.
    ob_start("phpMinimize");
    
    // The rest of your code below.
    
    ?>
    
    <!-- Your HTML Code Etc. -->
```

###Minimize from a variable:

```PHP
    <?php
    
    // Include phpMinimize()
    include "phpminimize.php";
    
    // Your variable
    $myVariable = <<<EOT
    
    <div    class   =   'badCoding'>
        This is an example of what this
        could do.
    </div>
    
    EOT;
    
    // Minimize the whole PHP output page.
    echo phpMinimize($myVariable);
    
    ?>
```

##Credits:

As for now, the credits for this project are being written inside the code as is created. Please, check ./phpminimize.php for details. They will be listed here soon. :octocat:
