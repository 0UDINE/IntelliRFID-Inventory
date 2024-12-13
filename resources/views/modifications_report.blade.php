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
        .changed-value {
            color: #0056b3;
        }
    </style>
</head>
<body>
    @php
        // Helper function defined once at the top
        if (!function_exists('valueToString')) {
            function valueToString($value) {
                if (is_array($value)) {
                    return json_encode($value, JSON_UNESCAPED_UNICODE);
                } elseif (is_bool($value)) {
                    return $value ? 'true' : 'false';
                } elseif (is_null($value)) {
                    return 'null';
                } else {
                    return (string)$value;
                }
            }
        }
    @endphp
    
    <h1>Rapport des Modifications des Produits</h1>
    <table>
        <thead>
            <tr>
                <th>Action</th>
                <th>Produit ID</th>
                <th>Nom Avant</th>
                <th>Nom Après</th>
                <th>Changements</th>
                <th>Date de Modification</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modifications as $modification)
                @php
                    $changes = json_decode($modification->changes, true);
                @endphp
                <tr>
                    <td>{{ ucfirst($modification->action) }}</td>
                    <td>{{ $modification->produit_id }}</td>
                    @if ($modification->action === 'added')
                        <td>-</td>
                        <td>{{ valueToString($changes['nom'] ?? 'N/A') }}</td>
                        <td>
                            Nouveau produit:<br>
                            @foreach ($changes as $key => $value)
                                @if (!in_array($key, ['id', 'created_at', 'updated_at']))
                                    <strong>{{ ucfirst($key) }}:</strong> 
                                    {{ valueToString($value) }}<br>
                                @endif
                            @endforeach
                        </td>
                    @elseif ($modification->action === 'deleted')
                        <td>{{ valueToString($changes['nom'] ?? 'N/A') }}</td>
                        <td>-</td>
                        <td>
                            Produit supprimé:<br>
                            @foreach ($changes as $key => $value)
                                @if (!in_array($key, ['id', 'created_at', 'updated_at']))
                                    <strong>{{ ucfirst($key) }}:</strong> 
                                    {{ valueToString($value) }}<br>
                                @endif
                            @endforeach
                        </td>
                    @else
                        <td>{{ valueToString($changes['before']['nom'] ?? 'N/A') }}</td>
                        <td>{{ valueToString($changes['after']['nom'] ?? 'N/A') }}</td>
                        <td>
                            Modifications:<br>
                            @foreach ($changes['before'] as $key => $beforeValue)
                                @if (isset($changes['after'][$key]) && $changes['after'][$key] != $beforeValue)
                                    <strong>{{ ucfirst($key) }}:</strong> 
                                    {{ valueToString($beforeValue) }} => {{ valueToString($changes['after'][$key]) }}<br>
                                @endif
                            @endforeach
                        </td>
                    @endif
                    <td>{{ $modification->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>    
</body>
</html>
