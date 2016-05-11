
# Lightboxes in Swordion

This folder defines what pages lightboxes are available on. It works in a very similar way to how the loadContent function works. They can appear on specific pages, specific templates, specific layouts or just be available across the whole site.

Providing a location string as the folder name under the pages folder (eg. "1-2-1" for page "?location=1-2-1") will make the lightboxes in that folder available specifically on that page.

If you want the lightbox to appear on every page using a particular template, give the folder the same name as the desired template and place it under the templates folder. (eg. name the folder "home" for the "home" template). Same goes for layouts.

If you want a lightbox to be available on every page, save it into the "constant" folder

You can then call on lightboxes by targeting them with hash tag links like this:

``````HTML
<a href="#lightbox__lightboxFileName">Link text</a>
``````

Basically, the folder determines what lightboxes are loaded onto the page and the file name is how the code knows what lightbox the link is targeting

##!!!!WARNING!!!

The Lightbox code is powered by Remodal. It's excellent at showing information popups but it's terrible for galleries as it loads up all the content of all the lightboxes all at once on first page load. Don't use this for Galleries!