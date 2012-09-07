<?php

# TV PHP Media Server
# (c) Copyright 2012 Patrick Larson, Cameron Pickett
# UW CSE, UbiComp Research Group
#
# Server Config

##
# [LOG_TS]
#     Timestamp to be used for log file naming convention
$CONFIG['LOG_TS'] = 'dmy-Hi';
##

##
# [MODS]
#     Modules listed below are loaded in order by index
#     Modules located in modules-enabled/ are loaded in undefined order
##
$CONFIG['MODS'] = array(
#    'youtube',
#    'slideshow',
#    'vnc'
);

# Dynamically load un-listed modules
foreach (glob('modules-enabled/*/') as $module) {
    if (!in_array(basename($module), $CONFIG['MODS'])) {
        $CONFIG['MODS'][] = basename($module);
    }
}

# Module constants
$MOD_EN     = 'modules-enabled';
$MOD_DIS    = 'modules';
$CONFIG_DIR = 'config'; # Module-specific configuration sub-dir
$STYLES_DIR = 'styles'; # Module-specific configuration sub-dir