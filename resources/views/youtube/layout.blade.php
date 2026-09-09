<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student App - @yield('title', 'YouTube API')</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0; }
        .navbar { background-color: #ffffff; padding: 15px 30px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .nav-links { display: flex; gap: 20px; align-items: center; }
        .nav-links a { text-decoration: none; color: #333; font-weight: 500; font-size: 16px; padding: 8px 12px; border-radius: 6px; transition: background-color 0.2s; }
        .nav-links a:hover { background-color: #f0f0f0; }
        .nav-links a.active { background-color: #ff0000; color: white; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 30px; }
        form { display: flex; justify-content: center; gap: 10px; }
        input[type="text"] { width: 100%; padding: 12px 20px; font-size: 16px; border: 1px solid #ccc; border-radius: 8px; outline: none; transition: border-color 0.2s; }
        input[type="text"]:focus { border-color: #ff0000; }
        button { padding: 12px 24px; font-size: 16px; background-color: #ff0000; color: white; border: none; border-radius: 8px; cursor: pointer; transition: background-color 0.2s; font-weight: bold; }
        button:hover { background-color: #cc0000; }
        button.btn-secondary { background-color: #666; }
        button.btn-secondary:hover { background-color: #555; }
        button.btn-primary { background-color: #065fd4; }
        button.btn-primary:hover { background-color: #0556bf; }
        .video-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 24px; }
        .video-card { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.2s; display: flex; flex-direction: column; text-decoration: none; color: inherit; }
        .video-card:hover { transform: translateY(-5px); }
        .video-card img { width: 100%; height: auto; aspect-ratio: 16/9; object-fit: cover; }
        .video-info { padding: 16px; flex-grow: 1; display: flex; flex-direction: column; }
        .video-title { font-size: 16px; font-weight: bold; margin: 0 0 8px 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .video-channel { color: #606060; font-size: 14px; margin-bottom: 8px; font-weight: 500; }
        .video-desc { font-size: 14px; color: #777; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .video-card:hover .video-title { color: #065fd4; }
        .alert-success { background-color: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center; }
        .alert-error { background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center; }
    </style>
</head>
<body>

    <div class="navbar">
        <h2 style="margin: 0; color: #ff0000; font-weight: bold; display: flex; align-items: center; gap: 10px;">
            <svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor"><path d="M21.582,6.186c-0.23-0.86-0.908-1.538-1.768-1.768C18.254,4,12,4,12,4S5.746,4,4.186,4.418c-0.86,0.23-1.538,0.908-1.768,1.768C2,7.746,2,12,2,12s0,4.254,0.418,5.814c0.23,0.86,0.908,1.538,1.768,1.768C5.746,20,12,20,12,20s6.254,0,7.814-0.418c0.86-0.23,1.538-0.908,1.768-1.768C22,16.254,22,12,22,12S22,7.746,21.582,6.186z M10,15.464V8.536L16,12L10,15.464z"></path></svg>
            Student App
        </h2>
        <div class="nav-links">
            <a href="/youtube-search" class="{{ request()->is('youtube-search') ? 'active' : '' }}">Search Videos</a>
            <a href="/youtube-playlists" class="{{ request()->is('youtube-playlists') ? 'active' : '' }}">My Playlists</a>
            
            @auth
                <form action="/logout" method="POST" style="margin: 0; margin-left: 15px;">
                    @csrf
                    <button type="submit" class="btn-secondary" style="padding: 8px 16px; font-size: 14px;">Log Out</button>
                </form>
            @endauth
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>

    <script>
        // Automatically hide success and error messages after 4 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert-success, .alert-error');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 4000);
    </script>
</body>
</html>
