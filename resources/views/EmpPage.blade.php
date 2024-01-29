@extends('layouts.app')

@section('content')



    <div class="container p-5" dir="rtl">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-warning">
                        <li class="breadcrumb-item active " aria-current="page">طلبات الزبائن</li>
                    </ol>
                   
                </nav>
                    <div class="card-body text-center">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">الايميل</th>
                                    <th scope="col">الهاتف</th>

                                    <th scope="col">التاريخ</th>
                                    <th scope="col">الوقت</th>
                                    <th scope="col">اسم الوجبة</th>
                                    <th scope="col">العدد</th>
                                    <th scope="col">سعر الوجبة($)</th>
                                    <th scope="col">المجموع ($)</th>
                                    <th scope="col">العنوان</th>
                                    <th scope="col">إتمام الطلب</th>
                                </tr>
                            </thead>
                           <tbody>

                                @foreach ($order as $row)
                                
                           @if ($row->status == 'قبول')



                                    <tr>
                                        <td>{{ $row->user->name}}</td>
                                        <td>{{ $row->user->email  }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>{{ $row->time }}</td>

                                        <td>{{ $row->meal->name   }}</td>
                                        <td>{{ $row->qty }}</td>
                                        <td>${{ $row->meal->price  }}</td>
                                        <td>${{ $row->meal->price  * $row->qty  }}</td>
                                        <td>{{ $row->address }}</td>
                
                                        @if ($row->status == 'قبول')

                                        <form action="{{ route('order.status', $row->id) }}" method="post">
                                            @csrf

                                            <td>
                                                <input name="status" type="submit" value="إتمام"
                                                    class="btn btn-success btn-sm">
                                            </td>

                                        </form>
                                       
                                  
                                @endif




                                    </tr>
                                    @endif

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5" dir="rtl">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-warning">
                        <li class="breadcrumb-item active " aria-current="page">طلباتي </li>
                    </ol>
                   
                </nav>
                <div class="card-body text-right">
                        <form action="" method="get">
                            <a class="list-group-item list-group-item-action"  href="/order/show">اظهار الطلبات السابقة</a>
                            
                   
          

                        </form>
                       
                    </div>
                    </div>
                    </div>
                    </div>


    <div class="hight"></div>

<style>
    .hight{
        height: 300px;
    }


@endsection
