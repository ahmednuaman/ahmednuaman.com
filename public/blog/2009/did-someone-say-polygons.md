title: Did Someone Say Polygons?
link: http://www.ahmednuaman.com/blog/did-someone-say-polygons/
creator: ahmed
description: 
post_id: 489
post_date: 2009-11-30 09:39:48
post_date_gmt: 2009-11-30 09:39:48
comment_status: open
post_name: did-someone-say-polygons
status: publish
post_type: post

# Did Someone Say Polygons?

So, I've got a new brief that requires me to make use of [hexagons](http://en.wikipedia.org/wiki/Hexagon) in Flash. Not a problem I said and went about making a base [Polygon](http://github.com/ahmednuaman/AS3/blob/207afd4d913e8898a736c9f6a085a8f353d02903/com/firestartermedia/lib/as3/display/shape/Polygon.as) class, and without further ado, [here it is](http://github.com/ahmednuaman/AS3/commit/207afd4d913e8898a736c9f6a085a8f353d02903). It's very simple to use, so far I've only made a [Hexagon](http://github.com/ahmednuaman/AS3/blob/207afd4d913e8898a736c9f6a085a8f353d02903/com/firestartermedia/lib/as3/display/shape/Hexagon.as) subclass, but I'll make more. Nevertheless, here's how you would use it: ` package { import com.firestartermedia.lib.as3.display.shape.Hexagon; import flash.display.Sprite; [SWF( backgroundColor='#FFFFFF', frameRate='30', width='580', height='450' )] public class Polygon1 extends Sprite { public function Polygon1() { var hex:Hexagon = new Hexagon(); hex.x = stage.stageWidth / 2; hex.y = stage.stageHeight / 2; addChild( hex ); } } } ` And this gives you: [kml_flashembed publishmethod="static" fversion="9.0.0" movie="/_/dev/polygons/Polygon1.swf" width="580" height="400" targetclass="border"/] Or if you want to have other polygons, just do this: ` package { import com.firestartermedia.lib.as3.display.shape.Hexagon; import com.firestartermedia.lib.as3.display.shape.Polygon; import flash.display.Sprite; [SWF( backgroundColor='#FFFFFF', frameRate='30', width='580', height='450' )] public class Polygon2 extends Sprite { public function Polygon2() { var hex:Hexagon = new Hexagon(); hex.x = stage.stageWidth / 2 - hex.width; hex.y = stage.stageHeight / 2; addChild( hex ); var oct:Polygon = new Polygon( 100, 8 ); oct.x = stage.stageWidth / 2; oct.y = stage.stageHeight / 2; addChild( oct ); var pen:Polygon = new Polygon(); pen.x = stage.stageWidth / 2 + pen.width; pen.y = stage.stageHeight / 2; addChild( pen ); } } } ` And this produces: [kml_flashembed publishmethod="static" fversion="9.0.0" movie="/_/dev/polygons/Polygon2.swf" width="580" height="400" targetclass="border"/] The code's all up on [github](http://github.com/ahmednuaman/AS3), so feel free to fork and play! Tell me what you think!

## Comments

**[Ricardo](#271 "2009-11-30 11:00:51"):** Any documentation for your other classes ? Gave it a look and it seems very interesting, especially AMHPHPService, a class with the same name of one I have used for a while written by a guy named Georg Jordt ( http://www.j-c-s.co.uk/flashremoting/AMFPHPService.zip ). Thanks for sharing your ideas.

**[Ahmed](#276 "2009-12-02 15:42:42"):** Yeah, I'll come to writing stuff up one day! Sorry for the lack of docs, it takes time and I know I should do it! Regarding the AMFPHPService, I've got a post about that: http://ahmednuaman.com/blog/2009/05/29/amfphp-and-as3/ If there's anything else, just let me know!

