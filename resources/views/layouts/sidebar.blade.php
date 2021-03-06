<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        <a href="/" class="list-group-item list-group-item-action bg-light">ダッシュボード</a>
        @if(auth()->user()->role_id == 1)
            <a href="#" class="list-group-item list-group-item-action bg-light">店舗管理</a>
            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-light">従業員管理</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">シフト登録</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">シフト確認</a>
        @endif
        <a href="{{ route('attendances.index') }}" class="list-group-item list-group-item-action bg-light">勤怠申請</a>
        <a href="{{ route('atd_confirm.index') }}" class="list-group-item list-group-item-action bg-light">勤怠確認</a>
        <a href="{{ route('expenses.index') }}" class="list-group-item list-group-item-action bg-light">経費申請</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">経費確認</a>
        <a class="list-group-item list-group-item-action bg-light" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            ログアウト
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
              style="display: none;">
            @csrf
        </form>
    </div>
</div>
