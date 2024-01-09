@extends('layouts.app')

@section('content')

<div class="container" dir="rtl">
    <div class="row justify-content-center m-5 loginn">
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              استيراد وتصدير وجبة
                          </header>
                          <div class="panel-body">
                          <form action="{{ url('/import') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if(session()->has('success'))
                                <div class="row">
                                    <div class="alert alert-success fade in">
                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            <strong>{{session()->get('success')}}</strong>
                                    </div>
                                </div>
                                    
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="file" name="file">
                                <button type="submit">Import</button>
                            </form>

                            <a href="{{ url('/export') }}">Export</a>
                             
                          </div>
                      </section>
                  </div>
                  </div>
              
              </div>
              </div>
@endsection