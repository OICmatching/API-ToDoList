@extends('layout')

@section('title')
  C言語練習問題
@endsection

@section('content')
        <tbody>
            <ul class="rentals">
              @foreach($result as $row)
                {{ $row->id}}
                {{ $row->name}}
                {{ $row->question }}<br>
              @endforeach
            </ul>
        </tbody>

  
@endsection
