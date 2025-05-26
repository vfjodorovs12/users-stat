@extends('web::layouts.app')

@section('content')
<h1>Статистика пилотов корпорации (флоты)</h1>

@if(isset($log))
  <pre style="color:red">{{ $log }}</pre>
@endif

<div class="mb-3">
    <input type="text" id="filter" placeholder="Фильтр по всем колонкам..." onkeyup="filterTable()" class="form-control" />
</div>

<table class="table table-bordered table-hover" id="membersTable">
    <thead>
        <tr>
            <th>Character ID</th>
            <th>Член корпорации</th>
            <th>Дата вступления</th>
            <th>Дата последнего посещения</th>
            <th>Status</th>
            <th>Пользователь SEAT</th>
            <th>Статистика флотов</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->character_id }}</td>
                <td>{{ $member->corp_name }}</td>
                <td>{{ $member->start_date_fmt }}</td>
                <td>{{ $member->logoff_date_fmt }}</td>
                <td>
                    @if ($member->status == 'Online')
                        <span class="text-success">Online</span>
                    @else
                        <span class="text-secondary">Offline</span>
                    @endif
                </td>
                <td>{{ $member->seat_name }}</td>
                <td>
                    {{ $member->fleet_stats }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
function filterTable() {
    var input = document.getElementById("filter");
    var filter = input.value.toUpperCase();
    var table = document.getElementById("membersTable");
    var tr = table.tBodies[0].getElementsByTagName("tr");
    for (var i = 0; i < tr.length; i++) {
        var tds = tr[i].getElementsByTagName("td");
        var show = false;
        for (var j = 0; j < tds.length; j++) {
            if (tds[j] && tds[j].innerText.toUpperCase().indexOf(filter) > -1) {
                show = true;
                break;
            }
        }
        tr[i].style.display = show ? "" : "none";
    }
}
</script>
@endsection
