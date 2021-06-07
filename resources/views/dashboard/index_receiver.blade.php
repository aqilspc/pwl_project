@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Receiver</li>
            </ol>
        </div><!--/.row-->
       
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Receiver</h1>
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
                         <p align="left"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddCustomer">
                          Add Receiver
                        </button></p>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                            <table class="table table-striped b-t b-b" id="tableok">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th >Name Of Receiver</th>
                                        <th >Address</th>
                                        <th >Phone Number</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($data as $user)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$user->name_receiver}}</td>
                                     <td>{{$user->address_receiver}}</td>
                                     <td>{{$user->phone_receiver}}</td>

                                    <td>
                                                    <button 
                                                        class="btn btn-info btn-sm" 
                                                        data-toggle="modal" 
                                                        data-target="#Editcustomer-{{$user->id}}">
                                                    Edit
                                                    </button>
                                                    <button 
                                                        class="btn btn-danger btn-sm" 
                                                        data-toggle="modal"
                                                        data-target="#Deletecustomer-{{$user->id}}">
                                                    Delete
                                                    </button>
                                    </td>
                                </tr>
                                @php $no++; @endphp
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.panel-->
    </div>  <!--/.main-->

     <!-- The Modal -->
  <div class="modal" id="AddCustomer">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Rceiver</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" action="{{url('receiver_add')}}" method="POST">
                @csrf
       <div class="form-group">
            <label>Name Of Rceiver</label>
            <input class="form-control" 
            name="name_receiver" placeholder="Name Of Rceiver">
        </div>
    
         <div class="form-group">
            <label>Phone Number</label>
            <input class="form-control" 
            name="phone_receiver" placeholder="Phone Of Rceiver">
        </div>

         <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" 
            name="address_receiver" placeholder="Address Of Rceiver">
                
            </textarea>
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

   @foreach($data as $vd)
   <div class="modal" id="Editcustomer-{{$vd->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Receiver</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" action="{{url('receiver_update/'.$vd->id)}}" method="POST">
                @csrf
            <div class="form-group">
            <label>Name Of Rceiver</label>
            <input class="form-control" 
            name="name_receiver" value="{{$vd->name_receiver}}" placeholder="Name Of Rceiver">
        </div>

    
         <div class="form-group">
            <label>Phone Number</label>
            <input class="form-control" 
            name="phone_receiver" value="{{$vd->phone_receiver}}" placeholder="Phone Of Rceiver">
        </div>

         <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" 
            name="address_receiver" placeholder="Address Of Rceiver">
                {{$vd->address_receiver}}
            </textarea>
        </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <button type="submit" class="btn btn-info">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>

     <div class="modal" id="Deletecustomer-{{$vd->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete receiver</h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <h5>Are you sure you want to delete data, if the data is deleted it will also delete data related to this data! this action cannot be canceled</h5>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <a href="{{url('receiver_delete/'.$vd->id)}}" class="btn btn-info">Yes</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
   @endforeach
@endsection
