<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link {{ ($judul ===  "home") ? 'active':'' }}" href="/">Home</a>
          <a class="nav-link {{ ($judul === "tentang") ? 'active':'' }}" href="/about">About</a>
          <a class="nav-link {{ ($judul === "posts") ? 'active':'' }}" href="/blog">Blog</a>
        </div>
      </div>
    </div>
  </nav>
