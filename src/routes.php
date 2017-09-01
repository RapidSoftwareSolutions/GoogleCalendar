<?php
$routes = [
    'metadata',
    'getAccessToken',
    'deleteACL',
    'getSingleACL',
    'createACL',
    'getAllACLs',
    'updateACL',
    'deleteCalendarList',
    'getCalendarList',
    'createEntryToCalendarList',
    'getCalendarListEntry',
    'updateCalendarListEntry',
    'clearCalendar',
    'deleteCalendar',
    'getCalendarMetadata',
    'createCalendar',
    'updateCalendar',
    'getColorDefinitions',
    'deleteEvent',
    'getEvent',
    'importEvent',
    'getEventInstances',
    'getCalendarEvents',
    'moveEvent',
    'updateEvent',
    'createSimpleEvent',
    'getFreebusyInformation',
    'getSingleUserSettings',
    'getAllSettings'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

