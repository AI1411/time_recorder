@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/calender.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}">
@endsection

@section('content')
    <div class="container">
        @include('layouts.message')
        <div class="card-header">
            経費申請
        </div>
        <div class="d-flex p-2">
            <form action="" class="" method="get" onchange="submit(this.form)">
                <select name="search_year" id="" class="">
                    @foreach([2019,2020,2021] as $key => $year)
                        <option value="{{ $key }}" @if(request()->search_year == $key) selected @endif>
                            {{ $year }}年
                        </option>
                    @endforeach
                </select>
            </form>
            <form action="" class="ml-2" method="get" onchange="submit(this.form)">
                <select name="search_month" id="" class="">
                    @foreach($months as $key => $month)
                        <option value="{{ $key }}" @if(request()->search_month == $key) selected @endif>
                            {{ $month }}
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
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('expenses.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="row justify-content-center">
                                    <div>
                                        <label for="">使用日</label>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group date" id="datetimepicker4"
                                                     data-target-input="nearest">
                                                    <input name="date" type="text"
                                                           class="form-control datetimepicker-input"
                                                           data-target="#datetimepicker4"/>
                                                    <div class="input-group-append" data-target="#datetimepicker4"
                                                         data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $(function () {
                                                $('#datetimepicker4').datetimepicker({
                                                    format: 'L'
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="d-flex">
                                        <div class="mr-3">
                                            <label for="">経費の種類</label>
                                            <div class="col-ms-12">
                                                <div class="form-group">
                                                    <select name="cost_id" class="form-control">
                                                        @foreach($costs as $cost)
                                                            <option value="{{ $cost->id }}">
                                                                {{ $cost->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">使用金額</label>
                                            <div class="col-ms-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text"
                                                           name="fee">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--                                </div>--}}
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
                            {{ $date->day }}
                            @foreach($total_expense as $expense)
                                @if($expense->day == $date->day)
                                    <div class="tooltip1">
                                        <p style="color: #1b4b72">o</p>
                                        <div class="description1">
                                            {{ $expense->cost->name }}
                                            {{ $expense->fee }}円
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </td>
                        @if($date->dayOfWeek == 6)
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        <div class="">
            <h2>合計金額</h2>
            <label for="">{{ $total_expense_result }}円</label>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/ja.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>
@endsection
