<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
    <h2>Carta de boas vindas</h2><hr>
    @foreach ($gerapdf as $case)
      Olá, {{$case->nome}}, Seja bem-vindo a eleição {{$case->nome_evento}}
    @endforeach
</body>
</html>
