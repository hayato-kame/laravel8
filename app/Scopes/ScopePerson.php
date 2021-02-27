<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ScopePerson implements Scope
{
    // インタフェースが持ってる中身の無い　abstractなメソッドを、実装した子クラスでは、
    // 必ずpublic で実装しないといけません。具象クラスにならなければ、インスタンス化できないからです。

    public function apply(Builder $builder, Model $model): void{
        $builder->where('age', '>', 20);
    }
}