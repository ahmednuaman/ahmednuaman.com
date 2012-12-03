title: Excluding Mac's Hidden Files
link: http://www.ahmednuaman.com/blog/excluding-macs-hidden-files/
creator: ahmed
description: 
post_id: 156
post_date: 2009-06-06 17:10:59
post_date_gmt: 2009-06-06 17:10:59
comment_status: open
post_name: excluding-macs-hidden-files
status: publish
post_type: post

# Excluding Mac's Hidden Files

Every now and then you'll need to compress files. When it comes to creating new web projects where I'm using frameworks, I find it much faster to compress the base framework and upload that to my server rather than uploading each file individually. Since I'm on a Mac, I had hidden files. So, if I simply OS X's built in archiver, I'm left with a load of .DS_Store and hidden files, and that's not nice. So I've been looking at the best ways I can compress folders and files and exclude all those nasty hidden files I don't want to be on my server. One of the beauties of using OS X is that it's built on Unix so we've got lots of open source goodies already built it. So after doing some research and lots of trial and error, I came up with a simple bash command that'll compress a directory and exclude all the hidden files using "[zip](http://developer.apple.com/documentation/Darwin/Reference/ManPages/man1/zip.1.html)": ` $ zip -r ARCHIVE_NAME.zip FOLDER_NAME -x \.* ` So that's fair enough, but I'd want to use it in a more practical way, like a droplet, so here comes [Automator](http://www.apple.com/macosx/features/300.html#automator). Automator allows us to create a simple workflow in a nice interface, so let's create one. The workflow will simply get the selected finder items and then run our bash script, so open up automator and drag "Get Selected Finder Items" into the workflow: 

![Automator Screenshot](http://ahmednuaman.com/blog/wp-content/uploads/2009/06/automator_screenshot1.jpg)

Next thing is to drag in "Run Shell Script" command into the workflow. Make sure that you're passing input "as arguments": 

![Automator Screenshot 2](http://ahmednuaman.com/blog/wp-content/uploads/2009/06/automator_screenshot2.jpg)

Now we need to replace the bash script so that we can pass in the files/folders selected to our bash script. And we also need to make sure that we save our zip file in the same folder as our selected files, so take this script and paste it into your bash script workflow: ` zip -r ${1%/*}/Archive.zip "$@" -x \.* ` Automator passes the files/folders to our bash script workflow as the variable "$@", this is an array by the way. So the first thing we need to do is determine where the zipped archive will be sold, so we take the first entry of the array and we do some [substring removal](http://tldp.org/LDP/abs/html/string-manipulation.html). This means that we get the directory of the first item and that's where we're going to save our zipped folder. Now finally, just simple save the workflow as an application and you can then just drag and drop files/folders on to it and hey presto, no more hidden files! PS, it's very handy to stick it in the Finder window's header, like so: 

![Automator Screenshot 3](http://ahmednuaman.com/blog/wp-content/uploads/2009/06/automator_screenshot3.jpg)