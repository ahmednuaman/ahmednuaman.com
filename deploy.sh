#!/usr/bin/bash

echo 'Compressing...'
sh compress.sh

echo 'Uploading...'
rsync -e ssh --recursive --progress --verbose --compress \
	--exclude '.svn/' \
	--exclude '.DS_Store' \
	--exclude '.less' \
	--exclude 'jquery.?*.js' \
	--exclude 'data/*' \
	--exclude 'animation.css' \
	public/ ahmednua@fsmg.co.uk:~/www/

echo 'Done!'