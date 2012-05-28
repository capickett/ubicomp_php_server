<?php

# TV PHP Media Server
# (c) Copyright 2012 Patrick Larson, Cameron Pickett
# UW CSE, UbiComp Research Group
#
# YouTube Video Module Config

# FIFO:
#     The location of the fifo for controlling the server
$FIFO = "{$_SERVER['DOCUMENT_ROOT']}{$CONFIG['MODULE_youtube']['ROOT_DIR']}/mplayer.fifo";

# COOKIES_FILE:
#     The location of the file storing the cookies shared between mplayer
#     and youtube-dl
$COOKIES = '/var/tmp/youtube-dl-cookies.txt';
