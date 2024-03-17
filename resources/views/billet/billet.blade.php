<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Billet</title>
    <style>
        body{
            font-family: sans-serif;
        }

        .container{
            padding: 16px;

        }

        .top{
            display: flex;
            flex-direction: column;
        }

        .tiket-id{
            font-family: serif;
        }

        .nama{
            color: grey;
        }

        .mid{
            border-style: solid;
            border-radius: 6px;
            padding: 8px;
            border-width: 1.5px;
        }

        .tanggal{
            padding-top: 24px;
        }

        .ending{
            display: flex;
            flex-direction: row;
            justify-content: center;
            width: 100%;
            padding-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top">
            <h1 class="tiket-id">ID du billet : {{$billet->billet_id}}</h1>
            <h3 class="nama">Nom : {{$user->name}}</h3>
        </div>
        <div class="mid">
            <div class="konten" style="display: flex; flex-direction: column; gap: 8px;">
                <div><b>Nom du match : </b> {{$match->name}}</div>
                <div><b>Quantité : </b> {{$billet->quantity}}</div>
                <div><b>Statut : </b> {{$billet->status? "Actif":"Déjà Utilisé"}}</div>
            </div>
            <div class="tanggal">
            <p class="card-text flex-grow-1">{{ \Carbon\Carbon::parse($billet->billet_date)->format('j F Y') }}</p>
            </div>
        </div>
        <h2 class="ending">
            <i>Bon match :)</i>
        </h2>
    </div>
</body>
</html>
