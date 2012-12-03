title: Searching YouTube Playlists
link: http://www.ahmednuaman.com/blog/searching-youtube-playlists/
creator: ahmed
description: 
post_id: 30
post_date: 2009-05-15 15:52:33
post_date_gmt: 2009-05-15 15:52:33
comment_status: open
post_name: searching-youtube-playlists
status: publish
post_type: post

# Searching YouTube Playlists

I've been creating a whole load of gadgets for YouTube Brand Channels that run off data from playlists. The only issue with this is that YouTube playlists only return around 25 entries; you therefore need to specify the "start-index" in the request you make to the GData API. Now this is a bit of a pain if you want to search a playlist's videos for a particular term. But there is a way to do it. I've created a set of YouTube GData Service classes for Actionscript 3. The motivation behind these classes was to be able to search through a playlist's videos for a particular term. I've done a quick gadget in Flex MXML and stuck it below for all to see: 

[kml_flashembed fversion="9.0.124" movie="/blog/wp-content/uploads/2009/05/app.swf" targetclass="flashmovie" useexpressinstall="true" publishmethod="static" width="580" height="500"]

**How to use:** just enter a playlist ID (that's the bit in italics in this URL: http://www.youtube.com/view_play_list?p=_55FDD4908EC3C593_) and a search term and hit go. I haven't create a progress view, I'm lazy like that, so you'll just have to wait!