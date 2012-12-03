title: How JavaScript deals with classes with public and private functions
link: http://www.ahmednuaman.com/blog/how-javascript-deals-with-classes-with-public-and-private-functions/
creator: ahmed
description: 
post_id: 749
post_date: 2012-01-04 11:54:16
post_date_gmt: 2012-01-04 11:54:16
comment_status: open
post_name: how-javascript-deals-with-classes-with-public-and-private-functions
status: publish
post_type: post

# How JavaScript deals with classes with public and private functions

So we all know that JavaScript isn't really class based but how do we get around the issue of private functions? Firstly we should ask ourselves why the heck we need a private function? Well the answer is simple really: it's a simple way to stop people from messing up our applications. Take, for example: ` function doFoo() { //... } function onceFooIsDone() { //... } doFoo(); ` Let's imagine that the function 'doFoo()' shows some elements and requires the user to click on them or fill out a form before the user can continue. Let's then assume that when the user continues that the 'onceFooIsDone()' function is fired. There's nothing stopping the user whipping out their browser's console and firing the 'onceFooIsDone()' function thus bypassing anything that 'doFoo()' is supposed to do. Bummer. So, we get around this by having private functions, functions that can only be executed in the context of a constructor. For example, I'm working on a game that uses [EaselJS](http://easeljs.com/) and this is how I'm starting it: ` function Game(img, rx, ry) { var canvas = document.getElementById( 'c' ); var stage = new Stage( canvas ); this.ready = function() { if ( Touch.isSupported() ) { Touch.enable( s ); } loadImage(); } function loadImage() { console.log(img); } } var game = new Game( '500x500.png', 5, 5 ); game.ready(); ` You'll see that I define a variable 'game' with a new class of 'Game()'. Within game you see I declare 'canvas' and 'stage', these are private. If I wanted them to be public, I'd attach them to the constructor using the magic 'this'. And that brings me on to the ready function 'this.ready', this is publicly accessible but 'loadImage()' (just like the variables) isn't because it's not attached to the constructor and exists within its context. Arguably this isn't class based programming but it's the best it's gonna be for a while now.