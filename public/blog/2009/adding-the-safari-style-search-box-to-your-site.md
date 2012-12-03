title: Adding the "Safari" Style Search Box to Your Site
link: http://www.ahmednuaman.com/blog/adding-the-safari-style-search-box-to-your-site/
creator: ahmed
description: 
post_id: 325
post_date: 2009-08-07 09:27:38
post_date_gmt: 2009-08-07 09:27:38
comment_status: open
post_name: adding-the-safari-style-search-box-to-your-site
status: publish
post_type: post

# Adding the "Safari" Style Search Box to Your Site

So recently I published a post that contained a quick and simple browser detection snippet for jQuery. In that snippet, I _accidently_ left a reference to a function called "initSafariSearch()". This function simply replaces the standard boring input text box with the nice Safari style one. So without blabbing on more, here's the code: ` function initSafariSearch() { if ( $('#searchinput').length > 0) { var input = document.getElementById( 'searchinput' ); input.setAttribute( 'type', 'search' ); input.setAttribute( 'results', '5' ); input.setAttribute( 'placeholder', 'Search...' ); input.setAttribute( 'autosave', 'com.ahmednuaman' ); input.setAttribute( 'width', '70%' ); $('#searchimage').hide(); $('#searchsubmit').hide(); } } ` Now for the finer points: **Why are you using "getElementById()" instead of $()?** Well, jQuery is a standards compliant framework, and since the input type of "search" isn't standards compliant, jQuery can't/won't (I'm not sure of which) render it. Therefore you've got to "cheat" and use the old school method. **What's all these other attributes?** Well here's a quick rundown: 

  * Autosave: whether or not to save the inputted text, you can specify a boolean or the package name, so mine's "com.ahmednuaman"
  * Results: how many autosaved results to show when you're inputting your query
  * Placeholder: the default text
And further more, if you add this little bit of trickery, you can get the placeholder default text to toggle in and out on focus: ` function initSearchFocus() { $('#searchinput').focus(function() { $(this).val( $(this).val() == 'Search...' ? '' : $(this).val() ); }); $('#searchinput').blur(function() { $(this).val( $(this).val() == '' ? 'Search...' : $(this).val() ); }); } ` Cool yeah? Tell me what you think!

## Comments

**[Gerhard](#142 "2009-08-07 09:36:49"):** Great one, cheers Ahmed!

