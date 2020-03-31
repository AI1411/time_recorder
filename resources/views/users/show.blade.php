@extends('layouts.app')

@section('content')
    <div class="row p-4">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="lastName">性</label>
                    <input type="text" class="form-control" id="lastName" placeholder="" value="{{ $user->last_name }}"
                           required="" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="firstName">名前</label>
                    <input type="text" class="form-control" id="firstName" placeholder=""
                           value="{{ $user->first_name }}" required="" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="text">年齢</label>
                    <input type="text" class="form-control" id="age" placeholder="age" value="{{ $user->age }}"
                           readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com"
                           value="{{ $user->email }}" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="pref">都道府県</label>
                    <input type="text" class="form-control" id="text" value="{{ $user->pref->name }}" placeholder="都道府県"
                           readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="role">権限</label>
                    <input type="text" class="form-control" id="role" value="{{ $user->role->name }}" placeholder="権限"
                           readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="store_id">所属店舗</label>
                    <input type="text" class="form-control" id="store_id" value="{{ $user->store->name }}"
                           placeholder="所属店舗" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="salary">給与</label>
                    <input type="text" class="form-control" id="salary"
                           value="{{ !empty($user_salary[0]->salary) ? $user_salary[0]->salary : '未設定' }}"
                           placeholder="給与" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="role">雇用形態</label>
                    <input type="text" class="form-control" id="role" value="{{ $user->employment_status->name }}"
                           placeholder="権限" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="store_id">入社日</label>
                    <input type="text" class="form-control" id="store_id" placeholder="入社日"
                           value="{{ \Illuminate\Support\Str::limit($user->created_at, 10) }}" readonly>
                </div>
            </div>
            <a href="{{ route('users.index') }}">
                <button class="btn btn-block btn-outline-secondary">戻る</button>
            </a>
        </div>
    </div>
@endsection
