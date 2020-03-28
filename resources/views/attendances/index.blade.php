@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/calender.css') }}">
@endsection

@section('content')
    <div class="container">
        @include('layouts.message')
        <div class="card-header">勤怠申請</div>
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
            <div class="ml-auto">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    新規作成
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('attendances.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <label for="">開始時間</label>
                                <input type="text" name="start_time">
                                <label for="">終了時間</label>
                                <input type="text" name="end_time">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">登録</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
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
                            {{--                            <a href="#">--}}
                            {{ $date->day }}
                            {{--                            </a>--}}
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
