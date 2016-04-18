<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>
    @yield('browsertitle')
  </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/styles.css" media="screen" title="no title" charset="utf-8">
  @yield('css')
</head>

<body>

  @include('topnav')

  @yield('outsidecontainer')

  <div class="container">
    <div class="row">
      <br><br>
      @include('errormessage')
    </div>

    @yield('content')

  </div>

  <div class="row footer-background">
    <div class="col-sm-3">
      <div class="padding-left-8px">
        <h4>Contact Us</h4>
        123 Main St. <br>
        Unionville, PA <br>
        23455 <br>
        + (555) 333-2345
      </div>
    </div>
    <div class="col-sm-6">
    </div>
    <div class="col-sm-3">
      <img src="/assets/map-small.png" class="pull-right"/>
    </div>
  </div>

  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  @yield('bottomjs')

</body>

</html>
