<?php

namespace App\Http\Controllers;

use App\Traits\GoogleCalendar;
use Illuminate\Http\Request;
use Google_Service_Calendar;
use App\Models\User;
use Str;

class GoogleCalendarController extends Controller
{
    use GoogleCalendar;

    public function connect()
    {
        try
        {
            $client = $this->getClient();
            $authUrl = $client->createAuthUrl();
            // dd($client);
            return redirect($authUrl);
        }catch (\Exception $e) 
        {
            return redirect()->route('home')->with('error', $e->getMessage());
        }
    }

    public function store()
    {
        try
        {
            $user_name = Str::slug(auth()->user()->name);

            $client = $this->getClient();
            $authCode = request('code');

            $credentialsPath = storage_path('app/google-calendar/'.$user_name.'/oauth-token.json');

            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);


            if (!file_exists(dirname($credentialsPath))) {
                mkdir(dirname($credentialsPath), 0700, true);
            }
            file_put_contents($credentialsPath, json_encode($accessToken));

            $service = new Google_Service_Calendar($client);
            $calendarId = $this->createOrCheckCalendar($service);

            User::find(auth()->user()->id)->update([
                'calendar_id' => $calendarId,
            ]);

            return redirect()->route('tutor.setting.index')->with('success', 'Google Calendar Connected Successfully');
        }catch (\Exception $e) 
        {
            return redirect()->route('home')->with('error', $e->getMessage());
        }
        
    }

    public function success()
    {
        return view('front.calendar_success', get_defined_vars());
    }

    public function getEventList()
    {
        try
        {
            // Get the authorized client object and fetch the resources.
            $client = $this->oauth();
            return $this->getEvents($client);
        }catch (\Exception $e) 
        {
            return redirect()->route('home')->with('error', $e->getMessage());
        }
    }

    public function addEvent()
    {
        try
        {
            $params = array(
                'summary' => 'Google I/O 2019',
                'location' => '800 Howard St., San Francisco, CA 94103',
                'description' => 'A chance to hear more about Google\'s developer products.',
                'start' => array(
                  'dateTime' => '2020-11-30T09:00:00-07:00',
                  'timeZone' => 'America/Los_Angeles',
                ),
                'end' => array(
                  'dateTime' => '2020-12-5T17:00:00-07:00',
                  'timeZone' => 'America/Los_Angeles',
                )
            );

            $client = $this->oauth();
            return $this->insertEvent($client, $params);
        }catch (\Exception $e) 
        {
            return redirect()->route('home')->with('error', $e->getMessage());
        }
        

    }
}
