<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class UsersExport implements FromCollection, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::searchStore()->get();
    }

    public function title():string
    {
        return '従業員一覧';
    }

    public function headings():array
    {
        return [
            'id',
            'フルネーム',
            '名前',
            '姓',
            '年齢',
            '都道府県',
            '地域',
            '権限',
            '店舗',
            '雇用契約',
            'メールアドレス',
        ];
    }
}
