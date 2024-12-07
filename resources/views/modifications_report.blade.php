<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport des Modifications</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Rapport des Modifications des Produits</h1>
    <table>
        <thead>
            <tr>
                <th>Action</th>
                <th>Produit</th>
                <th>Détails des Modifications</th>
                <th>Date de Modification</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modifications as $modification)
                <tr>
                    <td>{{ ucfirst($modification->action) }}</td>
                    <td>{{ $modification->produit->nom }}</td>
                    <td>{{ $modification->changes }}</td>
                    <td>{{ $modification->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
