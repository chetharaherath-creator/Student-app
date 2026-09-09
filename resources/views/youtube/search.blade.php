@extends('youtube.layout')

@section('title', 'Search Videos')

@section('content')
    <div class="card" style="text-align: center;">
        <h2 style="margin-top: 0;">Search YouTube Videos</h2>
        <form action="/youtube-search" method="POST" style="flex-direction: row; align-items: center;">
            @csrf
            <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Search for programming tutorials..." required style="width: 60%;">
            <button type="submit" style="width: auto;">Search</button>
        </form>
    </div>

    @if(isset($videos) && count($videos) > 0)
        <div class="video-grid">
            @foreach($videos as $video)
                <a href="https://www.youtube.com/watch?v={{ $video['id']['videoId'] }}" target="_blank" class="video-card">
                    <img src="{{ $video['snippet']['thumbnails']['high']['url'] ?? $video['snippet']['thumbnails']['medium']['url'] }}" alt="Thumbnail">
                    <div class="video-info">
                        <p class="video-title">{{ html_entity_decode($video['snippet']['title']) }}</p>
                        <p class="video-channel">{{ $video['snippet']['channelTitle'] }}</p>
                        <p class="video-desc">{{ $video['snippet']['description'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @elseif(isset($videos))
        <p style="text-align: center; font-size: 18px; color: #666;">No results found for "{{ $query }}".</p>
    @endif
@endsection
