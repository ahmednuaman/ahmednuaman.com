title: Authenticating And Uploading A Video To YouTube
link: http://www.ahmednuaman.com/blog/authenticating-and-uploading-a-video-to-youtube/
creator: ahmed
description: 
post_id: 368
post_date: 2009-09-01 13:41:23
post_date_gmt: 2009-09-01 13:41:23
comment_status: open
post_name: authenticating-and-uploading-a-video-to-youtube
status: publish
post_type: post

# Authenticating And Uploading A Video To YouTube

**Update: I've added a nice little example below and all the code is up on [Github](http://github.com/ahmednuaman/YouTube-Player-Wrapper/tree).** So, I've been working on a simple tool that outlines how <del>easy</del> it is to upload a video to YouTube through your own web application. Before you read this tutorial, [it's worth going through the YouTube GData API](http://code.google.com/apis/youtube/2.0/developers_guide_protocol.html). Now you may be asking yourself: "why would anyone need this?", well think about this scenario: You're a brand owner and you'd like a gadget on your YouTube brand channel/iGoogle/microsite. You'd like the leverage the power of YouTube in terms of video serving as well as the community aspect. So you decide that you want users to upload their videos and maybe enter it into a contest. Naturally, the easiest way is to get the user to go to YouTube and upload it there, but that's not very intuitive and nor is it unobtrusive, so it's much nicer to integrate it into your gadget! Now, I'm going to be lazy here and just explain the bare bones, as in all you need to... 

  * Authenticate the user
  * Send the initial meta data to YouTube about the video
  * Upload the video to YouTube
  * Handle the video id of the uploaded video
So where to begin? Well, since we can't do everything in Flash (because we need iframes for the authentication and the upload process), I've split it into a set of simple code classes. So let's start with how we're going to do this: The first thing we need to do is create our HTML with the JavaScript and CSS we're going to use to handle the iframes and forms for submission, so here's the HTML to start with: ` < !DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 

` So, the first thing I'm doing is loading in the [jQuery](http://jquery.com/) and [SWFObject](http://code.google.com/p/swfobject/) libraries using the [Google Load API](http://code.google.com/apis/ajax/documentation/). Once that's all loaded, I then embed the flash, set a var in the document's scope that'll allow me to access the JavaScript API in the flash application and hide the iframe. Now, let's look at the flash, but don't forget the HTML, as we will be back. So here's the MXML: ` < ?xml version="1.0" encoding="utf-8"?>  < ![CDATA[ import com.firestartermedia.lib.as3.events.DataServiceEvent; import com.firestartermedia.lib.as3.data.XMLDataService; import mx.collections.ArrayCollection; import mx.rpc.events.ResultEvent; import mx.rpc.http.mxml.HTTPService; [Bindable] private var videoCategories:ArrayCollection; private var browser:FileReference; private var dataToken:String; private var uploadToken:String; private var uploadURL:String; private function init():void { Security.loadPolicyFile( 'http://gdata.youtube.com/crossdomain.xml' ); loadVideoCategories(); } private function loadVideoCategories():void { var service:XMLDataService = new XMLDataService(); service.addEventListener( DataServiceEvent.READY, handleVideoCategories ); service.send( 'http://gdata.youtube.com/schemas/2007/categories.cat' ); } private function handleVideoCategories(e:DataServiceEvent):void { var data:XML = e.data as XML; var categories:Array = [ ]; for each ( var category:XML in data..*::category ) { categories.push( category.@term.toString() ); } videoCategories = new ArrayCollection( categories ); } private function handleLoginButtonClicked():void { ExternalInterface.addCallback( 'handleLoginComplete', handleLoginComplete ); ExternalInterface.addCallback( 'handleUploadComplete', handleUploadComplete ); ExternalInterface.call( 'doLogin' ); } public function handleLoginComplete(token:String):void { dataToken = token; stack.selectedIndex = 1; } private function sendVideoData():void { var service:HTTPService = new HTTPService(); service.contentType = 'application/atom+xml; charset=UTF-8'; service.headers[ 'Authorization' ] = 'AuthSub token="' + dataToken + '"'; service.headers[ 'GData-Version' ] = 2; service.headers[ 'X-GData-Key' ] = 'key=ADD_YOUR_KEY_HERE'; service.method = 'POST'; service.request = '' + '' + videoTitle.text + '' + videoDescription.text

## Comments

**[Angela](#256 "2009-11-13 09:55:42"):** Very nice tutorial, one problem though, your example doesn't work in firefox. probably something to do with the iframes???

**[Ahmed](#260 "2009-11-18 15:13:23"):** Yes it is, silly me. It's about cookies and iframes and what not. However, if you took the example and took out the iframes, it'll be fine.

