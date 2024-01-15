@extends('layouts.app')
@section('content')
<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Team</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" aaction='{{url("team/{$team->id}")}}'  enctype="multipart/form-data">
      @csrf
      @method('PUT')
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        {{session()->get('success')}}
      </div>


      @endif
      @if ($errors->any())
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>

      @endif

      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">name_team </label>
              <input type="text" class="form-control" id="exampleInputEmail1" value="{{$team->name_team}}" name="name_ar" placeholder="Enter ">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">work</label>
              <input type="text" class="form-control" id="exampleInputEmail1" value="{{$team->work}}" name="name_en" placeholder="Enter ">
            </div>
          </div>
          <div class="col-md-6">

            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                                <div class="input-group-append">
                </div>
              </div>
              <img width="50" src='{{asset("Teamimage/{$team->image}")}}'>

            </div>
          </div>
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.card -->




  <!-- /.card -->


</div>
@endsection]