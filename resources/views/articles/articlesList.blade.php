<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>My Blog</title>
</head>
<body>

  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="/">My blog</a>
        @if (auth()->check())
        <div class="user">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto" >
                <li class="nav-item">
                  <a class="nav-link" href="/">All Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/articles/add">Add Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/logout">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        @else
        <div class="user">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" >
              <li class="nav-item">
                <a class="nav-link" href="/">All Posts</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/login">Login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/register">Register</a>
              </li>
            </ul>
          </div>
        </div>
        @endif
    </div>
  </nav>

    <div class="container">
      <div class="wrapper">
        <ul class="list-group list-group-flush">
          @if (count($articles) <= 0)
          <div class="alert alert-success" role="alert">
            there are no articles, add new one!
          </div>
          @else
          @foreach ($articles as $article)
          <li class="list-group-item">
              <div class="posts-data">
                <div><span>{{ $article->title }}</span></div>
                <div class="created_at">posted at {{ $article->created_at }} by {{ $article->author }}</div>
                <div class="post__description" >
                  <span> {{ $article->short_text }} </span>
                </div>
              </div>
              <div class="read__more">
                  <a href="{{ URL::route('articles.viewArticle', $article->id) }}">
                      <span>Read more</span>
                  </a>
              </div>
          </li>
          @endforeach
          @endif
      </ul>
      </div>
    </div>
</body>
</html>

<style>
.post__username {
  text-decoration: none;
  color: rgb(155, 155, 155);
  padding-left: 15px;
}
.post__title {
  text-decoration: none;
  color: black;
  font-weight: bold;
  cursor: pointer;
}
.post__title:hover {
    color: black;
}
.post__statistic {
  float: left !important;
}
.created_at {
  margin-top: 5px;
  margin-bottom: 10px;
}
.created_at,
.read__more__icon {
  color: rgb(155, 155, 155);
}
.read__more {
  padding-top: 5px;
  font-weight: 500;
  color: rgb(46, 142, 252);
}
.read__more span {
  cursor: pointer;
}
.post__user {
  margin-bottom: 10px;
}
.list-group-item {
  margin-bottom: 10px;
}
.page-link {
  cursor: pointer;
}
.tags a {
  margin-right: 15px;
  margin-top: 15px;
  color: rgb(140, 140, 140);
}
.post__description {
  text-decoration: none;
  color: black;
}
.post__description:hover {
  color: black;
}
.wrapper {
  margin-top: 5%;
}
</style>