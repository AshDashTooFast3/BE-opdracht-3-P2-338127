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
        <h1>{{ $title }}</h1>
        <hr class="my-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
                @foreach ($leverancierById as $leverancier)
                    <meta http-equiv="refresh" content="3;url={{ route('leverancier.show', ['id' => $leverancier->Id]) }}">
                @endforeach
        @endif

        @forelse ($leverancierById as $leverancier)
            <form action="{{ route('leverancier.update', ['id' => $leverancier->Id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3 hidden">
                    <label class="form-label"><strong>ContactId</strong></label>
                    <input type="text" class="form-control" value="{{ $leverancier->ContactId }}" name="ContactId">
                </div>
                
                <div class="mb-3">
                    <label class="form-label"><strong>Naam:</strong></label>
                    <input type="text" class="form-control" value="{{ $leverancier->Naam }}" name="Naam">
                </div>
                
                <div class="mb-3">
                    <label class="form-label"><strong>Contactpersoon:</strong></label>
                    <input type="text" class="form-control" value="{{ $leverancier->ContactPersoon }}" name="Contactpersoon">
                </div>
                
                <div class="mb-3">
                    <label class="form-label"><strong>Leveranciernummer:</strong></label>
                    <input type="text" class="form-control" value="{{ $leverancier->LeverancierNummer }}" name="LeverancierNummer">
                </div>
                
                <div class="mb-3">
                    <label class="form-label"><strong>Mobiel:</strong></label>
                    <input type="text" class="form-control" value="{{ $leverancier->Mobiel }}" name="Mobiel">
                </div>
                
                <div class="mb-3">
                    <label class="form-label"><strong>Straatnaam:</strong></label>
                    <input type="text" class="form-control" value="{{ $leverancier->Straat }}" name="Straat">
                </div>
                
                <div class="mb-3">
                    <label class="form-label"><strong>Huisnummer:</strong></label>
                    <input type="text" class="form-control" value="{{ $leverancier->Huisnummer }}" name="Huisnummer">
                </div>
                
                <div class="mb-3">
                    <label class="form-label"><strong>Postcode:</strong></label>
                    <input type="text" class="form-control" value="{{ $leverancier->Postcode }}" name="Postcode">
                </div>
                
                <div class="mb-3">
                    <label class="form-label"><strong>Stad:</strong></label>
                    <input type="text" class="form-control" value="{{ $leverancier->Stad }}" name="Stad">
                </div>
                
                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-success">Opslaan</button>
                    <div class="ms-auto d-flex gap-3">
                        @foreach ($leverancierById as $leverancier)
                            <a href="{{ route('leverancier.show', ['id' => $leverancier->Id]) }}" class="btn btn-secondary">Terug</a>
                        @endforeach
                        <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
                    </div>
                </div>
            </form>

        @empty
            <p>Geen leverancier gevonden</p>
        @endforelse
    </div>
</body>

</html>