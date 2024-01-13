@extends('layouts.app')
@section('content')
<div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                             team
                          </header>
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
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>id</th>
                                  <th>name_team</th>
                                  <th>work</th>

                                  <th>image</th>
                                  <th>تعديل</th>
                                  <th>حذف</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($teams as $key=>$team)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$team->name_team}}</td>
                                    <td>{{$team->work}}</td>

                                    <td>
                                        <img width="50" src='{{asset("teamImage/{$team->image}")}}'>
                                    </td>
                                    <td> 
                                        <a href="{{url('team/create')}}" 
                                        class="btn btn-success">تعديل</a>
                                    </td>
                                    <td>
                                        <form method="post" action='{{url("team-destroy/$team->id")}}'>
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </section>
                  </div>
                 
              </div>
@endsection