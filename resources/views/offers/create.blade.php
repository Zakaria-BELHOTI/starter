<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item active">
                        <a class="nav-link"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }}
                            <span class="sr-only">(current)</span></a>
                    </li>
                @endforeach
    
    
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            {{__('messages.Add your offer')}}
        </div>
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('offers.store') }}">{{-- route('...') ila kant name f web.php sinn url('...') --}}
            @csrf
            <div class="form-group">
                <label  >Offer name</label>
                <input type="text" name="name" class="form-control" placeholder="Offer name" value="{{ old('name') }}">
                @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group">
                <label  >Offer Price</label>
                <input type="text" name="price" class="form-control" placeholder="Offer Price" value="{{ old('price') }}">
                @error('price')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group">
                <label  >Offer details</label>
                <input type="text" name="details" class="form-control" placeholder="Offer details" value="{{ old('details') }}">
                @error('details')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
              </div>
      
            <button type="submit" class="btn btn-primary">{{__('messages.Save Offer')}}</button>
          </form>

    </div>
</div>
</body>
</html>