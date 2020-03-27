@extends('layouts.app')

@section('content')
    <div class="row p-4">
        <div class="col-md-8">
            <form class="needs-validation" novalidate="">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="lastName">性</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="{{ $user->last_name }}" required="" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="firstName">名前</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="{{ $user->first_name }}" required="" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="text">Age <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="age" placeholder="age" value="{{ $user->age }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com" value="{{ $user->email }}" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="pref">都道府県 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="text" value="{{ $user->pref->name }}" placeholder="都道府県" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="role">権限</label>
                        <input type="text" class="form-control" id="role" value="{{ $user->role->name }}" placeholder="権限" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="store_id">所属店舗</label>
                        <input type="text" class="form-control" id="store_id" value="{{ $user->store->name }}" placeholder="所属店舗" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="salary">給与</label>
                        <input type="text" class="form-control" id="salary" value="{{ $user_salary[0]->salary }}" placeholder="給与" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="role">雇用形態</label>
                        <input type="text" class="form-control" id="role" value="{{ $user->employment_status->name }}" placeholder="権限" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="store_id">入社日</label>
                        <input type="text" class="form-control" id="store_id" placeholder="権限" readonly>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
        <div class="col-md-4">
            fnda
        </div>
    </div>
@endsection
