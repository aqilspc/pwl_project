@include('web.header');
  <div class="page-heading text-center">

    <div class="container zoomIn animated">
      
      <h1 class="page-title">Donation Activites<span class="title-under"></span></h1>
      <p class="page-description">
        List of your donation
      </p>
      
    </div>

  </div>


  <div class="main-container fadeIn animated">

    <div class="container">

      <div class="row">

        <div class="col-md-12 col-sm-12 col-form">

          <h2 class="title-style-2">List Activities<span class="title-under"></span></h2>

           <div class="table-responsive">
                            <table class="table table-striped b-t b-b" id="tableok">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th>Bansos Name</th>
                                        <th>Bansos Donatur</th>
                                        <th>Total item</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($data as $d)
                                @if($d->contributor->user->id == Auth::user()->id)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$d->donation->name_donation}}</td>
                                    <td>{{$d->contributor->name_contributor}}-
                                    </td>
                                    <td>{{$d->total_item}}</td>

                                </tr>
                                @endif
                                @php $no++; @endphp
                                @endforeach
                                </tbody>
                                </table>
                            </div>

        </div>
      </div> <!-- /.row -->

    </div>
    


  </div>
@include('web.footer');
