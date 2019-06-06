***************************************************************
*  PHP TreeMenu 1.1 - Bjorge Dijkstra (bjorge@gmx.net)        *
***************************************************************


Files:
- index.html			
- about.html			
- demo.php			Demo menu
- demomenu.txt			Demo menu structure
- treemenu.inc			Main MenuTree code
- tree_*.gif			7 treemenu graphics
- readme.txt			This file



Requirements:
- Webserver with working PHP setup.


To see the demo:
- Unzip all files to a directory on your server
- Open index.html in your browser




General usage:

The menu structure file
-----------------------
First you need to create a menu structure file. This is a normal
text file (see demomenu.txt). The first line contains a single dot,
followed by the name of the root-item.
The following lines contain the menu items. Each line starts with
two or more dots to indicate the level in the tree. A level can't
be more than one level deeper than the previous one. Following the
dots come the item name, link and link target, seperated by a '|'.
If an item doesn't need to link to somewhere then the link and
target can be omitted. Item names can contain HTML code, 
for example you can put <b> tags around a name to make it bold or
you could even use images instead of text, there are all kinds of
possibilities.
An example menu will probably clarify a lot so here it is:

example menu:

.top
..category 1
...item 1.1|item11.html|main
...item 1.2|item12.html|main
..category 2
...sub category 2.1
....item 2.1.1|item211.html|main
....item 2.2.2


Using your menu
---------------
After you have created your menu file you need to create a new
php file. The most simple file would be something like this:

<html>
<body>

<?php  
  $treefile = "mymenu.txt";

  require "treemenu.inc"; 
?>

</body>
</html>


The $treefile variable indicates the filename of the menu
structure file. If no path is specified, it should be in the
same directory as this php script file.


And then...
-----------
Now save all the files in the same directory on your webserver,
and you're ready to go!



