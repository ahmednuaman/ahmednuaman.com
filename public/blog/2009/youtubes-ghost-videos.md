title: YouTube's Ghost Videos
link: http://www.ahmednuaman.com/blog/youtubes-ghost-videos/
creator: ahmed
description: 
post_id: 150
post_date: 2009-06-03 18:43:36
post_date_gmt: 2009-06-03 18:43:36
comment_status: open
post_name: youtubes-ghost-videos
status: publish
post_type: post

# YouTube's Ghost Videos

Now it may come as no surprise that even the most well oiled machine has it's flaws, that being said YouTube isn't an exception to the rule. Unfortunately sometimes users and videos get lost amongst the mass of videos being uploaded to YouTube. Recently I was on a project where I had to confirm a user input was a correct YouTube video Id. Now this was before the GData API for YouTube was updated and they added [the a call to retrieve a video's information](http://code.google.com/apis/youtube/2.0/developers_guide_protocol_video_entries.html). My approach was to use the [standard search API](http://code.google.com/apis/youtube/2.0/developers_guide_protocol_api_query_parameters.html) whereby I would pass the video Id as the "q" parameter like so: ` http://gdata.youtube.com/feeds/api/videos?q=VIDEO_ID ` Now this worked fine, but there were times when it wouldn't return anything. And that's when the problems started. My manager was asked why a user was having issues adding their video to a contest, so he came to me and we took the video Id and did some tests. We passed it into the GData APIs and nothing came back, even the new call to retrieve a single video's information returned false. So the next thing we did was search the video Id - not a lot of people know this, but you can enter a video's Id in YouTube's search and it'll return that video for you, if you ever need to - and that returned nothing. We'd found a glitch. It seems that sometimes certain anomalies cause an error when YouTube is processing the video as the user uploads it. It's been submitted as a bug and we've yet to hear on it's status but it's defiantly something that's around, although the occurrences are few and far between. So what do you do if this happens to you? Well the answers are simple: 

  1. First thing to do is to write a post on [YouTube's forum](http://www.google.com/support/forum/p/youtube?hl=en)
  2. Try to reupload the video, this usually fixes it
  3. Drop me an email or post a comment on here and I'll contact my guys at Google and see what the status of the fix is
Like I said, the bug is very sporadic and it may never effect you or your videos, but if it does, it's just good to know that there are ways to report it and for it to be fixed.