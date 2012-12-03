title: Papervision3D MovieMaterial: To Hack Or Not To Hack?
link: http://www.ahmednuaman.com/blog/papervision3d-moviematerial-to-hack-or-not-to-hack/
creator: ahmed
description: 
post_id: 337
post_date: 2009-08-21 18:14:04
post_date_gmt: 2009-08-21 18:14:04
comment_status: open
post_name: papervision3d-moviematerial-to-hack-or-not-to-hack
status: publish
post_type: post

# Papervision3D MovieMaterial: To Hack Or Not To Hack?

**Another update: [I've hacked PV3D to get it to work with YouTube](/blog/2009/08/28/papervision3d-and-the-youtube-player-just-hack-it/).** **Update: I've had a play with PV3D and [this is what I found out](/blog/2009/08/26/messing-with-papervision3d-and-materialplane-interactivity/).** Recently I've been helping an agency with the [YouTube Player API](/blog/?s=youtube+player+api) and [Papervision3D](http://code.google.com/p/papervision3d). They're after placing a YouTube player on a plane and it being interactive. The main problem seems to be that: 

  1. In order to add an object on to a plane it needs to be a material
  2. When an object is converted into a material, whether it's a "[MovieMaterial()](http://papervision3d.googlecode.com/svn/trunk/as3/trunk/docs/org/papervision3d/materials/MovieMaterial.html)" or not, it subclasses the "[BitmapMaterial()](http://papervision3d.googlecode.com/svn/trunk/as3/trunk/docs/org/papervision3d/materials/BitmapMaterial.html)" class, thus making it un-interactive (as essentially it's a flattened bitmap)
So what to do... Well I've taken it upon myself to some how hack my way around this. I mean there must be a way that some how I can pass the X and Y of the mouse relative to the plane when the user has made an interaction to a copy of the display object class and have it react in someway. Furthermore, since Papervision3D tries to flatten the YouTube player, it's having none of it, therefore you're unable to flatten it (as you need the YouTube player to allow the Papervision3D class to manipulate it). So maybe the way is to somehow create a material that doesn't flatten the display object yet still giving us the ability to display the object with all the flexibility flattening it does (such as segmentation for example). If anyone's done this before, care to lend a hand? Otherwise watch this space.

## Comments

**[Monkey](#162 "2009-08-22 00:29:27"):** Im in the middle of the same nightmare - biggest problem i have is the players are to show a playlist and i realy wanted the player sprites to be stored in a array and ready to go so the planes could just be clicked and play (but cand create multiple players because of the out of date as2 player) - as for making the intractive plane my active plane is centered to i just add the movie that the material uses as a regular child over the scene.

**[Gav](#160 "2009-08-21 18:49:36"):** Hi Ahmed, Must have been a stressful day! I'm pretty sure an InteractiveMovieMaterial would cover this? think I've got a test somewhere, not using anything as inteactive as a player but definitely had a few buttons on it.

**[Ahmed](#161 "2009-08-21 20:09:56"):** Now that's a good suggestion, but it seems that it has disappear from the package! Going to try to re-add it...

**[Ahmed](#167 "2009-08-25 13:01:36"):** Ah, I just load it, rather than having lots. It also saves memory when you'll have ability to have lots. I'll try and figure this one out, I'm sure it's something to do with the AS3 vs AS2 VM.

