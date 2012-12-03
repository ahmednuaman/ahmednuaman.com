title: How to create a JavaScript class constructor
link: http://www.ahmednuaman.com/blog/how-to-create-a-javascript-class-constructor/
creator: ahmed
description: 
post_id: 758
post_date: 2012-01-05 20:06:07
post_date_gmt: 2012-01-05 20:06:07
comment_status: open
post_name: how-to-create-a-javascript-class-constructor
status: publish
post_type: post

# How to create a JavaScript class constructor

Now if you've been reading my blog posts I'm sure you'll be familiar with my rants regarding JavaScript's lack of class-based coding. I explained in this [blog post how you can write 'classes' in JavaScript](http://ahmednuaman.com/blog/how-javascript-deals-with-classes-with-public-and-private-functions/) but I omitted how to make use of the constructor. A constructor is useful because you're able to do this: ` new MyClass( 'foo' ); ` And this'll start things going. Normally in a class based language we make use of constructors by sticking them at the top of the class, however in JavaScript we need to tell the class to fire that function as it's called, like so: ` var MyClass = function(v) { function constructor() { document.write(v); } constructor(); }; new MyClass( 'foo' ); ` This will print 'foo' (or whatever the hell you pass into the class). So essentially there we've created a constructor. What about with callback functions like [jQuery's](http://jquery.com/) '[ready()](http://api.jquery.com/ready/)'? Well what we'd need to do is instead of firing the constructor function when the class is created we return the function ready for jQuery or your [respective JavaScript library of choice](http://www.google.co.uk/search?sourceid=chrome&ie=UTF-8&q=javascript+library) function to call its callback: ` var MyClass = function(v) { function constructor() { document.write(v); } return constructor; }; $( document ).ready( new MyClass( 'foo' ) ); ` And rejoice!