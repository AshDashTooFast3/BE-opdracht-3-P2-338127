<!DOCTYPE html>
<html lang="en">
@vite(['resources/css/app.css', 'resources/js/app.js'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leverancier Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="mt-4">
    <div class="container d-flex justify-content-center flex-column col-5">
        <table class="table table-bordered w-100 ">
            <h1>{{ $title }}</h1>
        <hr class="my-4">
            <tbody>
            @forelse ($leverancierById as $leverancier)
                <tr>
                    <td><strong>Naam:</strong></td>
                    <td>{{ $leverancier->Naam }}</td>
                </tr>
                <tr>
                    <td><strong>Contactpersoon:</strong></td>
                    <td>{{ $leverancier->ContactPersoon }}</td>
                </tr>
                <tr>
                    <td><strong>Leveranciernummer:</strong></td>
                    <td>{{ $leverancier->LeverancierNummer }}</td>
                </tr>
                <tr>
                    <td><strong>Mobiel:</strong></td>
                    <td>{{ $leverancier->Mobiel }}</td>
                </tr>
                <tr>
                    <td><strong>Straat:</strong></td>
                    <td>{{ $leverancier->Straat }}</td>
                </tr>
                <tr>
                    <td><strong>Huisnummer:</strong></td>
                    <td>{{ $leverancier->Huisnummer }}</td>
                </tr>
                <tr>
                    <td><strong>Postcode:</strong></td>
                    <td>{{ $leverancier->Postcode }}</td>
                </tr>
                <tr>
                    <td><strong>Stad:</strong></td>
                    <td>{{ $leverancier->Stad }}</td>
                </tr>
           
            @empty
                <tr colspan='3'>Geen leverancier gevonden</tr>
            @endforelse
            </tbody>
        </table>
        
        <div class="d-flex gap-3">
            @foreach ($leverancierById as $leverancier)
                <a class="btn btn-primary" href="{{ route('leverancier.edit', parameters: ['id' => $leverancier->Id]) }}">Wijzig</a>
            @endforeach
            <div class="ms-auto d-flex gap-3">
                <a href="{{ route('leveranciers.index') }}" class="btn btn-secondary">Terug</a>
                <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
            </div>
        </div>
    </div>
</body>

</html>