(function(a){a.fn.tweet=function(d){var c={username:["seaofclouds"],avatar_size:null,count:3,intro_text:null,outro_text:null,join_text:null,auto_join_text_default:"i said,",auto_join_text_ed:"i",auto_join_text_ing:"i am",auto_join_text_reply:"i replied to",auto_join_text_url:"i was looking at",loading_text:null,query:null};a.fn.extend({linkUrl:function(){var e=[];var f=/((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/gi;this.each(function(){e.push(this.replace(f,'<a href="$1">$1</a>'))});return a(e)},linkUser:function(){var e=[];var f=/[\@]+([A-Za-z0-9-_]+)/gi;this.each(function(){e.push(this.replace(f,'<a href="http://twitter.com/$1">@$1</a>'))});return a(e)},linkHash:function(){var e=[];var f=/ [\#]+([A-Za-z0-9-_]+)/gi;this.each(function(){e.push(this.replace(f,' <a href="http://search.twitter.com/search?q=&tag=$1&lang=all&from='+c.username.join("%2BOR%2B")+'">#$1</a>'))});return a(e)},capAwesome:function(){var e=[];this.each(function(){e.push(this.replace(/(a|A)wesome/gi,"AWESOME"))});return a(e)},capEpic:function(){var e=[];this.each(function(){e.push(this.replace(/(e|E)pic/gi,"EPIC"))});return a(e)},makeHeart:function(){var e=[];this.each(function(){e.push(this.replace(/[&lt;]+[3]/gi,"<tt class='heart'>&#x2665;</tt>"))});return a(e)}});function b(f){var e=Date.parse(f);var g=(arguments.length>1)?arguments[1]:new Date();var h=parseInt((g.getTime()-e)/1000);if(h<60){return"less than a minute ago"}else{if(h<120){return"about a minute ago"}else{if(h<(45*60)){return(parseInt(h/60)).toString()+" minutes ago"}else{if(h<(90*60)){return"about an hour ago"}else{if(h<(24*60*60)){return"about "+(parseInt(h/3600)).toString()+" hours ago"}else{if(h<(48*60*60)){return"1 day ago"}else{return(parseInt(h/86400)).toString()+" days ago"}}}}}}}if(d){a.extend(c,d)}return this.each(function(){var i=a('<ul class="tweet_list">').appendTo(this);var h='<p class="tweet_intro">'+c.intro_text+"</p>";var e='<p class="tweet_outro">'+c.outro_text+"</p>";var j=a('<p class="loading">'+c.loading_text+"</p>");if(typeof(c.username)=="string"){c.username=[c.username]}var g="";if(c.query){g+="q="+c.query}g+="&q=from:"+c.username.join("%20OR%20from:");var f="http://search.twitter.com/search.json?&"+g+"&rpp="+c.count+"&callback=?";if(c.loading_text){a(this).append(j)}a.getJSON(f,function(k){if(c.loading_text){j.remove()}if(c.intro_text){i.before(h)}a.each(k.results,function(o,t){if(c.join_text=="auto"){if(t.text.match(/^(@([A-Za-z0-9-_]+)) .*/i)){var m=c.auto_join_text_reply}else{if(t.text.match(/(^\w+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+) .*/i)){var m=c.auto_join_text_url}else{if(t.text.match(/^((\w+ed)|just) .*/im)){var m=c.auto_join_text_ed}else{if(t.text.match(/^(\w*ing) .*/i)){var m=c.auto_join_text_ing}else{var m=c.auto_join_text_default}}}}}else{var m=c.join_text}var r='<span class="tweet_join"> '+m+" </span>";var l=((c.join_text)?r:" ");var p='<a class="tweet_avatar" href="http://twitter.com/'+t.from_user+'"><img src="'+t.profile_image_url+'" height="'+c.avatar_size+'" width="'+c.avatar_size+'" alt="'+t.from_user+'\'s avatar" border="0"/></a>';var q=(c.avatar_size?p:"");var n='<a href="http://twitter.com/'+t.from_user+"/statuses/"+t.id+'" title="view tweet on twitter">'+b(t.created_at)+"</a>";var s='<span class="tweet_text">'+a([t.text]).linkUrl().linkUser().linkHash().makeHeart().capAwesome().capEpic()[0]+"</span>";i.append("<li>"+q+n+l+s+"</li>");i.children("li:first").addClass("tweet_first");i.children("li:odd").addClass("tweet_even");i.children("li:even").addClass("tweet_odd")});if(c.outro_text){i.after(e)}})})}})(jQuery);