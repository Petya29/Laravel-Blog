<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $article->title }}</title>
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
            <div class="card">
                <div class="card-body">
                    <div class="posts-data">
                        <div class="post__title">
                          <span>{{ $article->title }}</span>
                        </div>
                        <div class="created_at">posted at {{ $article->created_at }}</div><br />
                        <div class="post__description">
                          <span> {{ $article->full_text }} </span>
                        </div>
                        <div class="author">
                          <span>Author: {{ $article->author }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="comments">
          <hr />
          <div class="comments_head">
            <h3>Comments</h3>
          </div>
          @if (auth()->check())
          <form action="{{ URL::route('articles.leaveComment', $article->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="input-group mb-3">
              <textarea 
                type="text" 
                name="comment" 
                class="form-control" 
                placeholder="Comment" 
                rows="1"  
                aria-describedby="basic-addon2" 
                required>
              </textarea>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Leave comment</button>
              </div>
            </div>
          </form>
          @endif
          <div class="comments__list">
            <ul class="list-group list-group-flush">
              @if (count($comments) <= 0)
              <div class="alert alert-success" role="alert">
                there are no comments, add new one!
              </div>
              @else
              @foreach ($comments as $comment)
              <li class="list-group-item">
                <div class="posts-data">
                  <div><span><b>{{ $comment->author }}</b></span></div>
                  <div class="post__description" >
                    <span>{{ $comment->text }}</span>
                  </div>
                </div>
              </li>
              @endforeach       
              @endif
          </ul>
          </div>
        </div>
    </div>

</body>
</html>

<style>
.wrapper{
    margin-top: 5%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.created_at {
    color: rgb(150, 150, 150)
}
.author {
  float: right;
  color: rgb(150, 150, 150)
}
</style>