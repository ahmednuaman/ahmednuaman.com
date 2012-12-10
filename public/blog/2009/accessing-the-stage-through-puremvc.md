title: Accessing The Stage Through PureMVC
link: http://www.ahmednuaman.com/blog/accessing-the-stage-through-puremvc/
creator: ahmed
description: 
post_id: 278
post_date: 2009-07-14 10:50:00
post_date_gmt: 2009-07-14 10:50:00
comment_status: open
post_name: accessing-the-stage-through-puremvc
status: publish
post_type: post

# Accessing The Stage Through PureMVC

I got a tweet earlier today by [@ninjaparade](http://twitter.com/ninjaparade) asking me for "any advice how to add an EventListener to the stage from a component in PMVC", and suggested I wrote a blog post, so I'm doing just that. 

If you don't already know, PureMVC is a great framework for rapid building and maintaing of Actionscript 3 projects of any size, if you haven't had a look at it yet, I suggest you [read my tutorial on Flashtuts+](http://active.tutsplus.com/tutorials/workflow/understanding-the-puremvc-open-source-framework/). 

Now PureMVC handles views in different ways regarding MXML and pure Actionscript 3. You see with the MXML compiler, you start with you base MXML application and then add your views to a "[viewstack](http://livedocs.adobe.com/flex/3/html/help.html?content=navigators_3.html)" or another appropriate container. 

Because you're already adding them to your base application's MXML, this instantiates the views before the mediators, thus meaning that you don't need to worry about adding your view components to the "viewComponent" variable passed down from the facade to the mediators. However, in Actionscript 3, it's a different story. 

As we all know, we can't access the stage by using AS2's "_root" anymore, nevertheless, there are ways around this. You see, with an Actionscript 3 project using PureMVC, you pass the stage to the start up command that then deviates this to the application mediator and then to the mediators of all the views, thus allowing the mediator to add the view components to the stage. You _can_ add event listeners to the stage from the mediator like so: 

	public function MyMediator(viewComponent:Object=null)
	{
	    super( NAME, viewComponent );
	}
	
	override public function onRegister():void
	{
	    myView = new MyView();
	    viewComponent.addEventListener( 'event', handleViewComponentEvent );
	    viewComponent.addChild( myView );
	}

But it's much more likely that you want to create listeners in your views that listen to the stage's events; this **is** possible. 

###Understanding the display object

One thing that people are a bit confused about is how the display object works, more importantly, what happens when display objects are instantiated and added to the display list. As soon as you create a class, you cannot access the "stage" variable until that class has been added to the display and therefore the stage, so for example if your mediator was like the one above and your "MyView()" class was like this:

	package
	{
	    import flash.display.Sprite;
	    import flash.events.MouseEvent;
	    public class MyView extends Sprite
	    {
	        public function MyView()
	        {
	            init();
	        }
	        
	        private function init():void
	        {
	            stage.addEventListener( MouseEvent.CLICK, handleClick );
	        }
	        
	        private function handleClick(e:MouseEvent):void
	        {
	            trace(e);
	            
	        }
	    }
	}

This will (hopefully) cause an error as the class is being instantiated, therefore running the private function "init()" which tries to reference the stage, before it's been added to the view component and therefore the display list. If, however, your class was like this: 

	package
	{
	    import flash.display.Sprite;
	    import flash.events.MouseEvent;
	    public class MyView extends Sprite
	    {
	        public function init():void
	        {
	            stage.addEventListener( MouseEvent.CLICK, handleClick );
	        }
	        
	        private function handleClick(e:MouseEvent):void
	        {
	            trace(e);
	        }
	    }
	}

And your mediator's "onRegister()" function was like this:

	override public function onRegister():void
	{
	    myView = new MyView();
	    viewComponent.addEventListener( 'event', handleViewComponentEvent );
	    viewComponent.addChild( myView );
	    myView.init();
	}

It should be fine. So the main lesson here is understanding deferred instantiation, to the point where you can check to see if you're view is ready, for example, if you use my PureMVC classes ([currently hosted on Github](http://github.com/ahmednuaman/AS3/tree/master)), you'll see that my "[Sprite()](http://github.com/ahmednuaman/AS3/blob/71519cbf82652790da3b9d7309074d58d705c575/com/firestartermedia/lib/puremvc/display/Sprite.as)" class allows you to pass "registered" and also "sendReady()" that will notify the mediator that your view is ready and therefore be able to tell your view that the stage is now accessible. Hope this helps, tell me what you think.