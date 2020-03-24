@extends('layouts.app')

@section('content')
    <div class="container">
        {{--        <div class="row justify-content-center">--}}

        <div class="clo-md-8">
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">名前</th>
                        <th scope="col">年齢</th>
                        <th scope="col">メールアドレス</th>
                        <th scope="col">権限</th>
                        <th scope="col">都道府県</th>
                        <th scope="col">地域</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($users as $user)
                        <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->age }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role_id }}</td>
                            <td>{{ $user->pref_id }}</td>
                            <td>{{ $user->region_id }}</td>
                            <td>
                                <button class="btn btn-secondary btn-sm">編集</button>
                                <button class="btn btn-danger btn-sm">削除</button>
                            </td>
                            <td>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
    {{--    </div>--}}
@endsection
