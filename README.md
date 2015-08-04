# Swordion

A feature rich website framework that makes life easy for front end developers. It supports IE8+ and all major browsers.

The idea with Swordion is to use it as a base for building a new website on. You need everything for this thing to work.

##Why use Swordion?

###Encourages modular code

Swordion uses a combinaton of Grunt, PHP and SASS to greatly reduce the amount of busy work you need to do when building your website.

One of the main objectives of Swordion is to encourage writing modular code by taking the pain out of managing huge numbers of files. A large amount of functionality is handled by simply dropping files into folders. Swordion then links the file up for you automatically. Imagine being able to create a new lightbox by simply creating a new php file and saving it into a folder. Imagine creating a new SASS file, saving it and have it automatically link up with an @import rule for you straight away. Same thing happens with JS files. With the files linking up for you automatically, there is far less pain involved in writing modular code.

###[Extreamly powerful and easy to use SASS mixins](https://github.com/Dan503/Swordion/wiki/Swordion-SASS-mixins)

Writing SASS with Swordion is an absolute dream. The SASS mixins in Swordion are extremely powerful and have very simple syntax. You will be able to do far more complex css tasks than you could have ever managed to do with plain CSS or even other frameworks.

###[Start using Flexbox today!](https://github.com/Dan503/Swordion/wiki/The-grid-system)

The new flexbox CSS properties are amazing but with IE8 and 9 not supporting it, many developers are shying away from using it. Swordion uses it's own custom built grid system to harnesses the imense power of flexbox. It then has backups for browsers that don't support flexbox in the form of `display:table` and `float:left` depending on the circumstances.

###[A JS system that makes it easy to work with the BEM naming convention](https://github.com/Dan503/Swordion/wiki/The-JavaScript-system)

BEM is a pain in the ass to use with JS because of the long class names. Swordion uses a special system for JS that lets you use BEM in your HTML but have much shorter names in your javascript.

--------------------

##[Read the documentation](https://github.com/Dan503/Swordion/wiki)

The documentation for Swordion is incomplete however there are at least some aspects of the framework that are already covered in there.

---------------------

##Dependencies

- [Grunt](http://gruntjs.com/)
- [SASS](http://sass-lang.com/)
- [A local PHP server](https://github.com/Dan503/Swordion/wiki/Getting-started#local-php-server)
- [Image Magik](http://www.imagemagick.org/script/binary-releases.php)

(Read the [Getting Started](https://github.com/Dan503/Swordion/wiki/Getting-started) portion of the Swordion documentation to help get yourself set up)

--------------------

##Please note

The documentation (and this whole thing in general) is a **work in progress**. I also like to experiment with new ideas often in an attempt to improve the functionality. This often leads to drastic changes in how the kit works.
