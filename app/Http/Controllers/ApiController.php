<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getData(Request $request) {
        // Retrieve query parameters
        $slackName = $request->query('slack_name');
        $track = $request->query('track');

        // Set current UTC time and current day
        $currentUtcTime = Carbon::now('UTC');
        $currentUtcTime->addMinutes(rand(-2, 2));
        $currentDay = Carbon::now()->format('l');

        // GitHub urls
        $githubFileUrl = 'https://github.com/username/repo/blob/main/file_name.ext';
        $githubRepoUrl = 'https://github.com/Menor25/hng-stage-one.git';

        // Response data
        $data = [
            'slack_name' => $slackName,
            'current_day' => $currentDay,
            'utc_time' => $currentUtcTime->toIso8601String(),
            'track' => $track,
            'github_file_url' => $githubFileUrl,
            'github_repo_url' => $githubRepoUrl,
            'status_code' => 200,
        ];

        // Return the response in JSON format
        return response()->json($data);
    }
}
