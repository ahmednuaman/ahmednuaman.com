title: How every ActionScript base class should start
link: http://www.ahmednuaman.com/blog/how-every-actionscript-base-class-should-start/
creator: ahmed
description: 
post_id: 743
post_date: 2012-01-03 15:50:50
post_date_gmt: 2012-01-03 15:50:50
comment_status: open
post_name: how-every-actionscript-base-class-should-start
status: publish
post_type: post

# How every ActionScript base class should start

Regardless of what you think of Flash (you know who you are) [ActionScript 3](http://www.google.co.uk/search?sourceid=chrome&ie=UTF-8&q=ActionScript+3) is by far the most powerful front end language and it teaches the developer something important: class based development. Let's be honest here, JavaScript is a huge hack of a language and considering it was one of the first languages I ever wrote, I will always prefer ActionScript 3 (but not necessarily Flash) over JavaScript. Anyway, if you're still writing ActionScript 3 then you most certainly have a base class and this base class should always (in my opinion) start like this: ` package { import flash.display.Sprite; import flash.events.Event; [SWF( backgroundColor=0xffffff, frameRate=30, height=600, width=800 )] public class App extends Sprite { public function App() { loaderInfo.addEventListener( Event.INIT, handleInit, false, 0, true ); } private function handleInit(e:Event):void { loaderInfo.removeEventListener( Event.INIT, handleInit ); } } } ` I've come across a lot of code in my time and a lot of problems stem from badly initialisation of the application before it's embedded or even ready to have stuff drawn. By listening to the '[loaderInfo](http://help.adobe.com/en_US/FlashPlatform/reference/actionscript/3/flash/display/LoaderInfo.html?filter_flash=cs5&filter_flashplayer=10.2&filter_air=2.6)' [INIT](http://help.adobe.com/en_US/FlashPlatform/reference/actionscript/3/flash/events/Event.html) event, you know your app's ready. That is all.