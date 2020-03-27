@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/calender.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="card-header">勤怠確認</div>
        <div class="d-flex p-2">
            <form action="" class="" method="get" onchange="submit(this.form)">
                <select name="search_year" id="" class="">
                    @foreach([2019,2020,2021] as $year)
                        <option value="{{ $year }}">
                            {{ $year }}年
                        </option>
                    @endforeach
                </select>
            </form>
            <form action="" class="ml-2" method="get" onchange="submit(this.form)">
                <select name="search_month" id="" class="">
                    @foreach($months as $key => $month)
                        <option value="{{ $key }}" @if(old('search_month') == $key) selected @endif}}>
                            {{ $month }}月
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                @foreach(['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
                    <th>{{ $dayOfWeek }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($dates as $date)
                @if($date->dayOfWeek == 0)
                    <tr>
                        @endif
                        <td @if($date->month != 3) class="" @endif>
                            {{ $date->day }}
                        </td>
                        @if($date->dayOfWeek == 6)
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        <div class="">
            <h2>合計金額</h2>
            <label for="">10000円</label>
        </div>
    </div>
@endsection
