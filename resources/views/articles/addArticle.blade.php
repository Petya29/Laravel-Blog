<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>New Article</title>
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
            <form method="post" action="/articles/add" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter article title" value="{{ old('title') }}" name="title">
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="article">Article</label>
                    <textarea type="text" class="form-control" id="article" placeholder="Enter article"
                        name="full_text">{{ old('full_text') }}</textarea>
                    @error('full_text')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Article description</label>
                    <textarea type="text" class="form-control" id="description" placeholder="Enter article description"
                        name="short_text">{{ old('short_text') }}</textarea>
                    @error('short_text')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" placeholder="Author name"
                        name="author" value="{{ auth()->user()->name }}">
                    @error('author')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categories">Category</label>
                    <select class="form-control" id="categories" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    </script>
</body>

</html>

<style>
    .wrapper {
        margin-top: 10%;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .nav-item a {
        cursor: pointer;
    }

</style>
