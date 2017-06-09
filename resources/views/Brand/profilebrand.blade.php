@extends('Brand.layouts.brandlayout')


@section('top')
  <meta id="token" name="token" value="{{ csrf_token() }}">
 
@endsection

@section('content')

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Profile
        <small>
          <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">My Profile</li>
          </ol>
        </small>
       
      </h1>   
        
          
      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <div class="row" style="margin-left: 10px">
   
  <div class="ui card">
  <div class="ui slide masked reveal image">
    <img src="{{ URL::asset('dist/img/user1-128x128.jpg') }}"   >
    
  </div>
  <div class="extra content">
  <div class="ui huge star rating" data-rating="3" data-max-rating="5" ></div>
    <a class="header">{{ $data->name }}</a> 
    <div class="meta">
      <span class="date">{{ $data->email }}</span>
    </div>
  </div>
  <div class="extra content">
    <a>
   
      <i class="users icon"></i>
      {{ $data->usertype }} Members
    </a>

  </div>

</div>

    </div>

  
      </div>
     
      <!-- /.row (main row) -->
   

    </section>
@endsection

@section('vue')

  <script type="text/javascript">
    
   $('.ui.rating')
  .rating('disable')
;
  </script>
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js') }}
{{ Html::script('https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js') }}

  
@endsection