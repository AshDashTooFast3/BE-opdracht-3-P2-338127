<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht leveranciers Jamil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="mt-4">
    <div class="container d-flex justify-content-center">
        <div class="col-md-5 text-center">
            <div>
                <h1>Homepagina</h1>
            </div>
            <hr class="my-4" />
            <div>
                <a href="{{ route('leveranciers.index') }}">
                    Wijzigen Leveranciers
                </a>
            </div>
        </div>
    </div>
</body>

</html>