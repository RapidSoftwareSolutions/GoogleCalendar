<?php
$routes = [
    'metadata',
    'getAccessToken',
    'deleteACL',
    'getSingleACL',
    'createACL',
    'getAllACLs',
    'updateACL',
    'watchACL',
    'deleteCalendarList',
    'getCalendarList',
    'createEntryToCalendarList',
    'getCalendarListEntry',
    'updateCalendarListEntry',
    'watchCalendarList',
    'clearCalendar',
    'deleteCalendar',
    'getCalendarMetadata',
    'createCalendar',
    'updateCalendar',
    'stopChannel',
    'getColorDefinitions',
    'deleteEvent',
    'getEvent',
    'importEvent',
    'getEventInstances',
    'getCalendarEvents',
    'moveEvent',
    'updateEvent',
    'createSimpleEvent',
    'watchEventChanges',
    'getFreebusyInformation',
    'getSingleUserSettings',
    'getAllSettings',
    'watchSettingsChanges'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

