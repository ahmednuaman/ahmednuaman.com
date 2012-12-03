title: Skinning Flex: HSlider Component
link: http://www.ahmednuaman.com/blog/skinning-flex-hslider-component/
creator: ahmed
description: 
post_id: 286
post_date: 2009-07-26 21:01:42
post_date_gmt: 2009-07-26 21:01:42
comment_status: open
post_name: skinning-flex-hslider-component
status: publish
post_type: post

# Skinning Flex: HSlider Component

I've been working in Flex a lot recently and have rediscovered why coding with Flex is so great. Not only is it really fast to create prototypes, but styling is a doddle too. Anyone can use it! But there will be times when the [Halo](http://livedocs.adobe.com/flex/201/langref/mx/skins/halo/package-detail.html) skin doesn't quite cut it and no matter how much CSS styling you use, you can't make it look like you really want it to. So this is where skinning is so important. In this series of posts, I'm going to cover different components that I've skinned, and if there's enough demand for others, I'll skin them too! **What Is Skinning?** Skinning is basically overwriting Flex's standard Halo skin with your own visual components, now they can be display objects from SWCs, images and even SWFs. They can also be programmed classes as, at the end of the day, all vector work in Actionscript is pretty much a coded class, if you get what I mean. **Do I Have To Skin?** No you don't have to skin, you can easily use CSS to do what you want. Also, [there are plenty of sites out there that'll provide you with tips and free skins](http://www.google.com/search?client=safari&rls=en-us&q=flex+skins&ie=UTF-8&oe=UTF-8) to use. But skinning means that you can fulfill a brief with the speediness of coding in Flex as well as meeting the aesthetic design needs of the brief. **Let's begin** So, in this example, I'm going to show you how quick and easy it is to skin a component, in this case it's the [HSlider Flex component](http://livedocs.adobe.com/flex/2/langref/mx/controls/HSlider.html). First thing to do is to fire up your favourite IDE for developing Flex and Actionscript 3, [there are lots you can use](http://www.google.com/search?client=safari&rls=en-us&q=flex+ide&ie=UTF-8&oe=UTF-8), so there's no excuse. Create yourself a Flex project, I'm currently using the Flex 3.4 SDK, but it's up to you which one you use. Now within your application MXML file, just place a HSlider component like so: ` `

[kml_flashembed publishmethod="static" fversion="9.0.0" movie="/_/dev/flexskinning/hslider/1.swf" width="580" height="100" targetclass="flashmovie"]

Now, let's say we want to change the track, you can do this in CSS by changing the colours and whatnot, I won't digress in to that as you can have a play with the [Flex Style Explorer](http://examples.adobe.com/flex3/consulting/styleexplorer/Flex3StyleExplorer.html). Now since this is about skinning, we'll be changing the track for something that we've created, either visually (so through the Flash IDE or even Illustrator and Photoshop) or coded up using the drawing API. First, I'll start by creating a simple rounded rectangle in the Flash IDE. So create a new AS3 file and draw a rectangle like so: 

![Screenshot 1](http://ahmednuaman.com/blog/wp-content/uploads/2009/07/1.jpg)

And when you're happy with it, convert it into a MovieClip by either dragging it into the library panel or pressing F8 or going to "Modify > Convert to symbol". Call it "TrackBackground", tick "Enable guides for 9-slice scaling" and "Export for Actionscript" and hit OK: 

![Screenshot 2](http://ahmednuaman.com/blog/wp-content/uploads/2009/07/2.jpg)

If you double-click in to the MovieClip now, you'll see the guides for 9-slice scaling (like below), make sure you move them around so that the bits you **don't** want to scale, such as the rounded corners are **outside** the rectangle the guides make in the middle: 

![Screenshot 3](http://ahmednuaman.com/blog/wp-content/uploads/2009/07/3.jpg)

So now we've got a visual asset that's ready to be exported to Actionscript to be used to skin our HSlider. Last thing we need to do is just tell the Flash IDE compiler to export a SWC for us, so go to "File > Publish Settings..." and select the "Flash" panel, change player version to "Flash Player 9" and select "Export SWC" under "SWF Settings". Now just hit CTRL/CMD + ENTER and our SWC is ready! Next thing to do is to update your Flex IDE so that it's now picking up the new SWC, in Flex Builder this is done by right-clicking on the project in the navigation box, selecting "Properties", then click on "Flex Build Path", select the "Library Path" panel and click "Add SWC" and you can do the rest. Once that's done, let's get back to some coding. We can quickly add the rectangle as our track skin by updating the "trackSkin" attribute of the HSlider, like so: ` `

[kml_flashembed publishmethod="static" fversion="9.0.0" movie="/_/dev/flexskinning/hslider/2.swf" width="580" height="100" targetclass="flashmovie"]

So you can see that we now have our slider background and since we used 9-slide scaling, it's nicely formed! So, what about images I hear you say? Well we can embed them quite simple, like so: ` `

[kml_flashembed publishmethod="static" fversion="9.0.0" movie="/_/dev/flexskinning/hslider/3.swf" width="580" height="100" targetclass="flashmovie"]

But now, you'll notice, we have a problem. When we created the rectangle in the Flash IDE, we applied a 9-slice scale grid, however, since we're now using a bitmap, we can't. And, as you may be aware, 9-slice grid doesn't work on anything apart from pure vector art, that's MovieClips and Sprites that contain only one child that's a shape created in the Flash IDE or through the drawing API. Shame eh? Well no fear, check out my "[ScaleObject()](/blog/2009/06/26/scale-any-displayobject-with-my-scaleobject-class/)" class. It'll allow you to replicate the 9-slice scaling method on _any_ display object (unless it's animated). Now you can create visual **bitmap** assets in your favourite editors and still have them scale as components, like so: Create and import your asset into a new class that extends the Sprite: ` package { import com.firestartermedia.lib.as3.display.tools.ScaleObject; import flash.display.Bitmap; import flash.display.Sprite; import flash.geom.Rectangle; public class TestTrackBackground extends Sprite { [Embed( source='assets/image/bg.png' )] private var BgImage:Class; private var scaledImage:Sprite; public function TestTrackBackground() { var image:Bitmap = new BgImage(); scaledImage = new ScaleObject( image, new Rectangle( 10, 10, 280, 10 ) ); addChild( scaledImage ); } override public function set height(value:Number):void { scaledImage.height = value; } override public function set width(value:Number):void { scaledImage.width = value; } } } ` So as you can see, we "fake" the Sprite display object by overriding the "height()" and "width()" functions to resize the new "scaledImage". This then creates this: 

[kml_flashembed publishmethod="static" fversion="9.0.0" movie="/_/dev/flexskinning/hslider/4.swf" width="580" height="100" targetclass="flashmovie"]

Awesome eh? I thought you'd like it! **But What About The Thumb?**

## Comments

**[Ovidiu Diac](#265 "2009-11-23 15:10:17"):** 9 grid scaling works with images too. You just need to specify it when embedding like so: @Embed(source='whateve.png', scaleGridLeft=10, scaleGridTop=5, scaleGridRight=30, scaleGridBottom=20). Nice post though.

**[Ahmed](#267 "2009-11-25 07:13:16"):** Cool, cheers for the tip!

**[Michael](#300 "2010-02-04 23:04:33"):** Good example but one question... in all the slider skinning I see with Flex the thumb overruns the left and right edges of the track. Does anyone know a way to prevent that? Ideally the left edge of the circle thumb would stop at the left edge and the right edge of the track. Make sense?

**[Ahmed](#297 "2009-12-29 14:22:55"):** Good old flexlib, what component are you using?

**[omer](#294 "2009-12-23 16:27:06"):** Great article, help me allot. The only problem that I facing now is that I use flexlib component and I can't change the thumb size. if you have any idea it will be greta.

**[Satish](#306 "2010-03-09 20:32:34"):** How do we go with custom trackColors skin ? a different skin (color) on the left of the tick and another on right side

**[Ahmed](#305 "2010-02-18 22:41:03"):** Can you put up an example?

**[DaMorgue](#356 "2010-09-09 19:59:12"):** Screenshots, both jpgs and swfs, are missing. Sample zip is a broken link as well. Nice tutorial, but would be nice to see your finished product.

**[Ahmed](#357 "2010-09-12 13:09:53"):** Ah pants! I recently made a deployment mistake and accidentally deleted everything! I'll find them!

