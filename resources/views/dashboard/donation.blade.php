@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Donation</li>
            </ol>
        </div><!--/.row-->
       
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Donation</h1>
            </div>
        </div><!--/.row-->

        @if($message=Session::get('success'))
        <div class="alert bg-teal" role="alert">
            <em class="fa fa-lg fa-check">&nbsp;</em> 
           {{$message}}
        </div>
        @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                         <p align="left"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddDonation">
                          Add Donation
                        </button></p>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                             <div class="table-responsive">
                            <table class="table table-striped b-t b-b" id="tableok">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th>Category Name</th>
                                        <th>Name Of Donation</th>
                                        <th>Receiver</th>
                                         <th>Total Amount</th>
                                        <th>Due Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($data as $donation)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$donation->category->name_category}}</td>
                                    <td>{{mb_strimwidth($donation->name_donation,0,22,'...')}}</td>
                                    <td>{{$donation->receiver->name_receiver}}</td>
                                    <td>{{number_format($donation->total_donation)}}</td>
                                     <td>{{$donation->date_donation}}</td>
                                    <td>
                                                    <button 
                                                        class="btn btn-info btn-sm" 
                                                        data-toggle="modal" 
                                                        data-target="#Editdonation-{{$donation->id}}">
                                                    Edit
                                                    </button>
                                                    <button 
                                                        class="btn btn-danger btn-sm" 
                                                        data-toggle="modal"
                                                        data-target="#Deletedonation-{{$donation->id}}">
                                                    Delete
                                                    </button>
                                    </td>
                                </tr>
                                @php $no++; @endphp
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                             <div class="table-responsive">
                        </div>
                    </div>
                </div><!-- /.panel-->
    </div>  <!--/.main-->

     <!-- The Modal -->
  <div class="modal" id="AddDonation">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New donation</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" action="{{url('donation_add')}}" method="POST" enctype="multipart/form-data">
                @csrf
        <div class="form-group">
            <label>Donation Name</label>
            <input required class="form-control" name="name_donation" placeholder="donation Name">
        </div>

        <div class="form-group">
            <label>Donation Category</label>
            <select style="width: 100%" class="form-control js-example-basic-single"
             name="bansos_category_id">
              <option value="0">Choose Category</option>
                @foreach($category as $vd)
                <option value="{{$vd->id}}">{{$vd->name_category}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Donation Receiver</label>
            <select style="width: 100%" class="form-control js-example-basic-single"
             name="bansos_receiver_id">
              <option value="0">Choose Receiver</option>
                @foreach($receiver as $vd)
                <option value="{{$vd->id}}">{{$vd->name_receiver}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label>Amount Donation</label>
            <input required class="form-control"  name="total_donation" placeholder="Amount Donation">
        </div>

        <div class="form-group">
            <label>Date Expired Donation</label>
            <input type="date" required class="form-control" name="date_donation" placeholder="Seats">
        </div>
    <div class="form-group">
            <label>Banner Donation</label>
            <input type="file" required class="form-control" name="banner" placeholder="Seats">
        </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
         <button type="submit" class="btn btn-info">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

   @foreach($data as $data)
   <div class="modal" id="Editdonation-{{$data->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit donation</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" action="{{url('donation_update/'.$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
        <div class="form-group">
            <label>donation Name</label>
            <input required class="form-control" value="{{$data->name_donation}}" name="name_donation" placeholder="donation Name">
        </div>

                <div class="form-group">
            <label>Donation Category</label>
            <select style="width: 100%" class="form-control js-example-basic-single"
             name="bansos_category_id">
              <option value="0">Choose Category</option>
                @foreach($category as $vd)
                <option value="{{$vd->id}}" {{$data->bansos_category_id == $vd->id ? 'selected':''}}>{{$vd->name_category}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Donation Receiver</label>
            <select style="width: 100%" class="form-control js-example-basic-single"
             name="bansos_receiver_id">
              <option value="0">Choose Receiver</option>
                @foreach($receiver as $vd)
                <option value="{{$vd->id}}"  {{$data->bansos_receiver_id == $vd->id ? 'selected':''}}>{{$vd->name_receiver}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label>Amount Donation</label>
            <input required class="form-control" value="{{$data->total_donation}}" name="total_donation" placeholder="Amount Donation">
        </div>

        <div class="form-group">
            <label>Date Expired Donation</label>
            <input type="date" required class="form-control" value="{{$data->date_donation}}" name="date_donation" placeholder="Seats">
        </div>
            <div class="form-group">
            <label>Banner Donation</label>
            <input type="file" required class="form-control" name="banner" placeholder="Seats">
        </div>
        <img src="{{$data->bansos_banner}}" style="
        width: 40%">
        <input type="hidden" name="old_banner" value="{{$data->bansos_banner}}">
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
         <button type="submit" class="btn btn-info">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
    </form>
      </div>
    </div>
  </div>

     <div class="modal" id="Deletedonation-{{$data->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete donation</h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <h5>Are you sure you want to delete data, if the data is deleted it will also delete data related to this data! this action cannot be canceled</h5>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <a href="{{url('donation_delete/'.$donation->id)}}" class="btn btn-info">Yes</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
   @endforeach
@endsection
