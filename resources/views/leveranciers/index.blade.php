@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht leveranciers Jamil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="mt-4">
    <div class="container d-flex justify-content-center ">

        <div class="col-md-10">

            <h1>{{ $title }}</h1>

            <hr class="my-4" />

            <table class="table table-hover table-striped">
                <thead>
                    <th>Naam</th>
                    <th>Contactpersoon</th>
                    <th>Leveranciernummer</th>
                    <th>Mobiel</th>
                    <th class="text-center">Leverancier Details</th>
                </thead>
                <tbody>
                    @forelse ($leveranciers as $leverancier)
                        <tr>
                            <td>{{ $leverancier->Naam }}</td>
                            <td>{{ $leverancier->ContactPersoon}}</td>
                            <td>{{ $leverancier->LeverancierNummer}}</td>
                            <td>{{ $leverancier->Mobiel}}</td>
                            <td class="text-center">
                                <form action="{{ route('leverancier.show', $leverancier->Id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil d-flex justify-content-center "></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr colspan='3'>Geen leveranciers bekend</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>