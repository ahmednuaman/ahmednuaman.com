title: Quickly Prepare A GAE Model For Serialisation
link: http://www.ahmednuaman.com/blog/quickly-prepare-a-gae-model-for-serialisation/
creator: ahmed
description: 
post_id: 686
post_date: 2011-04-28 16:21:51
post_date_gmt: 2011-04-28 15:21:51
comment_status: open
post_name: quickly-prepare-a-gae-model-for-serialisation
status: publish
post_type: post

# Quickly Prepare A GAE Model For Serialisation

If you've ever needed to just dump a GAE model back to the browser (through JSON serialisation for example) then you know it's a bit of a pain in the arse. Have no fear though, I've written a little class for you: ` #!/usr/bin/env python def serialise_model(m, d): # let's serialise this bad boy ps = m.properties() # check if we're dealing with a list or not if isinstance( d, list ): # prepare list for return r = [ ] # cycle through the list for i in d: r.append( _serialise_model_cycle( ps, i ) ) # return list return r else: # just cycle through the data return _serialise_model_cycle( ps, d ) def _serialise_model_cycle(ps, d): # prepare the return dict r = { } # we cycle through the properties of the model for k, p in ps.iteritems(): v = getattr( d, k ) # if the value isn't empty, we add it to the list if v is not None and v != '': # set the value r[ k ] = v # don't forget the key r[ 'key' ] = str( d.key() ) # return the data return r ` (It's also up on Github as a gist: [https://gist.github.com/946538](https://gist.github.com/946538). This is how you use it: Step 1: import it ` from serialise import serialise_model ` Step 2: get your model (it can be a list too) ` model = Model().get( ... ) ` Step 3: serialise it's ass ` serial = serialise_model( model ) ` And then you can take 'serial' and serialise it ready to send to the browser :)