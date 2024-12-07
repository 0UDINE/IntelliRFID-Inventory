<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Rapport de Stock</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Marque</th>
                <th>Quantité en Stock</th>
                <th>Prix (en MAD)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
                <tr>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->categorie }}</td>
                    <td>{{ $produit->marque }}</td>
                    <td>{{ $produit->quantite_stock }}</td>
                    <td>{{ $produit->prix }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
