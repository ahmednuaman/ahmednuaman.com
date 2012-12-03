title: Speeding Up PureMVC Development, Part 1: The View
link: http://www.ahmednuaman.com/blog/speeding-up-puremvc-development-part-1-the-view/
creator: ahmed
description: 
post_id: 239
post_date: 2009-06-29 16:19:23
post_date_gmt: 2009-06-29 16:19:23
comment_status: open
post_name: speeding-up-puremvc-development-part-1-the-view
status: publish
post_type: post

# Speeding Up PureMVC Development, Part 1: The View

After [my tutorial on using and understanding PureMVC](http://active.tutsplus.com/tutorials/workflow/understanding-the-puremvc-open-source-framework/), I got around to write some classes that extended some of the core classes of [PureMVC](http://puremvc.org). The main thing that got to me was the repetition of functions such as functions that send events from a view to the mediator and so on. I think it's just much better if you can get away with creating a nice set of classes that extend the core and allow you to code that much better, so here they are: **Extending the View** The view is very important, without it, there wouldn't be a UI! The main thing that got me about PureMVC's views was that they needed to bubble events up to their mediators, it meant that each view needed a function like this: ` public function sendEvent(eventName:String, body:Object=null):void { dispatchEvent( new SpriteEvent( eventName, body, true ) ); } ` It just seemed a shame to have something like that repeated in each view, so I created an extension to the "[Sprite](http://livedocs.adobe.com/flash/9.0/ActionScriptLangRefV3/flash/display/Sprite.html)" class that's perfect for PureMVC, here it is: ` package com.firestartermedia.lib.puremvc.display { import com.firestartermedia.lib.puremvc.events.SpriteEvent; import flash.display.Sprite; public class Sprite extends flash.display.Sprite { public var registered:Boolean = false; public var ready:Boolean = false; public var tweenResize:Boolean = false; public function sendEvent(eventName:String, body:Object=null):void { dispatchEvent( new SpriteEvent( eventName, body, true ) ); } public function sendReady(eventName:String):void { ready = true; sendEvent( eventName ); } public function handleResize(e:Object):void { } } } ` As you can see that the "sendEvent()" function is all there for you. There's also other functions call "sendReady()" and "handleResize()", you can use "sendReady()" to tell your mediator that the view has finished creating itself and is now ready for some commands, and the "handleResize()" function kind of teaches you to standardise your naming convention for resizing functions in your views and also sets you up to make sure that you write resizing commands. There are also a few public functions: "registered", "ready" and "tweenResize". I use "registered" to check if the view has been created, therefore in the view's constructor I set "registered = true". The "ready" variable is a nice way for your mediator to check if your view is ready, if not, it can just defer calls 'til it is. And "tweenResize", another one for me, allows my mediator to check if the resizing function needs to call a tween or not. Quite simple and very helpful! Tell me what you think, if you find it useful! More to follow too!

## Comments

**[Almog Koren](#247 "2009-10-23 04:21:23"):** Hi can you explain a bit on how to implement this I'm a newbie to PureMVC, I'm also having trouble with adding a stage event listener from a custom class "ScrollBar".

**[Ahmed](#248 "2009-10-23 13:33:39"):** Give me a bit more detail about what you're trying to do, and post some code!

