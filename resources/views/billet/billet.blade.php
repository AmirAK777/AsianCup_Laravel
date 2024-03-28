<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Billet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            color: #333;
            margin: 0;
        }

        .header h3 {
            font-size: 18px;
            color: #666;
            margin: 0;
        }

        .mid {
            border-style: solid;
            border-radius: 6px;
            border-width: 1.5px;
            padding: 16px;
            margin-bottom: 20px;
        }

        .mid div {
            margin-bottom: 10px;
        }

        .mid div b {
            color: #333;
        }

        .mid div span {
            color: #666;
        }

        .ending {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code img {
            width: 200px;
            height: auto;
        }

        /* Styles pour les logos des équipes */
        .teams {
            display: flex; /* Utilisation de Flexbox */
            justify-content: center; /* Centrer horizontalement */
            align-items: center; /* Centrer verticalement */
            margin-bottom: 20px; /* Espace en dessous de la section des équipes */
        }

        .team-logo {
            width: 80px; /* Taille des logos */
            height: auto;
            margin: 0 20px; /* Espace autour des logos */
        }

        .vs-text {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin: 0 20px; /* Espace autour du texte 'VS' */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>ID du billet : {{$billet->billet_id}}</h1>
        <h3>Nom : {{$user->name}}</h3>
    </div>
    <div class="mid">
        <div><b>Nom du match : </b> {{$match->name}}</div>
        <div><b>Quantité : </b> {{$billet->quantity}}</div>
        <div><b>Statut : </b> <span>{{$billet->status? "Actif":"Déjà Utilisé"}}</span></div>
        <div><b>Date : </b> <span>{{ \Carbon\Carbon::parse($billet->billet_date)->format('j F Y') }}</span></div>
		<div class="teams">
		<img src="" alt="" class="team-logo">
            <span class="vs-text">VS</span>
            <img src="" alt="" class="team-logo">
        </div>
    </div>
    <div class="ending">
        <i>Bon match :)</i>
    </div>
    <div class="qr-code">
        <img src="{{ $qrCodeDataUri }}" alt="QR Code">
    </div>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                text: "https://www.the-afc.com/en/national/afc_asian_cup/home.html",
                width: 128,
                height: 128,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
        });
    </script>
</div>
</body>
</html>
