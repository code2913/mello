<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $advert->name }}</title>
</head>
<body>
  <img src="{{ URL::asset('advert/'.$advert->file) }}" alt="" class="img-responsive">
</body>
</html>
