@include('web.header');
    <!-- Carousel
    ================================================== -->
    <div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">

          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>

          </ol>

          <div class="carousel-inner" role="listbox">

            <div class="item active">

              <img src="{{url('web/assets/images/slider/home-slider-1.jpg')}}" alt="">

              <div class="container">

                <div class="carousel-caption">

                  <h2 class="carousel-title bounceInDown animated slow">Because they need your help</h2>
                  <h4 class="carousel-subtitle bounceInUp animated slow ">Do not let them down</h4>

                  <a href="" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated slow" >DONATE NOW</a>

                </div> <!-- /.carousel-caption -->

              </div>

            </div> <!-- /.item -->

          </div>

         

    </div><!-- /.carousel -->




    <div class="section-home our-causes animate-onscroll fadeIn">

        <div class="container">

            <h2 class="title-style-1">New Donation Activity<span class="title-under"></span></h2>
             @if($message=Session::get('success'))
        <div class="alert bg-teal" role="alert">
            <em class="fa fa-lg fa-check">&nbsp;</em> 
           {{$message}}
        </div>
        @endif
            <div class="row">

                @foreach($data_empat as $key => $data)
                <div class="col-md-3 col-sm-6">

                    <div class="cause">

                        <img src="{{$data->bansos_banner}}" alt="" class="cause-img">

                        <div class="progress cause-progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                            {{number_format($total_donasi[$key])}} / {{number_format($data->total_donation)}}
                          </div>
                        </div>

                        <h4 class="cause-title"><a href="">{{$data->category->name_category}}</a></h4>
                        <div class="cause-details">
                          {{mb_strimwidth($data->name_donation,0,70,'...')}}
                          <br>
                           Open until {{$data->date_donation}}
                        </div>

                        <div class="btn-holder text-center">

                          @if($now > $data->date_donation || $total_donasi[$key]>=$data->total_donation)
                         <a href="" class="btn btn-danger" > DONATION ENDED</a>
                          @elseif($now <= $data->date_donation)
                           @auth
                          <a href="" class="btn btn-primary" data-toggle="modal" data-target="#donateModalauth-{{$data->id}}"> DONATE NOW</a>
                          @endauth
                          @guest
                           <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#donateModal"> DONATE NOW</a>
                          @endauth
                          @endif
                        </div>
                    </div> <!-- /.cause -->
                </div> 

  @auth
                <!-- ifauth -->
    <!-- Donate Modal -->
    <div class="modal fade" id="donateModalauth-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">DONATE {{strtoupper($data->category->name_category)}}</h4>
          </div>
          <div class="modal-body">

                <form class="form-donation" method="post" action="{{url('donation_donate/'.$data->id)}}">
                    @csrf
                        <h3 class="title-style-1 text-center">Thank you for your donate <span class="title-under"></span>  </h3>

                        <div class="row">

                            <div class="form-group col-md-12 ">
                                <label>Donor Name</label>
                                <input type="text" value="{{Auth::user()->name}}" class="form-control" name="name" id="amount" readonly placeholder="Full Name">
                            </div>

                        </div>


                         <div class="row">

                            <div class="form-group col-md-12 ">
                                <label>Donation Activity Name</label>
                                <p>{{$data->name_donation}}</p>
                            </div>
                        </div>

                         <div class="row" id="mustbeamoutn" style="display: none;">

                            
                        </div>

                         <div class="row">

                            <div class="form-group col-md-12 ">
                                <label>Amount</label>
                                <input type="text" required class="form-control" name="total_item" id="amount" placeholder="amount donation">
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary pull-right" name="donateNow" >DONATE NOW</button>
                            </div>
                        </div>
                </form>
          </div>
        </div>
      </div>
    </div> <!-- /.modal -->
    @endauth
              @endforeach
            </div>

        </div>
        
    </div> <!-- /.our-causes -->

@include('web.footer');
