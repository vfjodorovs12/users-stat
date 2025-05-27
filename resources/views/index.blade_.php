<!DOCTYPE html>
<html>
<head>
    <title>Статистика пилотов</title>
    <style>
        table { border-collapse: collapse; width: 70%; }
        th, td { border: 1px solid #aaa; padding: 5px 10px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h1>Все пилоты корпорации и статистика посещения флотов</h1>
    <table>
        <tr>
            <th>Имя пилота</th>
            <th>ID персонажа</th>
            <th>Флотов посещено</th>
        </tr>
        @foreach($pilots as $pilot)
            <tr>
                <td>{{ $pilot->character_name }}</td>
                <td>{{ $pilot->character_id }}</td>
                <td>{{ $pilot->fleet_stats_count }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>