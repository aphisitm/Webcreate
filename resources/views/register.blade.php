<!DOCTYPE html>
<!-- saved from url=(0043)https://semantic-ui.com/examples/login.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Standard Meta -->
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta id="token" name="token" value="{{ csrf_token() }}">
  <!-- Site Properties -->
  <title>Login Example - Semantic</title>
  {{ Html::style('semantic/dist/semantic.min.css') }}
 
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="semantic/dist/semantic.min.js"></script>

</head>
<style type="text/css">
    body {
    background-image: url("img/dark_blue_background-wallpaper-1920x1080.jpg");
}
</style>
<body class="hold-transition skin-blue sidebar-mini "  >
  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
  <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
            fields: {
              name    : 'empty',
              email   : ['email', 'empty'],
              phone : ['maxLength[10]','minLength[9]', 'empty'],
              password : ['minLength[8]', 'empty'],
              usertype   : 'empty',
              accountname   : 'empty',
              
            }
        })
      ;
    })
  ;
  </script>
</head>
<body >

<div class="ui middle aligned center aligned grid">
  <div class="column">
    
    <form class="ui large form" action="/register" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
      <div class="ui stacked segment">

      <h3 class="ui teal horizontal divider header">
        <i class="users icon"></i>
         Log-in to your account
      </h3>

        <div class="field">
          <div class="ui left icon input">          
            <i class="user icon"></i>           
              <select class="ui dropdown" name="usertype">
                <option value="">Usertype</option>
                <option value="0">I'm brand</option>
                <option value="1">I'm creator</option>
                <option value="2">I'm Influencer</option>
              </select>                                                             
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input id="accountname" type="text" class="form-control" name="accountname" value="{{ old('accountname') }}" placeholder="Account Name"  required autofocus>
          </div>
        </div>

        <h4 class="ui teal horizontal divider header">
        Information
        </h4>

        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name"  required autofocus>
          </div>
        </div>

        <div class="field">
          <div class="ui left icon input">
            <i class="mail outline icon"></i>
             <input id="email" type="email" class="form-control" name="email" placeholder="Email"  value="{{ old('email') }}" required>
          </div>
        </div>

        <div class="field">
          <div class="ui left icon input">
            <i class="call square icon"></i>
            <input id="phone" type="text" maxlength="10" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone"  required autofocus>                              
          </div>
        </div>

         <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>                           
          </div>
        </div>

        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
             <input id="password" type="password" class="form-control" placeholder="Password confirmation" name="password" required>
          </div>
        </div>

        <div class="ui fluid large teal submit button">Register</div>
      </div>
      <div class="ui error message"></div>
    </form>
    <div class="ui message">
      <a href="/login">Sign in</a>
    </div>
  </div>
</div>


</body>
</html>
