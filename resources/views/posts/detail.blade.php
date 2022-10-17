@extends('layouts.default')
@section('head')
@endsection
@section('content')
    <p>タイトル:{{ $title }}</p>
    <p>詳細内容:{{ $content }}</p>
    <p>ユーザーID:{{ $user_id }}</p>
@endsection
