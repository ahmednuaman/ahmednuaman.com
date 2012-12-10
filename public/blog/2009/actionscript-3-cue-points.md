title: Actionscript 3 Cue Points
link: http://www.ahmednuaman.com/blog/actionscript-3-cue-points/
creator: ahmed
description: 
post_id: 186
post_date: 2009-06-18 21:18:43
post_date_gmt: 2009-06-18 21:18:43
comment_status: open
post_name: actionscript-3-cue-points
status: publish
post_type: post

# Actionscript 3 Cue Points

Today I was working on finalising the video player for the competition web site [1Click2Fame.com](http://1Click2Fame.com). Since this video player will be multi purpose, for example, it will be used as a "chromeless" style player but may also have a "chrome" where the user can interact by voting for acts and so on, it needs the ability to record metrics such as user interaction and more importantly cue points. 

The team at 1Click2Fame.com are not only interested in seeing what video a user watched, but how long they watched it for, especially if they voted for or against it winning. So cue cue points! Now just a little about cue points in Actionscript 3: they're not easy. You see in Actionscript 2 you could use the "[Media.addCuePoint()](http://livedocs.adobe.com/flash/9.0/main/wwhelp/wwhimpl/common/html/wwhelp.htm?context=LiveDocs_Parts&file=00003236.html)" class function that allowed you to define the cue point's string and the seconds where the cue point will be fired. 

It seems this function slipped out of the net when they wrote Actionscript 3, but we still live on. So how do you add cue points in Actionscript 3? Well it seems you either: 

  1. [Bake them into your FLV media during encoding](http://help.adobe.com/en_US/AdobeMediaEncoder/4.0/WSC039D82B-0C0E-4c53-BEBA-4C6C4B400160.html)
  2. Use the [FLVPlayback](http://livedocs.adobe.com/flash/9.0/ActionScriptLangRefV3/fl/video/FLVPlayback.html) component in the Flash IDE

So neither option is particularly flexible. Well until you feast your eyes on my solution! So we understand that cue points are moments in time on a video stream, so if we can hook into that stream and dispatch events when those moments of time are hit, then we have a cue point system! 

Let's look at some code: What we want to do is create a class-wide array, let's call it "cuePoints", and we'll populate this array with the seconds of our cue points, like so:

	package
	{
	    class CuePointsTest
	    {
	        private var cuePoints:Array = [ ];
	        public function set addCuePoint(seconds:Number):void
	        {
	            cuePoints.push( seconds );
	        }
	    }
	}

So you would add a cue point like so:

	var cuePointsTest:CuePointsTest = new CuePointsTest(); 
	cuePointsTest.addCuePoint( 12 );

So now we've added the cue points, we need to check against the time of the stream. When loading a video in Actionscript 3 you use the "[NetStream()](http://livedocs.adobe.com/flash/9.0/ActionScriptLangRefV3/flash/net/NetStream.html)" class, [here's a nice tutorial](http://kriggio.wordpress.com/2007/06/06/a-super-simple-flv-player-using-actionscript-30/). 

Now once we've got the stream playing, using "NetSteam.play( _url_ )", we can add an event listener to the class to fire a function on ever frame. We can then get the stream's current time and check against the cue points, like so: 

	package
	{
	    import flash.display.Sprite;
	    import flash.events.Event;
	    import flash.events.NetStatusEvent;
	    import flash.media.Video;
	    import flash.net.NetConnection;
	    import flash.net.NetStream;
	    public class VideoPlayer extends Sprite
	    {
	        private var cuePoints:Array = [ ];
	        private var lastFiredCuePoint:Number = 0;
	        private var metaData:Object = {};
	        private var video:Video = new Video();
	        private var stream:NetStream;
	        public function VideoPlayer()
	        {
	            var connection:NetConnection = new NetConnection();
	            connection.connect( null );
	            stream = new NetStream( connection );
	            stream.client =
	            {
	                onMetaData: handleOnMetaData
	            }
	            ;
	            video.smoothing = true;
	            video.attachNetStream( stream );
	            addChild( video );
	        }
	        public function play(url:String):void
	        {
	            stream.play( url );
	            addEventListener( Event.ENTER_FRAME, handleEnterFrame );
	        }
	        private function handleEnterFrame(e:Event):void
	        {
	            if ( cuePoints.length > 0 )
	            {
	                checkForCuePoints();
	            }
	        }
	        private function checkForCuePoints():void
	        {
	            var time:Number = playingTime.current;
	            var checkTime:Number = Math.floor( time );
	            var test:Number = ArrayUtil.search( cuePoints, checkTime );
	            var cuePoint:Number;
	            if ( test &gt;
	            -1 )
	            {
	                cuePoint = cuePoints[ test ];
	                if ( cuePoint &gt;
	                lastFiredCuePoint )
	                {
	                    dispatchEvent( new VideoPlayerEvent( VideoPlayerEvent.CUE_POINT,
	                    {
	                        point: cuePoint
	                    }
	                    ) );
	                    lastFiredCuePoint = cuePoint;
	                }
	            }
	        }
	        public function addCuePoint(seconds:Number):void
	        {
	            cuePoints.push( seconds );
	        }
	        private function handleOnMetaData(info:Object):void
	        {
	            metaData = info;
	        }
	        public function get playingTime():Object
	        {
	            var time:Object =
	            {
	            }
	            ;
	            time.current = stream.time;
	            time.total = metaData.duration;
	            return time;
	        }
	    }
	}

So just a quick break down: This is a standard FLV player status, the bit we're interested in is the "checkForCuePoints()" function. What happens here is that first we get the current time of the video, we then floor it, so get it to the nearest second, and then we test it. 

I'm using a utility I wrote called "ArrayUtil()", the code is below, it simply searches an array for a value and returns the index of that value. Once we have this value we can then test to see if that cue point has been fired, if it hasn't we then fire it. And to make sure that we don't fire the same cue point more than once, we assign the last fired cue point as the value of the variable "lastFiredCuePoint" for our test. 

Simple eh? Now of course there is some latency, about 1/10th of a second, but that's not bad is it? Here's the ArrayUtil class I've written: 

	package com.firestartermedia.lib.as3.utils
	{
	    public class ArrayUtil
	    {
	        public static function search(array:Array, value:Object):Number
	        {
	            var found:Boolean = false;
	            for ( var i:Number = 0;
	            i &lt;
	            array.length;
	            i++)
	            {
	                if ( array[ i ] == value )
	                {
	                    found = true;
	                    break;
	                }
	            }
	            return ( found ? i : -1 );
	        }
	    }
	}

So, I hope that makes sense. Remember, I'm going to publish the full player classes soon so don't fret if you want them all! Also, if you are confused, just comment and I'll happily help out.`