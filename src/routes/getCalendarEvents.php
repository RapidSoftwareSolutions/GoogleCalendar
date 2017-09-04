<?php

$app->post('/api/GoogleCalendar/getCalendarEvents', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken','calendarId']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['accessToken'=>'accessToken','calendarId'=>'calendarId'];
    $optionalParams = ['alwaysIncludeEmail'=>'alwaysIncludeEmail','iCalUID'=>'iCalUID','maxAttendees'=>'maxAttendees','maxResults'=>'maxResults','orderBy'=>'orderBy','pageToken'=>'pageToken','privateExtendedProperty'=>'privateExtendedProperty','query'=>'query','sharedExtendedProperty'=>'sharedExtendedProperty','showDeleted'=>'showDeleted','showHiddenInvitations'=>'showHiddenInvitations','singleEvents'=>'singleEvents','timeMax'=>'timeMax','timeMin'=>'timeMin','timeZone'=>'timeZone','updatedMin'=>'updatedMin'];
    $bodyParams = [
       'query' => ['alwaysIncludeEmail','iCalUID','maxAttendees','maxResults','orderBy','pageToken','privateExtendedProperty','q','sharedExtendedProperty','showDeleted','showHiddenInvitations','singleEvents','timeMax','timeMin','timeZone','updatedMin']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    if(!empty($data['timeMax'])){
        $data['timeMax'] = \Models\Params::toFormat($data['timeMax'], "Y-m-d\\TH:i:sP");
    }
    if(!empty($data['timeMin'])){
        $data['timeMin'] = \Models\Params::toFormat($data['timeMin'], "Y-m-d\\TH:i:sP");
    }
    if(!empty($data['updatedMin'])){
        $data['updatedMin'] = \Models\Params::toFormat($data['updatedMin'], "Y-m-d\\TH:i:sP");
    }


    $client = $this->httpClient;
    $query_str = "https://www.googleapis.com/calendar/v3/calendars/{$data['calendarId']}/events";


    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = ["Authorization"=>"Bearer {$data['accessToken']}"];

    try {
        $resp = $client->get($query_str, $requestParams);
        $responseBody = $resp->getBody()->getContents();

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});