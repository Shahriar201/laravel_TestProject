@extends('layout.web.welcome')

@section('content')
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

          <a href="{{ route('add.category') }}" class="btn btn-danger">Add Category</a>
          <a href="{{ route('all.category') }}" class="btn btn-info">All Category</a>

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          
        <form action="{{ URL::to('update.category'.$category->id) }}" method="post">
            @csrf
            
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" class="form-control" value="{{ $category->name }}" name="name" >
              
            </div>
          </div>
          <br>

          <form name="sentMessage" id="contactForm" novalidate>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
              <input type="text" class="form-control" value="{{ $category->slug }}" Name" name="slug" >
              
            </div>
          </div>
          <br>

          
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
          </div>
        </form>
      </div>
    </div>
      


@endsection()
