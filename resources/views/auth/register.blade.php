<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style>
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .form-group {
            text-align: start;
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

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

    <main class="form-signin">
        <div class="wrapper">
            <form method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Register</h1>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="user" required>
                </div>

                <div class="form-group">
                    <label for="floatingInput">Email address</label>
                    <input type="email" class="form-control" id="floatingInput" name="email"
                        placeholder="name@example.com" required>
                </div>
                <div class="form-group">
                    <label for="floatingPassword">Password</label>
                    <input type="password" class="form-control" id="floatingPassword" name="password"
                        placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm password</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Password" required>
                    @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
            </form>
        </div>
    </main>



</body>

</html>
