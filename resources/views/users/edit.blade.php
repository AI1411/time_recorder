@extends('layouts.app')

@section('content')
    <div class="row p-4">
        <div class="col-md-8">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="lastName">姓</label>
                        <input type="text" name="last_name" class="form-control" id="lastName" placeholder=""
                               value="{{ $user->last_name }}"
                               required="">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="firstName">名</label>
                        <input type="text" name="first_name" class="form-control" id="firstName" placeholder=""
                               value="{{ $user->first_name }}" required="">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="text">年齢</label>
                        <input type="text" name="age" class="form-control" id="age" placeholder="age"
                               value="{{ $user->age }}"
                        >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="email">メールアドレス</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com"
                               value="{{ $user->email }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="pref">都道府県</label>
                        <select name="pref_id" id="" class="form-control">
                            @foreach($prefs as $pref)
                                <option
                                    value="{{ $pref->id }}" {{ $pref->name == $user->pref->name ? 'selected' : '' }}>
                                    {{ $pref->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="role">権限</label>
                        <select name="role_id" id="" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="store_id">所属店舗</label>
                        <select name="store_id" id="" class="form-control">
                            @foreach($stores as $store)
                                <option value="{{ $store->id }}" {{ $store->id == $user->store_id ? 'selected' : '' }}>
                                    {{ $store->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="salary">給与</label>
                        <input type="text" class="form-control" id="salary"
                               value="{{ !empty($user_salary[0]->salary) ? $user_salary[0]->salary : '未設定' }}"
                               placeholder="給与">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="role">雇用形態</label>
                        <select name="employment_status_id" id="" class="form-control">
                            @foreach($employment_statuses as $employment_status)
                                <option value="{{ $employment_status->id }}" {{ $employment_status->id == $user->employment_status_id ? 'selected' : '' }}>
                                    {{ $employment_status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="store_id">入社日</label>
                        <input type="text" class="form-control" id="store_id" placeholder="入社日"
                               value="{{ \Illuminate\Support\Str::limit($user->created_at, 10) }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-secondary btn-block">登録</button>
            </form>
        </div>
    </div>
@endsection
