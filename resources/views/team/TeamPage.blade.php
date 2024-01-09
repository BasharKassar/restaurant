@extends('layouts.app')


@section('content')


<div class="container p-5" dir="rtl">
     <div class="row justify-content-center p-5">


         <div class="col-md-4">
             <div class="card">
                 <div class="card-header text-center">الفريق</div>
                 <form action="{{ route('team.store') }}" method="post">
                     @csrf
                     <div class="card-body text-right">
                         <div class="form-group">
                             <label for="name">اسم </label>
                             <input type="text" class="form-control" name="team_name" placeholder="اسم العضو">
                         </div>
                         
                         <br>

<div class="form-group">
    <label>صورة </label>
    <input type="file" name="image" class="form-control" id="image">
</div>
<br>
<div class="form-group">
    <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;">
</div>


<br>

                         <div class="form-group text-center">
                             <button class="btn btn-danger" type="submit">حفظ</button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>



         <div class="col-md-8">
             <div class="card">
                 <div class="card-header text-center">الفريق</div>


                 <div class="card-body">
                     @if (session('message'))
                         <div class="alert alert-success" role="alert">
                             {{ session('message') }}
                         </div>
                     @endif
                     <table class="table table-bordered text-center">
                         <thead>
                             <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">اسم العضو</th>
                                 <th scope="col">تعديل</th>
                                 <th scope="col">حذف</th>

                             </tr>
                         </thead>
                      <tbody>

                        @foreach ($teams as $key=> $row)
                        <tr>


                            <td scope="row" style="width: 12%">{{ $key=$key+1 }} </th>
                                <td hidden >{{ $row->id}}</td>
                        
                            <td>{{ $row->team_name }}</td>

                            <td style="width: 15%"><button class="btn btn-primary editbtn">تعديل</button></td>

                            <td style="width: 15%">
                                 <a href="{{ route('team.delete',$row->id) }}" class="btn btn-danger" id="delete">حذف</a>
                             </td>

                        </tr>

                        @endforeach


                      </tbody>
                   </table>


                 </div>

             </div>

         </div>

     </div>

 </div>




 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" dir="rtl">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">اسم العضو</h5>

        </div>
        
        <div class="modal-body">
            <form action="{{ route('team.update') }}" method="POST">
            @csrf

            <input type="hidden" class="form-control" id="id" name="id">

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">work </label>
              <input type="text" class="form-control" id="team_name" name="team_name">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">اسم العضو</label>
              <input type="text" class="form-control" id="team_name" name="team_name">
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
          <button type="submit" class="btn btn-primary">تعديل</button>
        </div>
    </form>
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function(){
        $('.editbtn').on('click',function(){
            $('#exampleModal').modal('show');

            $tr=$(this).closest('tr');

        var data=$tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);
        $('#id').val(data[1]);
        $('#cat_name').val(data[2]);


                });
            });
            </script>
@endsection
