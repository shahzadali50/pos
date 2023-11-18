
<!DOCTYPE html>
<html lang="en">
  <head>
    <x-head/>
   
  </head>
  <body class="light ">
  
    <div class="container vh-100">
      <div class="row align-items-center h-100">
        <div  class="col-lg-4 col-md-5 col-10 mx-auto text-center bg-white  shadow  rounded">
         
        <form action="{{route('loginuser')}}" method="POST">
          @csrf
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="index.php">
            <img src="img/logo/pos_logo.jpg" style="width: 100px;height: 100px;">
          </a>
          <h1 class="h4 mb-3">POS</h1>
          <h1 class="h6 mb-3">Sign in</h1>

          <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" id="inputEmail" name="email" class="form-control form-control-lg" placeholder="Email address" required="" autofocus="">
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control form-control-lg" placeholder="Password" required="">
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Stay logged in </label>
          </div>
          <button class="btn btn-lg btn-admin btn-block" type="submit">Log In</button>
          <p class="mt-5 mb-3 text-muted">©2023</p>
        </form>
        </div>
      </div>
    </div>
   <x-foot/>
   
  </body>
</html>
</body>
</html>