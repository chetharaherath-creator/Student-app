@extends('youtube.layout')

@section('title', 'My Playlists')

@section('content')
    <div class="card" style="text-align: center; max-width: 500px; margin-left: auto; margin-right: auto;">
        @auth
            <h2 style="margin-top: 0; color: #333;">Create a New Playlist</h2>
            <form action="/youtube-playlist" method="POST" style="flex-direction: column; align-items: center; gap: 15px;">
                @csrf
                <input type="text" name="title" placeholder="Playlist Title (e.g. My Favorites)" required>
                <input type="text" name="description" placeholder="Optional Description">
                <button type="submit" class="btn-primary" style="width: 100%;">Create Playlist</button>
            </form>
        @else
            <h2 style="margin-top: 0; color: #333;">Want to manage your playlists?</h2>
            <p style="color: #666; margin-bottom: 20px;">Log in to create new playlists and view your existing ones right from this app.</p>
            <a href="/auth/google" style="display: inline-block; padding: 12px 24px; background-color: #4285F4; color: white; border-radius: 8px; font-weight: bold; text-decoration: none; transition: background-color 0.2s;">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor" style="vertical-align: text-bottom; margin-right: 5px;">
                    <path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"/>
                </svg>
                Log in with Google
            </a>
        @endauth
    </div>

    @auth
        @if(isset($myPlaylists) && count($myPlaylists) > 0)
            <div style="margin-top: 50px; margin-bottom: 40px;">
                <h2 style="border-bottom: 2px solid #ff0000; padding-bottom: 10px; display: inline-block; color: #333;">My YouTube Playlists</h2>
                <div class="video-grid" style="margin-top: 20px;">
                    @foreach($myPlaylists as $playlist)
                        <a href="https://www.youtube.com/playlist?list={{ $playlist['id'] }}" target="_blank" class="video-card">
                            <img src="{{ $playlist['snippet']['thumbnails']['medium']['url'] ?? ($playlist['snippet']['thumbnails']['default']['url'] ?? 'https://via.placeholder.com/320x180.png?text=No+Thumbnail') }}" alt="Playlist Thumbnail">
                            <div class="video-info">
                                <p class="video-title">{{ html_entity_decode($playlist['snippet']['title']) }}</p>
                                <p class="video-desc">{{ $playlist['snippet']['description'] ?: 'No description' }}</p>
                                @if(isset($playlist['contentDetails']['itemCount']))
                                    <p style="font-size: 13px; color: #ff0000; font-weight: bold; margin-top: 8px; margin-bottom: 0;">{{ $playlist['contentDetails']['itemCount'] }} videos</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @elseif(isset($myPlaylists))
            <p style="text-align: center; font-size: 18px; color: #666; margin-top: 50px;">You don't have any playlists yet.</p>
        @endif
    @endauth
@endsection
