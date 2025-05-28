@extends('web::layouts.grids.12')

@section('title', 'Статистика пилотов')
@section('page_header', 'Статистика пилотов')
@section('page_description') 
@endsection

@section('full')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Все пилоты корпорации и статистика посещения флотов</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Имя пилота</th>
                        <th>ID персонажа</th>
                        <th>Флотов посещено</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pilots as $pilot)
                        <tr>
                            <td>{{ $pilot->character_name }}</td>
                            <td>{{ $pilot->character_id }}</td>
                            <td>{{ $pilot->fleet_stats_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
