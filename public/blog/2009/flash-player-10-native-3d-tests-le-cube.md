title: Flash Player 10 Native 3D Tests: Le Cube
link: http://www.ahmednuaman.com/blog/flash-player-10-native-3d-tests-le-cube/
creator: ahmed
description: 
post_id: 392
post_date: 2009-09-10 14:52:15
post_date_gmt: 2009-09-10 14:52:15
comment_status: open
post_name: flash-player-10-native-3d-tests-le-cube
status: publish
post_type: post

# Flash Player 10 Native 3D Tests: Le Cube

Ok, so after discovering the <del>simple</del> ability to have native 3D properties in Flash Player 10 without having to mess about with engines such as Papervision3D, I've started writing a few tests that will lead to classes that will "do the maths" for you. So, here's a little attempt at a cube. It's not perfect, you see in Papervision, it aligns everything nicely for you, but this is the code harsh reality of Actionscript 3 which means that the transformation point is the front top left corner. I'll find a way around. So here's the code: ` package { import flash.display.Sprite; import flash.display.StageAlign; import flash.display.StageScaleMode; import flash.events.Event; import flash.geom.Point; import flash.system.Security; [SWF( width='580', height='500', frameRate='30', backgroundColor='#FFFFFF' )] public class App3D1 extends Sprite { private var cube:Sprite; public function App3D1() { stage.align = StageAlign.TOP_LEFT; stage.scaleMode = StageScaleMode.NO_SCALE; init(); } private function init():void { transform.perspectiveProjection.fieldOfView = 45; cube = new Sprite(); addChild( cube ); var front:Sprite = createFace( 0x333333, 'front' ); var back:Sprite = createFace( 0x333333, 'back' ); var right:Sprite = createFace( 0x333333, 'right' ); var left:Sprite = createFace( 0x333333, 'left' ); var top:Sprite = createFace( 0x333333, 'top' ); var bottom:Sprite = createFace( 0x333333, 'bottom' ); cube.addChild( back ); cube.addChild( right ); cube.addChild( left ); cube.addChild( top ); cube.addChild( bottom ); cube.addChild( front ); back.rotationY = 180; back.x = 300; back.z = 300; right.rotationY = 90; right.x = 300; right.z = 300; left.rotationY = 270; left.x = 0; top.rotationX = 270; top.y = 300; top.z = 300; bottom.rotationX = 90; addEventListener( Event.ENTER_FRAME, handleEnterFrame ); } private function createFace(colour:uint, name:String=null):Sprite { var face:Sprite = new Sprite(); face.graphics.beginFill( colour, .3 ); face.graphics.lineStyle( 1, colour ); face.graphics.drawRect( 0, 0, 300, 300 ); face.graphics.endFill(); face.name = name; return face; } private function handleEnterFrame(e:Event):void { cube.x = ( stage.stageWidth / 2 ) - ( cube.width / 2 ); cube.y = ( stage.stageHeight / 2 ) - ( cube.height / 2 ); cube.rotationX += 1; cube.rotationY += 1; cube.rotationZ += 1; cube.x += 1; cube.y += 1; cube.z += 1; transform.perspectiveProjection.projectionCenter = new Point( stage.stageWidth / 2, stage.stageHeight / 2 ); } } } ` Don't forget to [set up your environment to target Flash Player 10](http://opensource.adobe.com/wiki/display/flexsdk/Targeting+Flash+Player+10) before you compile. And if you're too lazy, here's a preview: 

[kml_flashembed publishmethod="static" fversion="10.0.0" movie="http://dev.ahmednuaman.com/native3dtests/App3D1.swf" width="580" height="500" targetclass="flashmovie"/]

Tell me what you think...

## Comments

**[Pradeek](#215 "2009-09-10 15:01:39"):** You could use drawTriangles(). Its a bit more complex than this but here's a post i did a couple of months back. http://pradeek.blogspot.com/2009/05/flash-cs4-tutorial-using-drawtriangles.html

**[Ahmed](#216 "2009-09-10 15:13:31"):** Yep, could do, the the purpose of this test is to allow one to add faces to the cube. So this way, they just pass in a display object (such as a Sprite, MovieClip, say from a SWC, or bitmap) nicely into the cube.

**[Monkey](#218 "2009-09-10 23:52:36"):** It kind of looks warped in some framnes like ts not quite a cube. Might be the wire frame but its only some frames - might be different in solid color?

**[Ahmed](#219 "2009-09-11 07:44:58"):** Yep, but it's only a test... I've got a class I'm working on now, but just trying to figure out the depth measurement.

**[Flv Player](#240 "2009-10-01 10:10:16"):** Nice coding! Thanks for sharing this coding with us.

