title: Dealing with EaselJS's SpriteSheet fail
link: http://www.ahmednuaman.com/blog/dealing-with-easeljss-spritesheet-fail/
creator: ahmed
description: 
post_id: 752
post_date: 2012-01-04 20:24:48
post_date_gmt: 2012-01-04 20:24:48
comment_status: open
post_name: dealing-with-easeljss-spritesheet-fail
status: publish
post_type: post

# Dealing with EaselJS's SpriteSheet fail

Maybe it's just me but I had an issue earlier today where the [SpriteSheet](http://easeljs.com/docs/SpriteSheet.html) class of [EaselJS](http://easeljs.com/) wasn't returning the correct frames. After a lot of Googling, starting a thread on [Stackoverflow](http://stackoverflow.com/questions/8728341/easeljs-and-spritesheet) and reading the [source code of the library](http://easeljs.com/docs/SpriteSheet.js.html) I decided to do a workaround: all I needed to do was to simply take an image and divide it into tiles. So what I had before was: ` function handleImageLoaded(e) { var c = new Container(); var d = { }; var l = rx * ry; var lx = 0; var ly = 0; var m = Math.floor( l / 2 ); var f; var s; var t; master = new Bitmap( e.target ); master.alpha = .1; c.addChild( master ); d.images = [ e.target ]; d.frames = { width: lw, height: lh, count: l }; s = new SpriteSheet( d ); tiles = [ ]; for ( var i = 0; i < l; i++ ) { t = new Bitmap( s.getFrame( i ).image ); tiles.push( t ); } } ` According to the EaselJS docs this would then split up the sprite into frames that I can then access. After looking through the code and doing lots of debugging I couldn't work out what was going wrong. So then I looked at using the [SpriteSheetUtils](http://easeljs.com/docs/SpriteSheetUtils.html) static class by simply replacing the following: ` new Bitmap( s.getFrame( i ).image ); ` With... ` new Bitmap( SpriteSheetUtils.extractFrame( s, i ) ); ` This just returned the first frame, lame. So I thought screw this and just do it myself. I created a function that simply takes an array containing the 'x, y, width and height' of the clip and the image it should clip, here it is: ` function generateTile(p, i) { var cs = document.createElement( 'canvas' ); var c = cs.getContext( '2d' ); cs.height = p[ 3 ]; cs.width = p[ 2 ]; c.drawImage( i, p[ 0 ], p[ 1 ], p[ 2 ], p[ 3 ], 0, 0, p[ 2 ], p[ 3 ] ); return new Bitmap( cs ); } ` All that happens is that I create a temporary canvas element and using the '[drawImage](https://developer.mozilla.org/en/Canvas_tutorial/Using_images#drawImage_example_2)' function I draw part of our image onto it. EaselJS then allows me to pass into it the canvas element and then I can use it as an layered object thanks to this awesome library.