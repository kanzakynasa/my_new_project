<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bala Bala</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { background:#050509; color:#fff; font-family: system-ui, sans-serif; margin:0; }
        a { color: inherit; text-decoration: none; }
        /* h2 {margin-top: 20px; margin-bottom: -1px; display: inline-block;} */
        .navbar { display:flex; justify-content:space-between; padding:1rem 2rem; align-items:center; }
        .logo { font-weight:bold; font-size:1.4rem; }
        .nav-links { display:flex; gap:1rem; }
        .nav-link { font-size:0.9rem; opacity:0.7; }
        .nav-link.active { opacity:1; font-weight:600; border-bottom:2px solid #e50914; padding-bottom:0.25rem; }

        .container { padding: 0 2rem 2rem; max-width:1200px; margin:0 auto; }

        .banner { position:relative; padding:3rem 0 2rem; display:flex; flex-direction:column; gap:1rem; }
        .badge { background:#e50914; padding:0.2rem 0.6rem; border-radius:999px; font-size:0.75rem; width:fit-content; }
        .banner-title { font-size:2rem; font-weight:700; }
        .banner-desc { max-width:480px; opacity:0.8; font-size:0.95rem; }
        .btn { background:#e50914; border:none; border-radius:999px; padding:0.6rem 1.4rem; color:#fff; font-weight:500; display:inline-flex; align-items:center; gap:.4rem; cursor:pointer; }
        .btn-secondary { background:#ffffff; color:#000; }

        .section-title { margin:1.5rem 0 1rem; font-size:1.1rem; font-weight:600; }

        .video-grid { display:grid; grid-template-columns:repeat(auto-fill, minmax(30vh, 1fr)); gap:1rem; }
        .card { background:#15151f; border-radius:0.75rem; overflow:hidden; cursor:pointer; transition:transform .2s ease, box-shadow .2s ease; }
        .card:hover { transform:scale(1.03); box-shadow:0 10px 25px rgba(0,0,0,0.6); }
        .card-thumb { aspect-ratio:16/9; width:100%; object-fit:cover; display:block; }
        .card-body { padding:0.6rem 0.8rem 0.9rem; }
        .card-title { font-size:0.95rem; margin-bottom:0.25rem; }
        .card-meta { font-size:0.75rem; opacity:0.7; }

        .video-page { display:flex; flex-direction:column; gap:1rem; padding-top:1.5rem; }
        .video-player { aspect-ratio:16/9; width:100%; border-radius:0.75rem; overflow:hidden; background:#000; }
        .video-player iframe { width:100%; height:100%; border:0; }

        .search-container {
            width: 500px;
            margin-left: 5rem;
        }

        .search-form {
            display: flex;
            align-items: center;
            border-radius: 1000px; /* pill shape */
            overflow: hidden;
            background: #fff;
        }

        .search-form input {
            flex: 1;
            padding: 0.7rem 1rem;
            border: none;
            outline: none;
            font-size: 14px;
        }

        .search-form button {
            background: #e50914;
            border: solid 5px #ffffff;
            padding: 0.4rem 0.6rem;
            cursor: pointer;
            font-size: 16px;
        }

        .search-form button:hover {
            background: #f3212b;
        }
        .btn{
            transition:transform .2s ease, box-shadow .2s ease;
        }
        .btn:hover {
            transform:scale(1.03); 
            box-shadow:0 10px 25px rgba(0,0,0,0.6); 
        }
        .btn{
            display:flex;
            align-items:center;
            justify-content:center;
        }
    </style>
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <h2 id="logo">BLABLA</h2>
    </div>
    <div class="search-container">
    <form action="{{ route('videos.index') }}" method="GET" class="search-form">
        <input type="text" name="search"
               placeholder="Cari video..."
               value="{{ request('search') }}">
        
        <button type="submit" class="btn">
            <div style="width: 100%; display: block; fill: currentcolor;"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" focusable="false" aria-hidden="true" style="pointer-events: none; display: inherit; width: 100%; height: 100%;"><path d="M11 2a9 9 0 105.641 16.01.966.966 0 00.152.197l3.5 3.5a1 1 0 101.414-1.414l-3.5-3.5a1 1 0 00-.197-.153A8.96 8.96 0 0020 11a9 9 0 00-9-9Zm0 2a7 7 0 110 14 7 7 0 010-14Z"></path></svg></div>
        </button>
    </form>
    </div>
    <div class="nav-links">
        {{-- link home --}}
        <a href="{{ route('videos.index') }}"
           class="nav-link {{ request()->routeIs('videos.index') ? 'active' : '' }}">
            Home
        </a>

        {{-- link kategori pakai subpage --}}
        <a href="{{ route('categories.show', 'anime') }}"
           class="nav-link {{ request()->is('categories/anime') ? 'active' : '' }}">
            Anime
        </a>
        <a href="{{ route('categories.show', 'movie') }}"
           class="nav-link {{ request()->is('categories/movie') ? 'active' : '' }}">
            Movie
        </a>
        <a href="{{ route('categories.show', 'game') }}"
           class="nav-link {{ request()->is('categories/game') ? 'active' : '' }}">
            Game
        </a>
        <a href="{{ route('categories.show', 'berita') }}"
           class="nav-link {{ request()->is('categories/berita') ? 'active' : '' }}">
            Berita
        </a>
        <a href="{{ route('categories.show', 'foods') }}"
           class="nav-link {{ request()->is('categories/foods') ? 'active' : '' }}">
            Foods
        </a>
        <a href="{{ route('categories.show', 'series') }}"
           class="nav-link {{ request()->is('categories/series') ? 'active' : '' }}">
            Series
        </a>

        

        {{-- logout --}}
        @auth
        <form method="GET" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="btn">
                Logout
            </button>
        </form>
        @endauth
        <form method="GET" action="{{ route('videos.create') }}" style="display:inline;">
            <button type="submit" class="btn">
                +
            </button>
        </form>
    </div>
</nav>




    <main class="container">
        @yield('content')
    </main>
</body>
<script src="{{ asset('js/anime.umd.min.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // split text AFTER DOM is ready
    const el = document.getElementById('logo');
    el.innerHTML = el.textContent
    .split('')
    .map(c => `<span style="display:inline-block">${c}</span>`)
    .join('');

    anime.animate(el.querySelectorAll('span'), {
      y: [
    { to: '-2.75rem', ease: 'outExpo', duration: 600 },
    { to: 0, ease: 'outBounce', duration: 800, delay: 100 }
  ],
      rotate: {
    from: '-1turn',
    delay: 0
  },
      duration: 600,
      easing: 'outExpo',
      delay: anime.stagger(50),
      direction: 'alternate',
      loop: true
    });

  });
</script>

<script>
    document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', function(e) {
        const wrapper = this.querySelector('.video-player-wrapper');
        if (wrapper) {
            const videoId = wrapper.dataset.id;
            const desc = wrapper.dataset.description;
            const title = wrapper.dataset.title;
            document.getElementById('video_player_iframe').src=`https://www.youtube.com/embed/${videoId}`;
            document.getElementById('video_description').innerText = `${desc}`;
            document.getElementById('video_title').innerText = `${title}`;
            window.scrollTo({top: 0, behavior: 'smooth'});
        }
    });
});
</script>
</html>

</script>
</html>
