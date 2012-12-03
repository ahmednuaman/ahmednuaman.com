title: Detecting The Domain Name In Actionscript
link: http://www.ahmednuaman.com/blog/detecting-the-domain-name-in-actionscript/
creator: ahmed
description: 
post_id: 327
post_date: 2009-08-12 09:59:31
post_date_gmt: 2009-08-12 09:59:31
comment_status: open
post_name: detecting-the-domain-name-in-actionscript
status: publish
post_type: post

# Detecting The Domain Name In Actionscript

Recently, I had to detect where my Flash application was being loaded. This was because it behaved differently when it was on the site or embedded externally. It seemed silly creating a whole new application for the sake of one or two views, so I figured the best way was to detect the application's current location. Now reading through the Actionscript 3 documentation leads you to believe that you can figure out the applications current URL through the "[LoaderInfo.loaderURL](http://livedocs.adobe.com/flash/9.0/ActionScriptLangRefV3/flash/display/LoaderInfo.html#loaderURL)" but all that presents you with is the URL from where the application is being loaded **not** the browser's current URL. So how would you do this? Well the answer is quite simple: you use Javascript. We can access Javascript functions, either defined by you or native to the DOM, through "[ExternalInterface.call()](http://livedocs.adobe.com/flash/9.0/ActionScriptLangRefV3/flash/external/ExternalInterface.html#call())". Through this, we can call the javascript "window.location.toString". This will pass back the current location of the browser and we can the see where our application is, here's some sample Actionscript code: ` public static function get currentURL():String { var url:String; if ( ExternalInterface.available ) { try { url = ExternalInterface.call( 'window.location.toString' ); } catch (e:*) { url = 'http://example.com'; } } return url; } ` You'll see that I test to see if "ExternalInterface" is available, I then try to make the call and if it fails, I assume it is embedded as I know the site it's from will always have "ExternalInterface" available as it's via the browser and I set "[allowScriptAccess](http://kb2.adobe.com/cps/164/tn_16494.html)" to "always". Hope this helps!