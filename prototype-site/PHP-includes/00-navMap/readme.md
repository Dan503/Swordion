This folder holds the structure of the navigation for the site and determines what pages get what templates.

It has been spilt into sperate files holding the navigation for each of the main content segments. The file name isn't important other than the number. The number dictates the order that the nav appears in.

The only required attribute to be provided in the navmap for a page is the title attribute which sets what the h1 heading for a page should be.

## list of all current attributes:

````````````````
'title' => [string] title of the page [required]
'link' => [string/array] override the link destination for navigation items that lead to this page (see more below)
'subnav' => [array] sub navigation for a page
'template' => [string] template for this exact page
'subTemplate' => [string] template for all direct sub pages of a page
'subNavigable' => [boolean] determines if the sub nav for this item will appear in navigation
'isNavigable' => [boolean] determines if this exact item will appear in navigation
````````````

## Important things to know about 'link'

- the links are automatically generated which means that, for the most part, you don't need to worry about linking up navigation items to one another
- links can be overridden in the following ways
    - `'link' => 'http://www.google.com',//using a string for external links`
    - `'link' => ['target page title that can be at any depth as long as it is unique']`
	- `'link' => ['parent page title to add extra specificity', 'target page that is not unique']`
	- `'link' => [0, 'target page that is not unique', 2], //you can use any mixture of index values and titles`
- Defaults for the nav map can be set in the navMap__defaults.php config file
- the links set as arrays I am calling search arrays