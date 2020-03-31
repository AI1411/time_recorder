@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">新規登録</div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="lastName">性</label>
                                    <input type="text" name="last_name"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           placeholder="姓">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="firstName">名前</label>
                                    <input type="text" name="first_name"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           placeholder="名" value=""
                                           required="">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="text">年齢</label>
                                    <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" placeholder="age">
                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label for="email">メールアドレス</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                           placeholder="you@example.com"
                                           value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="pref">都道府県</label>
                                    <select name="pref_id" id="pref_id" class="form-control @error('pref_id') is-invalid @enderror">
                                        @foreach($prefs as $pref)
                                            <option value="{{ $pref->id }}">
                                                {{ $pref->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pref_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="role">権限</label>
                                    <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="store_id">所属店舗</label>
                                    <select name="store_id" id="stoe_id" class="form-control @error('store_id') is-invalid @enderror">
                                        @foreach($stores as $store)
                                            <option value="{{ $store->id }}">
                                                {{ $store->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('store_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">雇用形態</label>
                                    <select name="employment_status_id" id="employment_status_id" class="form-control @error('employment_status_id') is-invalid @enderror">
                                        @foreach($employment_statuses as $employment_status)
                                            <option value="{{ $employment_status->id }}">
                                                {{ $employment_status->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('employment_status_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="role">パスワード</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="store_id">パスワード確認</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block" type="submit">登録</button>
                        </form>
                    </div>

                </div>
            </div>
            {{--        <div class="col-md-8">--}}
            {{--            <div class="card">--}}
            {{--                <div class="card-header">新規登録</div>--}}

            {{--                <div class="card-body">--}}
            {{--                    <form method="POST" action="{{ route('register') }}">--}}
            {{--                        @csrf--}}

            {{--                        <div class="form-group row">--}}
            {{--                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>--}}

            {{--                            <div class="col-md-6">--}}
            {{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

            {{--                                @error('name')--}}
            {{--                                    <span class="invalid-feedback" role="alert">--}}
            {{--                                        <strong>{{ $message }}</strong>--}}
            {{--                                    </span>--}}
            {{--                                @enderror--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                        <div class="form-group row">--}}
            {{--                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>--}}

            {{--                            <div class="col-md-6">--}}
            {{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

            {{--                                @error('email')--}}
            {{--                                    <span class="invalid-feedback" role="alert">--}}
            {{--                                        <strong>{{ $message }}</strong>--}}
            {{--                                    </span>--}}
            {{--                                @enderror--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                        <div class="form-group row">--}}
            {{--                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>--}}

            {{--                            <div class="col-md-6">--}}
            {{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

            {{--                                @error('password')--}}
            {{--                                    <span class="invalid-feedback" role="alert">--}}
            {{--                                        <strong>{{ $message }}</strong>--}}
            {{--                                    </span>--}}
            {{--                                @enderror--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                        <div class="form-group row">--}}
            {{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード確認</label>--}}

            {{--                            <div class="col-md-6">--}}
            {{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                        <div class="form-group row mb-0">--}}
            {{--                            <div class="col-md-6 offset-md-4">--}}
            {{--                                <button type="submit" class="btn btn-primary">--}}
            {{--                                    登録--}}
            {{--                                </button>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </form>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
        </div>
    </div>
@endsection
