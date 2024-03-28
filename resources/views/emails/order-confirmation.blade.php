<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de Commande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Confirmation de Votre Commande</h2>
        </div>

        <p>Bonjour {{ $command->user?->name }},</p>
        <p>Merci pour votre commande ! Votre achat a été effectué avec succès.</p>
        
        <h3>Détails de la commande :</h3>
        <ul>
            <li>Nom du match: {{$command->match->name}}</li>
            <li>Quantité: {{$command->quantity}}</li>
            <li>Prix total: EURO {{ number_format($command->match->price * $command->quantity, 2, ',', '.') }}</li>
            <li>Date du match: {{ \Carbon\Carbon::parse($command->match->date)->format('j F Y') }}</li>
        </ul>
        
        <p>Vous pouvez télécharger votre billet via l'application ou sur notre site.</p>

        <div class="footer">
            <p>Si vous avez des questions, n'hésitez pas à nous contacter.</p>
        </div>
    </div>
</body>
</html>
