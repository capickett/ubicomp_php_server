#!/bin/bash 
 
# install needed programs and repos

rpm -Uvh http://download1.rpmfusion.org/free/fedora/rpmfusion-free-release-stable.noarch.rpm
 
rpm -Uvh http://download1.rpmfusion.org/nonfree/fedora/rpmfusion-nonfree-release-stable.noarch.rpm
 
echo "y" | yum install httpd php xscreensaver youtube-dl mplayer

# Move files from repo to web directory #
 
cp ./* /var/www/html

# turn on php #

/etc/init.d/httpd start

chkconfig --levels 235 httpd on

# add new user for tvserver #

useradd tvserver

echo -e "ubicomp\nubicomp" | passwd tvserver

cp /etc/httpd/conf/httpd.conf /etc/httpd/conf/httpd.conf.bak

sed -ie 's|\(User\) apache|\1 tvserver|' /etc/httpd/conf/httpd.conf

sed -ie 's|\(Group\) apache|\1 tvserver|' /etc/httpd/conf/httpd.conf

# remove gnome-screensaver #

echo "y" | yum remove gnome-screensaver.i686

killall gnome-screensaver

# schedule install part two on reboot

cp ./INSTALL_NEW_USER.sh /home/tvserver/.INSTALL_NEW_USER.sh

echo "@reboot ~/.INSTALL_NEW_USER.sh" > install.tmp && crontab -u tvserver install.tmp && rm -f install.tmp

# finished

echo "Installation part one complete, to finish the installation, please "
echo "reboot and login as tvserver"
