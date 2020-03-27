@extends('layouts.app')

@section('content')
    <div class="container">
        {{--        <div class="row justify-content-center">--}}

        <div class="clo-md-8">
            <div class="card-header">従業員管理</div>
            <div class="card-body">
                <form action="" class="p-2" method="get" onchange="submit(this.form)">
                    <label for="" class="mr-2">店舗検索</label>
                    <select name="search_store" id="" class="">
                        @foreach($stores as $store)
                            <option value="{{ $store->id }}">
                                {{ $store->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">名前</th>
                        <th scope="col">年齢</th>
                        <th scope="col">メールアドレス</th>
                        <th scope="col">権限</th>
                        <th scope="col">給料</th>
                        <th scope="col">所属店舗</th>
                        <th scope="col">都道府県</th>
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
                            <td>{{ $user->role->name }}</td>
                            <td>{{ !empty($user->salaries[0]->salary) ? $user->salaries[0]->salary : '未設定' }}</td>
                            <td>{{ $user->store->name }}</td>
                            <td>{{ $user->pref->name }}</td>
                            <td>
                                <a href="">
                                    <button class="btn btn-primary btn-sm">詳細</button>
                                </a>
                                <a href="">
                                    <button class="btn btn-secondary btn-sm">編集</button>
                                </a>
                                <a href="">
                                    <button class="btn btn-danger btn-sm">削除</button>
                                </a>
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
