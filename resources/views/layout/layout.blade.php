{{-- pour eviter la repetition de code on fait des layouts qui seront re-utilisable au long du project dans mon cas header and footer  --}}
<!DOCTYPE html>
<html lang="EN">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Twitter Clone Bootstrap 5 Example</title>

        <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>

        @include('layout.nav')
        {{-- un peu comme le include de PHP , il permet de lire le code etant dans layout.nave --}}

        <div class="container py-4">

            {{--  --}}

            @yield('content')
            {{-- yield permet de localiser la section d'ou le code est reutilisable il est possible grace a extend yield : il a un nom qui lui permet l'id --}}

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
    </body>

</html>
