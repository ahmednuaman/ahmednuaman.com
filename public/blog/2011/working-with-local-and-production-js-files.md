title: Working with local and production JS files
link: http://www.ahmednuaman.com/blog/working-with-local-and-production-js-files/
creator: ahmed
description: 
post_id: 736
post_date: 2011-12-26 17:34:21
post_date_gmt: 2011-12-26 17:34:21
comment_status: open
post_name: working-with-local-and-production-js-files
status: publish
post_type: post

# Working with local and production JS files

If you're like me and you enjoy compressing all your text based static files (such as CSS and JS) ready for production then I'm sure you've been in the pickle where you've wanted to use the local uncompressed files but also not need to edit anything before deployment. Well, here's a little bit of code I like to use, in this case it's been adapted for WordPress's footer: ` ` I'm very organised and I like to keep my theme directory like so: ` a_theme - index.php - style.css (this actually only contains the meta data, no CSS, just a linked to my compressed stuff) - more php files... - assets - - js - - - packaged.js (this is for the production and the **only** JS file uploaded) - - - more js files... - - css - - - styles.less (again this is watched by the [LESSCSS](http://www.google.co.uk/search?sourceid=chrome&ie=UTF-8&q=lesscss) daemon so it compresses as I save) - - - styles.css (this is the css file that the standard 'style.css' links to) - - image (you can guess what this is) ` And so on.