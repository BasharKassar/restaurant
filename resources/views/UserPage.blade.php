<div class="all">
@extends('layouts.app')
@section('content')

    <div class="container pt-5" dir="rtl">
        <div class="row justify-content-center pt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">القائمة</div>
                    <div class="card-body text-right">
                        <form action="" method="get">
                        
                            <a class="list-group-item list-group-item-action"  href="/home">الصفحة الرئيسية</a>
                           
                            @foreach ($cats as $row)
                                <input type="submit" value="{{ $row->cat_name }}" name="category"
                                    class="list-group-item list-group-item-action  " >
                            @endforeach


                        </form>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header text-center">الطلبات السابقة</div>
                    <div class="card-body text-right">
                        <form action="" method="get">
                            <a class="list-group-item list-group-item-action"  href="/order/show">اظهار الطلبات السابقة</a>
                            
                            <div class="top-nav ">
            </div>


            

                        </form>
                        
                    </div>
                </div>

            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>{{ $cat1 }}</h4>
                        عدد الوجبات ({{count($meals)}})</div>

                    <div class="card-body">
                        <div class="row">
                       
                            @forelse ($meals as $meal )
                                <div class="col-md-4 mt-2 text-center" style="border: 1px solid rgb(149, 212, 159) ;">
                                    <img src="{{ asset($meal->image) }}" class="img-thumbnail" style="width:100%;">
                                    <strong>{{ $meal->name }}</strong>
                                    <p>{{ $meal->description }}</p>
                                    <div>

                                        <a href="{{ route('meal_deatails',$meal->id) }}" class="btn btn-success" style="font-size:16px" title="Add Cart">
                                            <i >اطلب الأن
                                        </a></i>

                                    </div>
                                    <br>
                                </div>
                            @empty
                                <p>لا يوجد وجبات متوفرة</p>
                            @endforelse


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<div class="hight"></div>
 <!-- Footer Start -->
 <footer class="bg-dark text-white text-lg-start">

<div class="container p-4">

<div class="row">
<div class="col-lg-4 col-md-6 mb-4 mb-md-0 text-center">
    <h5 class="text-uppercase text-success">تواصل معنا</h5>
        <p> سوريا-حلب <i class="fas fa-home me-3"></i></p>
     <p>
    bashar@gmail.com
       <i class="fas fa-envelope me-3"></i>
      </p>
      <p>0960001309 <i class="fas fa-phone me-3"></i></p>

  </div>

  <div class="col-lg-4 col-md-6 mb-4 mb-md-0 text-center">
    <h5 class="text-uppercase text-center text-success"> الوصول السريع</h5>

    <ul class="list-unstyled mb-0">
      <li>
        <a href="#!" class="text-white link"> من نحن <i class="fa fa-angle-left" aria-hidden="true"></i></a>
      </li>
      <li>
        <a href="#!" class="text-white link">سياسة الخصوصية <i class="fa fa-angle-left" aria-hidden="true"></i></a>
      </li>
      <li>
        <a href="#!" class="text-white link">تواصل معنا <i class="fa fa-angle-left" aria-hidden="true"></i></a>
      </li>
    </ul>
  </div>

  <div class="col-lg-4 col-md-12 mb-4 mb-md-0 text-center">
    <h5 class="text-uppercase text-center text-success">وجبتي</h5>

    <p>
    موقع وجبتي     </p>
  </div>

</div>



</div>

<div class="container p-4 pb-0 text-center">
<!-- Section: Social media -->
<section class="mb-4">
  <!-- Facebook -->
  <a
    class="btn btn-primary btn-floating m-1"
    style="background-color: #3b5998;"
    href="#!"
    role="button"
    ><i class="fab fa-facebook-f"></i
  ></a>

  <a
    class="btn btn-primary btn-floating m-1"
    style="background-color: #55acee;"
    href="#!"
    role="button"
    ><i class="fab fa-twitter"></i
  ></a>

  <!-- Google -->


  <a
    class="btn btn-primary btn-floating m-1"
    style="background-color: #dd4b39;"
    href="#!"
    role="button"
    ><i class="fab fa-google"></i
  ></a>

  <!-- Instagram -->
  <a
    class="btn btn-primary btn-floating m-1"
    style="background-color: #ac2bac;"
    href="#!"
    role="button"
    ><i class="fab fa-instagram"></i
  ></a>

  <!-- Linkedin -->
  <a
    class="btn btn-primary btn-floating m-1"
    style="background-color: #0082ca;"
    href="#!"
    role="button"
    ><i class="fab fa-linkedin-in"></i
  ></a>
  <!-- Github -->
  <a
    class="btn btn-primary btn-floating m-1"
    style="background-color: #333333;"
    href="#!"
    role="button"
    ><i class="fab fa-github"></i
  ></a>
</section>

</div>

<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
© 2023
</div>
</footer>
    <!-- Footer End -->

    <style>
        a.list-group-item {
            font-size: 18px;
        }

        a.list-group-item:hover {
            background-color: rgb(61, 114, 56);
            color: #fff;
        }

        .card-header {
            background-color: rgb(47, 160, 36);
            color: #fff;
            font-size: 20px;
        }
        .hight{
        height: 500px;
    }
    a.link{
            text-decoration: none;
        }
            .link:hover {
    letter-spacing: 1px;
    box-shadow: none;
}



    </style>




@endsection

