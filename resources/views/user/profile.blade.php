<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Profile</title>
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
        <div class="wrappe">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Profile</div>

                        <div class="card-body">
                            <div class="wrapper">
                                <table>
                                    <tr>
                                        <td class="title">Name</td>
                                        <td class="value">{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="title">Email</td>
                                        <td class="value">{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="title">Phone number</td>
                                        <td class="value">380954164604</td>
                                    </tr>
                                    <tr>
                                        <td class="title">Number of posts</td>
                                        <td class="value">3</td>
                                    </tr>
                                    <tr>
                                        <td class="title">Number of comments</td>
                                        <td class="value">5</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>

<style>
    .col-sm-4 {
        text-align: end;
    }

    .btn__edit {
        padding-top: 15px;
        text-align: center;
    }

    .wrapper {
        display: flex;
        justify-content: center;
        align-content: center;
    }

    .value {
        text-align: left;
    }

    .title {
        text-align: right;
        padding-right: 20px;
    }
    .card {
        margin-top: 10%;
    }
</style>
