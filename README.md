[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/GoogleCalendar/functions?utm_source=RapidAPIGitHub_GoogleCalendarFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)


# GoogleCalendar Package
You can use the Google Calendar API to find and view public calendar events. If you're authorized, you can also access and modify private calendars and events on those calendars. Use the Google Calendar API to achieve deeper integration with Google Calendar. Mobile apps, Web apps, and other systems can create, display, or sync with Calendar data.
* Domain: [calendar.google.com](https://calendar.google.com)
* Credentials: clientId, clientSecret

## How to get credentials: 
1. Obtain OAuth 2.0 credentials from the [Google API Console](https://console.developers.google.com/).
2. Send an authentication request to Google
``` 
GET: https://accounts.google.com/o/oauth2/v2/auth
```

|Field|Description|
|-----|-----------|
|client_id|Which you obtain from the API Console.|
|scope|Which in a basic request should be openid email. (Read more at [scope](https://developers.google.com/identity/protocols/OpenIDConnect#scope-param).)|
|response_type|Which in a basic request should be ```code```|
|redirect_uri|Should be the HTTP endpoint on your server that will receive the response from Google. You specify this URI in the API Console.|
3. Call ```getAccessToken``` method.
 
## Custom datatypes:
  |Datatype|Description|Example
  |--------|-----------|----------
  |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
  |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
  |List|Simple array|```["123", "sample"]```
  |Select|String with predefined values|```sample```
  |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 
## GoogleCalendar.getAccessToken
Exchange code for access token.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| The client ID that you obtain from the API Console, as described in Obtain OAuth 2.0 credentials.
| clientSecret| credentials| The client secret that you obtain from the API Console, as described in Obtain OAuth 2.0 credentials.
| code        | String     | The authorization code that is returned from the initial request.
| redirectUri | String     | The URI that you specify in the API Console, as described in Set a redirect URI.
| grantType   | String     | This field must contain a value of authorization_code, as defined in the OAuth 2.0 specification.

## GoogleCalendar.deleteACL
Deletes an access control rule.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| calendarId | String| Calendar identifier. To retrieve calendar IDs call the calendarList.list method. If you want to access the primary calendar of the currently logged in user, use the `primary` keyword.
| ruleId     | String| ACL rule identifier.

## GoogleCalendar.getSingleACL
Returns an access control rule.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| calendarId | String| Calendar identifier. To retrieve calendar IDs call the calendarList.list method. If you want to access the primary calendar of the currently logged in user, use the `primary` keyword.
| ruleId     | String| ACL rule identifier.

## GoogleCalendar.createACL
Creates an access control rule.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| calendarId | String| Calendar identifier. To retrieve calendar IDs call the calendarList.list method. If you want to access the primary calendar of the currently logged in user, use the `primary` keyword.
| role       | Select| The role assigned to the scope. Possible values are: `none` - Provides no access. `freeBusyReader` - Provides read access to free/busy information. `reader` - Provides read access to the calendar. Private events will appear to users with reader access, but event details will be hidden. `writer` - Provides read and write access to the calendar. Private events will appear to users with writer access, and event details will be visible. `owner` - Provides ownership of the calendar. This role has all of the permissions of the writer role with the additional ability to see and manipulate ACLs.
| scopeType  | Select| The type of the scope. Possible values are: `default` - The public scope. This is the default value. `user` - Limits the scope to a single user. `group` - Limits the scope to a group. `domain` - Limits the scope to a domain.
| scopeValue | String| The email address of a user or group, or the name of a domain, depending on the scope type. Omitted for type `default`.

## GoogleCalendar.getAllACLs
Returns the rules in the access control list for the calendar. 

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| calendarId | String| Calendar identifier. To retrieve calendar IDs call the calendarList.list method. If you want to access the primary calendar of the currently logged in user, use the `primary` keyword.
| maxResults | Number| Maximum number of entries returned on one result page. By default the value is 100 entries. The page size can never be larger than 250 entries.
| pageToken  | String| Token specifying which result page to return.
| showDeleted| Select| Whether to include deleted ACLs in the result. Deleted ACLs are represented by role equal to `none`. Deleted ACLs will always be included if syncToken is provided. Optional. The default is False.
| syncToken  | String| Token obtained from the nextSyncToken field returned on the last page of results from the previous list request. 

## GoogleCalendar.updateACL
Updates an access control rule. This method supports patch semantics.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| calendarId | String| Calendar identifier. To retrieve calendar IDs call the calendarList.list method. If you want to access the primary calendar of the currently logged in user, use the `primary` keyword.
| ruleId     | String| ACL rule identifier.
| role       | Select| The role assigned to the scope. Possible values are: `none` - Provides no access. `freeBusyReader` - Provides read access to free/busy information. `reader` - Provides read access to the calendar. Private events will appear to users with reader access, but event details will be hidden. `writer` - Provides read and write access to the calendar. Private events will appear to users with writer access, and event details will be visible. `owner` - Provides ownership of the calendar. This role has all of the permissions of the writer role with the additional ability to see and manipulate ACLs.
| scopeType  | Select| The type of the scope. Possible values are: `default` - The public scope. This is the default value. `user` - Limits the scope to a single user. `group` - Limits the scope to a group. `domain` - Limits the scope to a domain.
| scopeValue | String| The email address of a user or group, or the name of a domain, depending on the scope type. Omitted for type `default`.

## GoogleCalendar.watchACL
Watch for changes to ACL resources.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| calendarId | String| Calendar identifier. To retrieve calendar IDs call the calendarList.list method. If you want to access the primary calendar of the currently logged in user, use the `primary` keyword.
| id         | String| A UUID or similar unique string that identifies this channel.
| token      | String| An arbitrary string delivered to the target address with each notification delivered over this channel.
| type       | String| The type of delivery mechanism used for this channel.
| address    | String| The address where notifications are delivered for this channel.
| ttl        | String| The time-to-live in seconds for the notification channel. Default is 3600 seconds.

## GoogleCalendar.deleteCalendarList
Deletes an entry on the user's calendar list.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| calendarId | String| Calendar identifier. To retrieve calendar IDs call the calendarList.list method. If you want to access the primary calendar of the currently logged in user, use the `primary` keyword.

## GoogleCalendar.getCalendarList
Returns an entry on the user's calendar list.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| calendarId | String| Calendar identifier. To retrieve calendar IDs call the calendarList.list method. If you want to access the primary calendar of the currently logged in user, use the `primary` keyword.

## GoogleCalendar.createEntryToCalendarList
Adds an entry to the user's calendar list.

| Field           | Type  | Description
|-----------------|-------|----------
| accessToken     | String| OAuth 2.0 token for the current user.
| defaultReminders| Array | Default Reminders array
| id              | String| Identifier of the calendar.
| colorRgbFormat  | Select| Whether to use the foregroundColor and backgroundColor fields to write the calendar colors (RGB). If this feature is used, the index-based colorId field will be set to the best matching option automatically. 
| notifications   | Array | Notifications
| backgroundColor | String| The main color of the calendar in the hexadecimal format `#0088aa`. 
| colorId         | String| The color of the calendar.
| defaultReminders| List  | The default reminders that the authenticated user has for this calendar.
| foregroundColor | String| The foreground color of the calendar in the hexadecimal format.
| hidden          | Select| Whether the calendar has been hidden from the list.
| selected        | Select| Whether the calendar content shows up in the calendar UI.
| summaryOverride | String| The summary that the authenticated user has set for this calendar.

## GoogleCalendar.getCalendarListEntry
Returns entries on the user's calendar list.

| Field        | Type  | Description
|--------------|-------|----------
| accessToken  | String| OAuth 2.0 token for the current user.
| maxResults   | Number| Maximum number of entries returned on one result page. By default the value is 100 entries. The page size can never be larger than 250 entries. Optional.
| minAccessRole| Select| The minimum access role for the user in the returned entries. Optional. The default is no restriction. Must be: freeBusyReader,owner,reader,writer
| pageToken    | String| Token specifying which result page to return.
| showDeleted  | Select| Whether to include deleted calendar list entries in the result. Optional. The default is False.
| showHidden   | Select| Whether to show hidden entries. Optional. The default is False.
| syncToken    | String| Token obtained from the nextSyncToken field returned on the last page of results from the previous list request.

## GoogleCalendar.updateCalendarListEntry
Updates an entry on the user's calendar list. This method supports patch semantics.

| Field           | Type  | Description
|-----------------|-------|----------
| accessToken     | String| OAuth 2.0 token for the current user.
| calendarId      | String| Calendar identifier.
| defaultReminders| Array | Default Reminders array
| id              | String| Identifier of the calendar.
| colorRgbFormat  | Select| Whether to use the foregroundColor and backgroundColor fields to write the calendar colors (RGB). If this feature is used, the index-based colorId field will be set to the best matching option automatically. 
| notifications   | Array | Notifications
| backgroundColor | String| The main color of the calendar in the hexadecimal format `#0088aa`. 
| colorId         | String| The color of the calendar.
| defaultReminders| List  | The default reminders that the authenticated user has for this calendar.
| foregroundColor | String| The foreground color of the calendar in the hexadecimal format.
| hidden          | Select| Whether the calendar has been hidden from the list.
| selected        | Select| Whether the calendar content shows up in the calendar UI.
| summaryOverride | String| The summary that the authenticated user has set for this calendar.

## GoogleCalendar.watchCalendarList
Watch for changes to CalendarList resources.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| id         | String| A UUID or similar unique string that identifies this channel.
| token      | String| An arbitrary string delivered to the target address with each notification delivered over this channel.
| type       | String| The type of delivery mechanism used for this channel.
| address    | String| The address where notifications are delivered for this channel.
| ttl        | String| The time-to-live in seconds for the notification channel. Default is 3600 seconds.

## GoogleCalendar.clearCalendar
Clears a primary calendar. This operation deletes all events associated with the primary calendar of an account.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| calendarId | String| Calendar identifier. To retrieve calendar IDs call the calendarList.list method. If you want to access the primary calendar of the currently logged in user, use the `primary` keyword.

## GoogleCalendar.deleteCalendar
Deletes a secondary calendar. Use calendars.clear for clearing all events on primary calendars.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| calendarId | String| Calendar identifier. To retrieve calendar IDs call the calendarList.list method. If you want to access the primary calendar of the currently logged in user, use the `primary` keyword.

## GoogleCalendar.getCalendarMetadata
Returns metadata for a calendar.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| calendarId | String| Calendar identifier. To retrieve calendar IDs call the calendarList.list method. If you want to access the primary calendar of the currently logged in user, use the `primary` keyword.

## GoogleCalendar.createCalendar
Creates a secondary calendar.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| summary    | String| Title of the calendar.
| description| String| Description of the calendar.
| etag       | String| ETag of the resource.
| kind       | String| Type of the resource (`calendar#calendar`).
| location   | String| Geographic location of the calendar as free-form text.
| timeZone   | String| The time zone of the calendar.

## GoogleCalendar.updateCalendar
Updates metadata for a calendar. This method supports patch semantics.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| calendarId | String| Calendar identifier.
| summary    | String| Title of the calendar.
| description| String| Description of the calendar.
| etag       | String| ETag of the resource.
| kind       | String| Type of the resource (`calendar#calendar`).
| location   | String| Geographic location of the calendar as free-form text.
| timeZone   | String| The time zone of the calendar.

## GoogleCalendar.stopChannel
Stop watching resources through this channel. 

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| id         | String| A UUID or similar unique string that identifies this channel.
| resourceId | String| An opaque ID that identifies the resource being watched on this channel. Stable across different API versions.
| token      | String| An arbitrary string delivered to the target address with each notification delivered over this channel.

## GoogleCalendar.getColorDefinitions
Returns the color definitions for calendars and events.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.

## GoogleCalendar.deleteEvent
Deletes an event.

| Field            | Type  | Description
|------------------|-------|----------
| accessToken      | String| OAuth 2.0 token for the current user.
| calendarId       | String| Calendar identifier.
| eventId          | String| Event identifier.
| sendNotifications| Select| Whether to send notifications about the deletion of the event. Boolean.

## GoogleCalendar.getEvent
Deletes an event.

| Field             | Type  | Description
|-------------------|-------|----------
| accessToken       | String| OAuth 2.0 token for the current user.
| calendarId        | String| Calendar identifier.
| eventId           | String| Event identifier.
| alwaysIncludeEmail| Select| Whether to always include a value in the email field for the organizer, creator and attendees, even if no real email is available (i.e. a generated, non-working value will be provided). Boolean.
| maxAttendees      | Number| The maximum number of attendees to include in the response. If there are more than the specified number of attendees, only the participant is returned.
| timeZone          | String| Time zone used in the response.

## GoogleCalendar.importEvent
Imports an event. This operation is used to add a private copy of an existing event to a calendar.

| Field              | Type  | Description
|--------------------|-------|----------
| accessToken        | String| OAuth 2.0 token for the current user.
| calendarId         | String| Calendar identifier.
| eventObject        | JSON  | Event resources.
| maxAttendees       | Number| The maximum number of attendees to include in the response. If there are more than the specified number of attendees, only the participant is returned.
| sendNotifications  | Select| Whether to send notifications about the creation of the new event. 
| supportsAttachments| Select| Whether API client performing operation supports event attachments. 

## GoogleCalendar.getEventInstances
Returns instances of the specified recurring event.

| Field             | Type      | Description
|-------------------|-----------|----------
| accessToken       | String    | OAuth 2.0 token for the current user.
| calendarId        | String    | Calendar identifier.
| eventId           | String    | Recurring event identifier.
| alwaysIncludeEmail| Select    | Whether to always include a value in the email field for the organizer, creator and attendees, even if no real email is available (i.e. a generated, non-working value will be provided). The use of this option is discouraged and should only be used by clients which cannot handle the absence of an email address value in the mentioned places. The default is False.
| maxAttendees      | Number    | The maximum number of attendees to include in the response. If there are more than the specified number of attendees, only the participant is returned.
| maxResults        | Number    | Maximum number of events returned on one result page. By default the value is 250 events. The page size can never be larger than 2500 events.
| originalStart     | String    | The original start time of the instance in the result.
| pageToken         | String    | Token specifying which result page to return.
| showDeleted       | Select    | Whether to include deleted events (with status equals `cancelled`) in the result. Cancelled instances of recurring events will still be included if singleEvents is False.
| timeMax           | DatePicker| Upper bound (exclusive) for an event's start time to filter by. The default is not to filter by start time. Must be an RFC3339 timestamp with mandatory time zone offset.
| timeMin           | DatePicker| Lower bound (inclusive) for an event's end time to filter by. The default is not to filter by end time. Must be an RFC3339 timestamp with mandatory time zone offset.
| timeZone          | String    | Time zone used in the response. The default is the time zone of the calendar.

## GoogleCalendar.getCalendarEvents
Returns instances of the specified recurring event.

| Field                  | Type      | Description
|------------------------|-----------|----------
| accessToken            | String    | OAuth 2.0 token for the current user.
| calendarId             | String    | Calendar identifier.
| alwaysIncludeEmail     | Select    | Whether to always include a value in the email field for the organizer, creator and attendees, even if no real email is available (i.e. a generated, non-working value will be provided). The use of this option is discouraged and should only be used by clients which cannot handle the absence of an email address value in the mentioned places. The default is False.
| iCalUID                | String    | Specifies event ID in the iCalendar format to be included in the response.
| maxAttendees           | Number    | The maximum number of attendees to include in the response. If there are more than the specified number of attendees, only the participant is returned.
| maxResults             | Number    | Maximum number of events returned on one result page. By default the value is 250 events. The page size can never be larger than 2500 events.
| orderBy                | Select    | The order of the events returned in the result. Must be: startTime, updated
| pageToken              | String    | Token specifying which result page to return.
| privateExtendedProperty| String    | Extended properties constraint specified as propertyName=value. Matches only private properties. This parameter might be repeated multiple times to return events that match all given constraints.
| query                  | String    | Free text search terms to find events that match these terms in any field, except for extended properties.
| sharedExtendedProperty | String    | Extended properties constraint specified as propertyName=value. Matches only shared properties. This parameter might be repeated multiple times to return events that match all given constraints.
| showDeleted            | Select    | Whether to include deleted events (with status equals `cancelled`) in the result. Cancelled instances of recurring events will still be included if singleEvents is False.
| showHiddenInvitations  | Select    | Whether to include hidden invitations in the result. 
| singleEvents           | Select    | Whether to expand recurring events into instances and only return single one-off events and instances of recurring events, but not the underlying recurring events themselves.
| timeMax                | DatePicker| Upper bound (exclusive) for an event's start time to filter by. The default is not to filter by start time. Must be an RFC3339 timestamp with mandatory time zone offset.
| timeMin                | DatePicker| Lower bound (inclusive) for an event's end time to filter by. The default is not to filter by end time. Must be an RFC3339 timestamp with mandatory time zone offset.
| timeZone               | String    | Time zone used in the response. The default is the time zone of the calendar.
| updatedMin             | DatePicker| Lower bound for an event's last modification time (as a RFC3339 timestamp) to filter by.

## GoogleCalendar.moveEvent
Moves an event to another calendar, i.e. changes an event's organizer.

| Field            | Type  | Description
|------------------|-------|----------
| accessToken      | String| OAuth 2.0 token for the current user.
| calendarId       | String| Calendar identifier.
| eventId          | String| Event identifier.
| destination      | String| Calendar identifier of the target calendar where the event is to be moved to.
| sendNotifications| Select| Whether to send notifications about the change of the event's organizer. 

## GoogleCalendar.updateEvent
Updates an event. This method supports patch semantics.

| Field              | Type  | Description
|--------------------|-------|----------
| accessToken        | String| OAuth 2.0 token for the current user.
| calendarId         | String| Calendar identifier.
| eventId            | String| Event identifier.
| alwaysIncludeEmail | Select| Whether to always include a value in the email field for the organizer, creator and attendees, even if no real email is available (i.e. a generated, non-working value will be provided). The use of this option is discouraged and should only be used by clients which cannot handle the absence of an email address value in the mentioned places. The default is False.
| maxAttendees       | Number| The maximum number of attendees to include in the response. If there are more than the specified number of attendees, only the participant is returned.
| sendNotifications  | Select| Whether to send notifications about the change of the event's organizer. 
| supportsAttachments| Select| Whether API client performing operation supports event attachments.
| eventObject        | JSON  | Event resources.

## GoogleCalendar.createSimpleEvent
Updates an event. This method supports patch semantics.

| Field            | Type  | Description
|------------------|-------|----------
| accessToken      | String| OAuth 2.0 token for the current user.
| calendarId       | String| Calendar identifier.
| text             | String| The text describing the event to be created.
| sendNotifications| Select| Whether to send notifications about the change of the event's organizer. 

## GoogleCalendar.watchEventChanges
Watch for changes to Events resources. 

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| calendarId | String| Calendar identifier.
| id         | String| A UUID or similar unique string that identifies this channel.
| token      | String| An arbitrary string delivered to the target address with each notification delivered over this channel.
| type       | String| The type of delivery mechanism used for this channel.
| address    | String| The address where notifications are delivered for this channel.
| ttl        | String| The time-to-live in seconds for the notification channel. Default is 3600 seconds.

## GoogleCalendar.getFreebusyInformation
Returns free/busy information for a set of calendars.

| Field               | Type      | Description
|---------------------|-----------|----------
| accessToken         | String    | OAuth 2.0 token for the current user.
| timeMax             | DatePicker| Upper bound (exclusive) for an event's start time to filter by. The default is not to filter by start time. Must be an RFC3339 timestamp with mandatory time zone offset.
| timeMin             | DatePicker| Lower bound (inclusive) for an event's end time to filter by. The default is not to filter by end time. Must be an RFC3339 timestamp with mandatory time zone offset.
| timeZone            | String    | Time zone used in the response. The default is the time zone of the calendar.
| groupExpansionMax   | Number    | Maximal number of calendar identifiers to be provided for a single group. An error will be returned for a group with more members than this value.
| calendarExpansionMax| Number    | Maximal number of calendars for which FreeBusy information is to be provided.
| items               | Array     | List of calendars and/or groups to query.

## GoogleCalendar.getSingleUserSettings
Returns a single user setting.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| setting    | String| The id of the user setting.

## GoogleCalendar.getAllSettings
Returns all user settings for the authenticated user.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| maxResults | Number| Maximum number of entries returned on one result page. By default the value is 100 entries. The page size can never be larger than 250 entries.
| pageToken  | String| Token specifying which result page to return.

## GoogleCalendar.watchSettingsChanges
Watch for changes to Settings resources.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| OAuth 2.0 token for the current user.
| id         | String| A UUID or similar unique string that identifies this channel.
| token      | String| An arbitrary string delivered to the target address with each notification delivered over this channel.
| type       | String| The type of delivery mechanism used for this channel.
| address    | String| The address where notifications are delivered for this channel.
| ttl        | String| The time-to-live in seconds for the notification channel. Default is 3600 seconds.

