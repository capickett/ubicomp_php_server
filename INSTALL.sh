#!/bin/bash 

# install needed repos and update yum #

echo "y" | yum localinstall --nogpgcheck http://download1.rpmfusion.org/free/fedora/rpmfusion-free-release-stable.noarch.rpm http://download1.rpmfusion.org/nonfree/fedora/rpmfusion-nonfree-release-stable.noarch.rpm

rpm -Uvh http://rpms.famillecollet.com/remi-release-16.rpm

echo "y" | yum update

# install and configure php and apache #

echo "y" | yum -y --enablerepo=remi install httpd php php-common

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

# install programs needed by web app and remove gnome-screensaver #

echo "y" | yum -y install mplayer youtube-dl xscreensaver

echo "y" | yum remove gnome-screensaver.i686

killall gnome-screensaver

# schedule install part two on reboot

echo "@reboot ./INSTALL_NEW_USER.sh" > install.tmp && crontab -u tvserver install.tmp && rm -f install.tmp
