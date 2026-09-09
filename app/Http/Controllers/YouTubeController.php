<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YouTubeController extends Controller
{
    public function index()
    {
        // Simply show the search form for the GET request
        return view('youtube.search');
    }

    public function search(Request $request)
    {
        // Handle the form submission for the POST request
        $request->validate([
            'query' => 'required|string|max:255'
        ]);

        $query = $request->input('query');
        $apiKey = config('services.youtube.key');

        // Make the GET request to YouTube API
        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'part' => 'snippet',
            'q' => $query,
            'key' => $apiKey,
            'type' => 'video',
            'maxResults' => 12
        ]);

        $videos = [];
        if ($response->successful()) {
            $videos = $response->json()['items'] ?? [];
        }

        return view('youtube.search', compact('videos', 'query'));
    }

    public function playlists()
    {
        $myPlaylists = $this->getPlaylists();
        return view('youtube.playlists', compact('myPlaylists'));
    }

    public function createPlaylist(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $user = auth()->user();

        if (!$user || !$user->google_token) {
            return redirect('/auth/google');
        }

        $client = new \Google\Client();
        $client->setAccessToken($user->google_token);

        // If the token is expired, use the refresh token
        if ($client->isAccessTokenExpired() && $user->google_refresh_token) {
            $client->fetchAccessTokenWithRefreshToken($user->google_refresh_token);
            $user->update(['google_token' => $client->getAccessToken()['access_token']]);
        }

        $youtube = new \Google\Service\YouTube($client);

        $snippet = new \Google\Service\YouTube\PlaylistSnippet();
        $snippet->setTitle($request->input('title'));
        $snippet->setDescription($request->input('description') ?? 'Created via Laravel App');

        $status = new \Google\Service\YouTube\PlaylistStatus();
        $status->setPrivacyStatus('private');

        $playlist = new \Google\Service\YouTube\Playlist();
        $playlist->setSnippet($snippet);
        $playlist->setStatus($status);

        try {
            $response = $youtube->playlists->insert('snippet,status', $playlist);
            return redirect('/youtube-playlists')->with('success', 'Playlist "' . $request->input('title') . '" created successfully! Check your YouTube account.');
        } catch (\Exception $e) {
            return redirect('/youtube-playlists')->with('error', 'Failed to create playlist: ' . $e->getMessage());
        }
    }

    private function getPlaylists()
    {
        $user = auth()->user();

        if (!$user || !$user->google_token) {
            return [];
        }

        $client = new \Google\Client();
        $client->setAccessToken($user->google_token);

        if ($client->isAccessTokenExpired() && $user->google_refresh_token) {
            $client->fetchAccessTokenWithRefreshToken($user->google_refresh_token);
            $user->update(['google_token' => $client->getAccessToken()['access_token']]);
        }

        $youtube = new \Google\Service\YouTube($client);

        try {
            $response = $youtube->playlists->listPlaylists('snippet,contentDetails', ['mine' => true, 'maxResults' => 10]);
            return $response->getItems() ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }
}
