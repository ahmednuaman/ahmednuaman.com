title: Fun with Radio Buttons
link: http://www.ahmednuaman.com/blog/fun-with-radio-buttons/
creator: ahmed
description: 
post_id: 630
post_date: 2011-02-02 14:18:26
post_date_gmt: 2011-02-02 14:18:26
comment_status: open
post_name: fun-with-radio-buttons
status: publish
post_type: post

# Fun with Radio Buttons

The humble radio button is a bit, well boring...  Look at it, all round and what not; Why not have some fun with it? I've been working on a backend for a few clients of mine and thought I'll add some form to enhance the function of the humble radio button. So, where to begin? Well let's take some HTML like this: ` ![](1.jpg) ![](2.jpg) ![](3.jpg) ` So this gives us something like:  ![](http://ahmednuaman.com/blog/wp-content/uploads/2011/02/1.jpg) ![](http://ahmednuaman.com/blog/wp-content/uploads/2011/02/2.jpg) ![](http://ahmednuaman.com/blog/wp-content/uploads/2011/02/3.jpg) But this isn't very magical, so we apply some simple CSS: ` label { display: block; float: left; margin: 5px; cursor: pointer; } label input { display: none; } label img { border: 4px solid #ffffff; } label input:checked + img { border-color: #0080FF; } ` And this gives us something like: 

![](http://ahmednuaman.com/blog/wp-content/uploads/2011/02/1.jpg) ![](http://ahmednuaman.com/blog/wp-content/uploads/2011/02/2.jpg) ![](http://ahmednuaman.com/blog/wp-content/uploads/2011/02/3.jpg)

And with this you get all the features of the radio button but it looks much nicer!