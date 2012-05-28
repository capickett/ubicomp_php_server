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
# [MODULE_LOAD_ORDER]
#     Modules listed below are loaded in order by index
#     Modules located in modules/ are loaded in undefined order
##
$CONFIG['MODULE_LOAD_ORDER'] = array(
    'youtube',
    'slideshow',
    'vnc'
);

# Dynamically load un-listed modules
foreach (glob('modules/*/') as $module) {
    if (!in_array(basename($module), $CONFIG['MODULE_LOAD_ORDER'])) {
        $CONFIG['MODULE_LOAD_ORDER'][] = basename($module);
    }
}

##
# [MODULE_*]
#     Dynamically load module's root, config, and styles directories for convenience
##
foreach ($CONFIG['MODULE_LOAD_ORDER'] as $module) {
    $CONFIG['MODULE_' . $module] = array(
        'ROOT_DIR' => 'modules/' . $module,
        'CONFIG_DIR' => 'modules/' . $module . '/config',
        'STYLES_DIR' => 'modules/' . $module . '/styles'
    );
}
