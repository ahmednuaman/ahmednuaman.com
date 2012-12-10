#!/usr/bin/env bash
DIR='deploy'
TAR='site.tar'

echo 'Exporting GIT to archive'
cp -R public $DIR

echo 'Updating version.php'
sed -i.bak "s/define('VERSION', '1')/define('VERSION', '$(git show -s --pretty=format:%T)')/g" $DIR/version.php
rm $DIR/version.php.bak

echo 'Compressing files'
FOLDERS=('css' 'js')

for folder in "${FOLDERS[@]}"; do
    # set out path
    DIST=$DIR/assets/$folder/dist/packaged.$folder

    # check the dir exists
    if [[ ! -d "$DIR/assets/$folder/dist/" ]]; then
        # let's make it
        mkdir $DIR/assets/$folder/dist/
    fi

    # clean the dir
    rm -rf $DIR/assets/$folder/dist/*

    # concat and minify
    cat $DIR/assets/$folder/vendor/*.$folder > $DIST
    cat $DIR/assets/$folder/*.$folder >> $DIST
    yuglify $DIST

    # remove unmin'd file
    rm $DIST
    rm $DIR/assets/$folder/*.$folder
    rm -rf $DIR/assets/$folder/vendor

    # move files
    mv $DIR/assets/$folder/dist/*.$folder $DIR/assets/$folder/
    rm -rf $DIR/assets/$folder/dist/
done

echo 'Cleaning up'
rm $DIR/assets/css/*.less

echo 'Uploading files'
tar -cf $TAR $DIR/*
scp $TAR 134045@console.dc0.gpaas.net:~/web/vhosts/www.ahmednuaman.com/

echo 'Deleting tmp shiz'
rm -rf $DIR $TAR