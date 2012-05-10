# open xscreensaver GUI, then kill it and reopen, to create config file

# opening GUI creates config file.

xscreensaver &

sleep 3

xscreensaver-demo

sleep 3

killall xscreensaver

xscreensaver &
 
sleep 10
 
# configure xscreensaver 

sed -ie 's|\(grabDesktopImages: \).*|\1false|' ~/.xscreensaver
sed -ie 's|\(grabVideoFrames: \).*|\1false|' ~/.xscreensaver
sed -ie 's|\(chooseRandomImages: \).*|\1true|' ~/.xscreensaver
sed -ie 's|\(imageDirectory: \).*|\1\/var/www/html/Slideshow/|' ~/.xscreensaver
sed -ie 's|\(mode: \).*|\1one|' ~/.xscreensaver
sed -ie 's|\(selected: \).*|\1142|' ~/.xscreensaver

# remove self from crontab

crontab -r

rm ~/.INSTALL_NEW_USER.sh
