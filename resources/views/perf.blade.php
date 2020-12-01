<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<form action="/" method="get" class="p-4">
    @csrf

    <label>
        Страна
        <select name="country">
            <option value="0"></option>
            @foreach ($countries as $country)
            <option value="{{ $country->id }}">{{ $country->title }}</option>
            @endforeach
        </select>
    </label>

    <label>
        Жанр
        <select name="genre">
            <option value="0"></option>
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->title }}</option>
            @endforeach
        </select>
    </label>

    <br>
    <button type="submit">Submit</button>
</form>

<table class="m-4">
    <thead>
    <tr>
        <td>Название</td>
        <td>Дата выхода</td>
    </tr>
    </thead>
    <tbody>
        @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->release_date->format('Y-m-d') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="p-4">
{{ $movies->links() }}
</div>
</body>
</html>
