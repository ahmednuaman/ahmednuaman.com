#!/usr/bin/bash

cd public/assets/

# compress css
echo 'Compressing CSS'
cat css/*.css > css/styles.tmp
mv css/styles.tmp css/styles.css
java -jar ~/SRC/jar/yuicompressor.jar css/styles.css -o css/styles.css

# compress js
echo 'Compressing JS'
rm -f js/packaged.js
cat js/*.js > js/packaged.tmp
mv js/packaged.tmp js/packaged.js
java -jar ~/SRC/jar/yuicompressor.jar js/packaged.js -o js/packaged.js

# compress png
# echo 'Compressing PNGs'
# optipng -o7 image/*.png

# compress jpegs
# echo 'Compressing JPEGs'

# done!
echo 'Done compressing!'
cd ../../