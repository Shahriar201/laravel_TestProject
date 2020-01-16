@extends('layout.web.welcome')

@section('content')
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

          <a href="{{ route('add.category') }}" class="btn btn-danger">Add Category</a>
          <a href="{{ route('all.category') }}" class="btn btn-info">All Category</a>
          
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" placeholder="Title"  required >
              
            </div>
          </div>
          <br>

          <div class="control-group">
        
              <label>Category</label>
              <select class="form-control" name="category_id">
                  <option>Bangla</option>
                  <option>History</option>
                  <option>Philosofy</option>
                  <option>Economic</option>
                  <option>Agricultural</option>
                  </select>
              
            </div>
         
          <br>
          
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control"  required >
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" placeholder="Details"  required></textarea>
              
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>
      


@endsection()