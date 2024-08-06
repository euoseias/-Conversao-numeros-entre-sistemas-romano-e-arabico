<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Números Romanos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Conversor de Números Romanos</h1>
        <form method="POST" action="{{ route('convert') }}">
            @csrf
            <div class="form-group">
                <label for="number">Número</label>
                <input type="text" class="form-control" id="number" name="number" placeholder="Digite um número romano ou arábico" required>
            </div>
            <button type="submit" class="btn btn-primary">Converter</button>
        </form>
        @if (session('result'))
            <div class="alert alert-info mt-3">
                {{ session('result') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
    </div>
</body>
</html>
