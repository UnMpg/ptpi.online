<?php

use App\Participant;
use Illuminate\Http\Request;

Route::group(['namespace' => 'Api'], function () {
    // home
    Route::get('/articles', 'HomeController@fetchArticles');
    Route::get('/news', 'HomeController@fetchNews');

    // materi
    Route::get('/materi', 'MateriController@fetchMateri');

    // sertifikat
    Route::get('/certificate/{email?}/{seminar_id?}', 'CertificateController@downloadCertificate');
});

Route::post('participant/update-referral', function (Request $request) {
    try {
        $dataReferral = null;
        $users = Participant::whereNull('referral')->skip($request->input('skip', 0))->take($request->input('limit', 5))->get(['id', 'email']);
        foreach ($users as $item) {
            $client = new \GuzzleHttp\Client();
            $requestApi = $client->get('https://www.sehat-ri.net/api/application/v1/referral/check/code/' . strtolower($item->email), ['http_errors' => false]);
            $result = json_decode($requestApi->getBody());
            if (optional($result)->code == 200) {
                $dataReferral = collect($result->data);
                $referralCode = $dataReferral['referral_code'];
                $item->update(['referral' => $referralCode]);
            }
        }
        return 'ok';
    } catch (\Throwable $th) {
        return response()->json([
            'code' => 400,
            'type' => 'danger',
            'message' => $th->getMessage(),
        ], 400);
    }
});

// new seminar
Route::get('participant/data-referral', function (Request $request) {
    $limit = 200;
    $skip = 0;
    try {
        $dataReferral = null;
        return $users = Participant::whereNull('referral')->skip($request->input('skip', $skip))->take($request->input('limit', $limit))->get([
            'nama',
            'email'
        ]);
        $data = [];
        foreach ($users as $item) {
            $client = new \GuzzleHttp\Client();
            $requestApi = $client->get('https://www.sehat-ri.net/api/application/v1/referral/check/code/' . strtolower($item->email), ['http_errors' => false]);
            $result = json_decode($requestApi->getBody());
            if (optional($result)->code == 200) {
                array_push($data, $item->email);
                $dataReferral = collect($result->data);
                $referralCode = $dataReferral['referral_code'];
                $item->update(['referral' => $referralCode]);
            }
        }
        return $data;
    } catch (\Throwable $th) {
        return response()->json([
            'code' => 400,
            'type' => 'danger',
            'message' => $th->getMessage(),
        ], 400);
    }
});

// old seminar
Route::get('participant/data-referral/old', function (Request $request) {
    $limit = 1000;
    $skip = 0;
    try {
        $dataReferral = null;
        return $users = \DB::table('certificate_drafts')->whereNull('referral')->skip($request->input('skip', $skip))->take($request->input('limit', $limit))->get([
            'nama',
            'email'
        ]);
        $data = [];
        foreach ($users as $item) {
            $client = new \GuzzleHttp\Client();
            $requestApi = $client->get('https://www.sehat-ri.net/api/application/v1/referral/check/code/' . strtolower($item->email), ['http_errors' => false]);
            $result = json_decode($requestApi->getBody());
            if (optional($result)->code == 200) {
                // array_push($data, $item->email);
                $dataReferral = collect($result->data);
                $referralCode = $dataReferral['referral_code'];
                \DB::table('certificate_drafts')->where('email', $item->email)->update(['referral' => $referralCode]);
            }
        }
        return 'ok';
    } catch (\Throwable $th) {
        return response()->json([
            'code' => 400,
            'type' => 'danger',
            'message' => $th->getMessage(),
        ], 400);
    }
});
