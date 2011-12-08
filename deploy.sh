#!/usr/bin/bash

echo 'Compressing...'
sh compress.sh

echo 'Compiling...'
curl http://ahmednuaman.dev/dynamic.php > /dev/null

echo 'Uploading...'
rsync -e ssh --recursive --progress --verbose --compress \
	--exclude '.svn/' \
	--exclude '.DS_Store' \
	--exclude '*.less' \
	--exclude 'jquery*' \
	--exclude 'suitcase.js' \
	--exclude 'data' \
	--exclude 'animation.css' \
	--exclude 'dynamic.php' \
	public/ ahmednua@fsmg.co.uk:~/www/

echo 'Done!'