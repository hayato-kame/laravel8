@extends('layouts.helloapp')

@section('title', 'Board.index')

@section('menubar')
    @parent
    ボードページ
@endsection

@section('content')
    <table>
        <tr><th>Data</th></tr>
        @foreach($items as $item)
        <tr>
            <td>{{$item->message}}</td>
            @if(isset($item->person->name))
            <td>{{$item->person->name}}</td>
            @endif
        </tr>
        @endforeach

    </table>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
