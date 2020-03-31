@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.message')
        <div class="clo-md-8">
            <div class="card-header">従業員管理</div>
            <div class="card-body">
                <div class="d-flex">
                    <div>
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
                    </div>
                    <div class="ml-auto">
                        <a href="{{ route('users.export') }}" class="btn btn-outline-secondary">
                            CSVダウンロード
                        </a>
                    </div>
                </div>

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
                                <div class="d-flex">
                                    <form action="{{ route('users.show', $user->id) }}" class="p-1">
                                        <button class="btn btn-primary btn-sm">詳細</button>
                                    </form>
                                    <form action="{{ route('users.edit', $user->id) }}" class="p-1">
                                        <button class="btn btn-secondary btn-sm">編集</button>
                                    </form>
                                    <form action="{{ route('users.destroy', $user->id) }}" class="p-1" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('削除してもよろしいですか?')">削除</button>
                                    </form>
                                </div>
                            </td>
                            <td>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        {{ $users }}
    </div>
    {{--    </div>--}}
@endsection
