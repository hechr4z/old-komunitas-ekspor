<?php


namespace App\Controllers\NewUser;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HashtagController extends BaseController
{
    public function index()
    {
        return view('NewUser/hashtag/hashtag');
    }

    public function generate()
    {
        $query = $this->request->getVar('query');

        if (!$query) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'Query parameter is required']);
        }

        $url = "https://hash-tag-generator.p.rapidapi.com/get_has_tags?query=" . urlencode($query) . "&language=en";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "x-rapidapi-key: " . env('RAPIDAPI_KEY'),
            "x-rapidapi-host: hash-tag-generator.p.rapidapi.com"
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch) || $httpCode != 200) {
            $error = curl_error($ch);
            curl_close($ch);
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
                ->setJSON(['error' => 'Failed to fetch data from API: ' . $error]);
        }

        curl_close($ch);
        return $this->response->setJSON(json_decode($response, true));
    }
}
