@extends('layouts.app')

@section('content')

  @if (Session::has('flash_message'))
    <div class="alert alert-success">
      {{session('flash_message')}}
    </div>
  @endif

  <div class="container">
    <div class="row justify-content-left">

        @foreach ($items as $item)
          <div class="col-md-4 mb-2">
            <div class="card">
              <div class="card-header">
                <a href="{{route('item.show', $item->id)}}">{{$item->name}}</a>
              </div>
              <div class="card-body">
                {{$item->amount}}円
              </div>

              @auth
                <form method="POST" action="{{route('cartItem.store')}}" class="form-inline m-1">
                  @csrf
                  <select name="quantity" class="form-control col-md-2 mr-1" id="">
                    <option value="" selected>1</option>
                    <option value="" selected>2</option>
                    <option value="" selected>3</option>
                    <option value="" selected>4</option>
                    <option value="" selected>5</option>
                  </select>
                  <input type="hidden" name="item_id" value="{{$item->id}}">
                  <button type="submit" class="btn btn-primary col-md-6">
                    カートに入れる
                  </button>
                </form>
              @endauth

            </div>
          </div>
        @endforeach

    </div>
    <div class="row justify-content-center">
      {{$items->appends(['keyword' => Request::get('keyword')])->links()}}
    </div>
  </div>

@endsection