@php
$imports = ['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'];
if(request()->is('/')){
$imports[] = "resources/js/homePage.js";
}else{
$imports[] = "resources/js/detailsPage.js";
}
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title}}</title>
    @vite($imports)
</head>

<body>
    <x-nav />
    <main class="container mt-5">
        {{$slot}}
    </main>
</body>

</html>