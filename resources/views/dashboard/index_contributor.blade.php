@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Donatur</li>
            </ol>
        </div><!--/.row-->
       
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List User Donatur</h1>
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
                         <p align="left"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Addcontributor">
                          Add User Donatur
                        </button></p>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                            <table class="table table-striped b-t b-b" id="tableok">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th >User ID</th>
                                        <th >Donatur Name</th>
                                        <th >Email</th>
                                        <th >Phone Number</th>
                                        <th >Address</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($data as $user)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$user->user_id}}</td>
                                    <td>{{$user->name_contributor}}</td>
                                    <td>{{$user->user->email}}</td>
                                     <td>{{$user->phone_contributor}}</td>
                                     <td>{{$user->address_contributor}}</td>
                                    <td>
                                                    <button 
                                                        class="btn btn-info btn-sm" 
                                                        data-toggle="modal" 
                                                        data-target="#Editcontributor-{{$user->id}}">
                                                    Edit
                                                    </button>
                                                    <button 
                                                        class="btn btn-danger btn-sm" 
                                                        data-toggle="modal"
                                                        data-target="#Deletecontributor-{{$user->id}}">
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
  <div class="modal" id="Addcontributor">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New user</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" action="{{url('contributor_add')}}" method="POST">
                @csrf
       <div class="form-group">
            <label>Donatur Name</label>
            <input class="form-control" 
            name="name_contributor" placeholder="Insert your name">
        </div>

        <div class="form-group">
          <label>Email</label>
          <input class="form-control" 
          name="email" placeholder="Insert your email">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input class="form-control" 
        name="password" type="password" placeholder="Insert your Password">
    </div>
    
         <div class="form-group">
            <label>Phone Number</label>
            <input class="form-control" 
            name="phone_number" placeholder="Phone Of User">
        </div>

         <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" 
            name="address" placeholder="Address Of User">
                
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
   <div class="modal" id="Editcontributor-{{$vd->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit user</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" action="{{url('contributor_update/'.$vd->id)}}" method="POST">
                @csrf
      
         <div class="form-group">
            <label>Donatur Name</label>
            <input class="form-control" value="{{$vd->name_contributor}}"
            name="name_contributor" placeholder="Insert Donatur Name">
        </div>

        <div class="form-group">
          <label>Email</label>
          <input class="form-control" value="{{$vd->user->email}}"
          name="email" placeholder="Insert your email">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input class="form-control" 
        name="password" type="password" placeholder="Insert Your password">
    </div>

        <div class="form-group">
            <label>Phone Number</label>
            <input class="form-control" 
            name="phone_number" placeholder="Insert Your Phone Number" value="{{$vd->phone_contributor}}">
        </div>

         <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" 
            name="address" placeholder="Insert your address">
                {{$vd->address_contributor}}
            </textarea>

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

     <div class="modal" id="Deletecontributor-{{$vd->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete user</h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <h5>Are you sure you want to delete data, if the data is deleted it will also delete data related to this data! this action cannot be canceled</h5>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <a href="{{url('contributor_delete/'.$vd->id)}}" class="btn btn-info">Yes</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
   @endforeach
@endsection
