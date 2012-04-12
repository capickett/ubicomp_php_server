#!/bin/bash 

# Move files from repo to web directory #

mv ./* /var/www/html

# install needed repos and update yum #

echo "y" | yum localinstall --nogpgcheck http://download1.rpmfusion.org/free/fedora/rpmfusion-free-release-stable.noarch.rpm http://download1.rpmfusion.org/nonfree/fedora/rpmfusion-nonfree-release-stable.noarch.rpm

rpm -Uvh http://rpms.famillecollet.com/remi-release-16.rpm

echo "y" | yum update

# install and configure php and apache #

echo "y" | yum -y --enablerepo=remi install httpd php php-common

# Move files from repo to web directory #
 
mv ./* /var/www/html

# turn on php #

/etc/init.d/httpd start

chkconfig --levels 235 httpd on

# add new user for tvserver #

useradd tvserver

echo -e "ubicomp\nubicomp" | passwd tvserver

# TODO: Change server user and group #

# install programs needed by web app and remove gnome-screensaver #

echo "y" | yum -y install mplayer youtube-dl xscreensaver

echo "y" | yum remove gnome-screensaver.i686

# start xscreensaver and configure the configuration file #

xscreensaver &
sleep 10000
sed -ie 's|\(grabDesktopImages: \).*|\1false|' .xscreensaver
sed -ie 's|\(grabVideoFrames: \).*|\1false|' .xscreensaver
sed -ie 's|\(chooseRandomImages: \).*|\1true|' .xscreensaver
sed -ie 's|\(imageDirectory: \).*|\1\./images/|' .xscreensaver
sed -ie 's|\(mode: \).*|\1one|' .xscreensaver
sed -ie 's|\(selected: \).*|\1142|' .xscreensaver
