@extends('layouts.master')
@section('title','MediConnect-Categories')
@section('main')
    
  <!-- Single Page Header start -->
  <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Categories</h1>
</div>
<!-- Single Page Header End -->


       <!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
              
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($value as $item)
                                <!-- Adjust the column size here -->
                                <div class="col-md-6 col-lg-3">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="img/medi.jpg" class="img-fluid w-100 rounded-top" alt="med">
                                        </div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>{{$item->name}}</h4>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <a href="{{route('products',['nomcat'=>$item->name])}}" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                    <i class="fas fa-eye"></i> view</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->

@endsection