<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        <a href="/" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        @if(auth()->user()->role_id == 1)
            <a href="#" class="list-group-item list-group-item-action bg-light">店舗管理</a>
            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-light">従業員管理</a>
        @endif
        <a href="#" class="list-group-item list-group-item-action bg-light">シフト申請</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">シフト確認</a>
        <a href="{{ route('attendances.index') }}" class="list-group-item list-group-item-action bg-light">勤怠申請</a>
        <a href="{{ route('atd_confirm.index') }}" class="list-group-item list-group-item-action bg-light">勤怠確認</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">経費申請</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">経費申請</a>
    </div>
</div>
