#!/bin/sh
# (c) Copyright 2012 Patrick Larson, Cameron Pickett
# UW CSE, UbiComp Research Group

VNC_FLAGS=-listen 0 -fullscreen -viewonly -encodings "Hextile Tight"
JVNC_FLAGS=-fullscreen -viewonly -encodings "Hextile Tight"

if [ $1 == "vnc" ]
  vncviewer $VNC_FLAGS >> logs/vnc_submit_${2}.log 2>> logs/vnc_submit_${2}.log
fi

if [ $1 == "jvnc" ]
  vncviewer ${2}:${3} -fullscreen -viewonly -encodings "Hextile Tight" >> logs/vnc_submit_${4}.log 2>> logs/vnc_submit_${4}.log
fi