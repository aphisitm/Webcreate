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
   <div class="ui grid">
  <div class="four wide column">
      <div class="ui special cards">
        <div class="card">
          <div class="blurring dimmable image">
            <div class="ui inverted dimmer">
              <div class="content">
                <div class="center">
                  <div class="ui primary button" data-toggle="modal" data-target="#edit-item">Edit Profile</div>
                </div>
              </div>
            </div>
            <img src="{{ URL::asset('dist/img/user1-128x128.jpg') }}">
          </div>
          <div class="extra content">
             <h2>{{ $data->accountname }} <div class="ui huge star rating" data-rating="3" data-max-rating="5" ></div></h2>           
            <span class="date">Phone : {{ $data->phone }}</span><br>
            <span class="date">Email : {{ $data->email }}</span>
            
            <div class="description">
            @if( strlen($data->aboutme) > 0 )
           <h5>About Me : </h5>     
            {{ $data->aboutme }}
            @endif
          </div>
          </div>

          <div class="extra content">
            <span>
              <i class="inverted yellow trophy icon"></i>
               {{ $datacount->campaigns_count }} Campaign
            </span>
          <span class="right floated">
              <i class="red heart icon icon"></i>
              250 Like
            </span>
          </div>
        </div>
      </div>
 </div>
  <div class="ten wide column">


  <h2>Welcome to MS Brand</h2>
  <p></p>
    <div class="ui embed" data-source="youtube" data-id="RgKAFK5djSk""></div>
    <h2>Welcome to MS Brand</h2>
  <p></p>
    <div class="ui embed" data-source="youtube" data-id="RgKAFK5djSk""></div>
    <h2>Welcome to MS Brand</h2>
  <p></p>
    <div class="ui embed" data-source="youtube" data-id="RgKAFK5djSk""></div> 
  </div>

</div>
  
<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h3 class="ui teal horizontal divider header">
        <i class="users icon"></i>
         Edit - Profile
      </h3>
          </div>
          <div class="modal-body">



          {{ Html::ul($errors->all()) }}

          {{ Form::model($data, array('route' => array('myprofile.update', $data->id), 'method' => 'PUT')) }}
              <div class="form-group">
                  {{ Form::label('aboutme', 'About me') }}
                  {{ Form::textarea('aboutme', null, array('class' => 'form-control')) }}
              </div>

              <div class="form-group">
                  {{ Form::label('phone', 'Phone') }}
                  {{ Form::number('phone', null, array('class' => 'form-control')) }}
              </div>            

              {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

          {{ Form::close() }}
             
            
          </div>
        </div>
      </div>
    </div>

    </div>

  
      </div>
     
      <!-- /.row (main row) -->
   

    </section>
@endsection

@section('vue')

  <script type="text/javascript">
  $('.special.cards .image').dimmer({
    on: 'hover'
  });
  
  $('.ui.embed').embed();
  
  $('.ui.rating')
  .rating('disable')
;
  </script>
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js') }}
{{ Html::script('https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js') }}

@endsection