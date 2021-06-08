@include('web.header');
  <div class="page-heading text-center">

    <div class="container zoomIn animated">
      
      <h1 class="page-title">Login To Donate<span class="title-under"></span></h1>
      <p class="page-description">
        Fill this form based your credential
      </p>
      
    </div>

  </div>


  <div class="main-container fadeIn animated">

    <div class="container">

      <div class="row">

        <div class="col-md-12 col-sm-12 col-form">

          <h2 class="title-style-2">LOGIN FORM <span class="title-under"></span></h2>

          <form action="{{route('login')}}" method="post" >
            @csrf
            <div class="row">

              <div class="form-group col-md-6">
                              <input type="email" name="email" class="form-control" placeholder="Email*" required>
                          </div>

                           <div class="form-group col-md-6">
                              <input type="password" name="password" class="form-control"
                               placeholder="Password*" required>
                          </div>
              
            </div>


                        <div class="form-group alerts">
                        
                          <div class="alert alert-success" role="alert">
                
              </div>

              <div class="alert alert-danger" role="alert">
                
              </div>
              
                        </div>  

                         <div class="form-group">
                             <button type="button" class="btn btn-info pull-left"  data-toggle="modal" data-target="#donateModal">Register</button>
                              <button type="submit" class="btn btn-success pull-right">Login</button>
                        </div>

                        <div class="clearfix"></div>

          </form>

        </div>



      </div> <!-- /.row -->


    </div>
    


  </div>
@include('web.footer');
