@extends('layout.main')

@section('content')

@if($titleData)
<div style="padding: 20px;">

    <h3 style="text-align: center;padding: 20px;">
        Документ <span class="title_docname">Поръчка</span> №: {!! $titleData['docnum']!!}
    </h3>

    <table class="table table-condensed">
        <tbody>
            <tr>
                <td>Дата</td>
                <td class="title_docDate">{!! $titleData['date']!!}</td>
            </tr>

            <tr>
                <td>Клиент</td>
                <td class="title_name">{!! $titleData['company']['name'] !!}</td>
            </tr><tr>

            </tr><tr>
                <td>Адрес</td>
                <td class="title_name">{!! $titleData['company']['address'] !!}</td>
            </tr>

            <tr>
                <td>Начин на плащане</td>
                <td>-</td>
            </tr>

            <tr>
                <td>Забележка</td>
                <td>-</td>
            </tr><tr>	
            </tr>
        </tbody>
    </table>

    <div class="panel panel-default">
        <div class="panel-body" style="text-align: center;">
            Редове на документа
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <td><b>№</b></td>
                <td><b>Продукт</b></td>
                <td><b>Количество</b></td>
                <td><b>Цена</b></td>
                <td><b>Общо лева</b></td>
            </tr>
        </thead>
        <tbody>
            @if($rowData)
                @foreach($rowData as $key => $row)
                <tr>
                    <td>{!! $key + 1 !!}</td>
                    <td>{!! $row['products']['name'] !!}</td>
                    <td>{!! $row['quantity'] !!}</td>
                    <td>2 лв. </td>
                    <td>{!! $row['quantity'] * 2 !!}</td>
                </tr>
                
                @endforeach
            @endif
        </tbody>
    </table>

    <input type="button" style="width: 100%; margin-bottom: 25px;" id="backBtn" class="btn btn-primary btn-lg" value="Към поръчките">

    <script>
        $(function ()
        {
            $("#backBtn").click(function () {
                window.location = '{!! route('order_index') !!}';
            });
        });
    </script>
</div>
@else 
Sorry!!! not found
@endif
@stop










