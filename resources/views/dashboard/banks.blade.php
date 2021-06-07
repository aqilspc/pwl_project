@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">bank</li>
            </ol>
        </div><!--/.row-->
       
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List bank</h1>
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
                         <p align="left"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Addbank">
                          Add bank
                        </button></p>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                            <table class="table table-striped b-t b-b" id="tableok">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th >Name</th>
                                        <th >Nomor Rekening</th>
                                        <th >Atas Nama</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data as $item)
                                    <tr>
                                      <td>{{$no}}</td>
                                      <td>{{$item->name_bank}}</td>
                                      <td>{{$item->no_rek}}</td>
                                      <td>{{$item->an}}</td>
                                      <td>
                                        <button 
                                        class="btn btn-info btn-sm" 
                                        data-toggle="modal" 
                                        data-target="#Editbank-{{$item->id}}">
                                    Edit
                                    </button>
                                    <button 
                                        class="btn btn-danger btn-sm" 
                                        data-toggle="modal"
                                        data-target="#Deletebank-{{$item->id}}">
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
  <div class="modal" id="Addbank">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New bank</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" action="{{url('bank_add')}}" method="POST">
                @csrf
        <div class="form-group">
            <label>bank Name</label>
            <input class="form-control" name="name_bank" placeholder="bank Name">
        </div>
        <div class="form-group">
          <label>Nomor Rekening</label>
          <input class="form-control" name="no_rek" placeholder="Masukan Nomer Rekening">
      </div>
      <div class="form-group">
        <label>Atas Nama</label>
        <input class="form-control" name="an" placeholder="Masukan nama anda">
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
  <div class="modal" id="Editbank-{{$data->id}}">
   <div class="modal-dialog">
     <div class="modal-content">
     
       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">Edit bank</h4>
       </div>
       
       <!-- Modal body -->
       <div class="modal-body">
           <form role="form" action="{{url('bank_update/'.$data->id)}}" method="POST">
               @csrf
       <div class="form-group">
           <label>bank Name</label>
           <input class="form-control" value="{{$data->name_bank}}"
           name="name_bank" placeholder="bank Name">
       </div>
       <div class="form-group">
        <label>Nomer Rekening</label>
        <input class="form-control" value="{{$data->no_rek}}"
        name="no_rek" placeholder="Masukan No Rekening Baru">
    </div>
    <div class="form-group">
      <label>Atas Nama</label>
      <input class="form-control" value="{{$data->an}}"
      name="an" placeholder="bank Name" readonly>
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
  
    <div class="modal" id="Deletebank-{{$data->id}}">
   <div class="modal-dialog">
     <div class="modal-content">
     
       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">Delete bank</h4>
         
       </div>
       
       <!-- Modal body -->
       <div class="modal-body">
          <h5>Are you sure you want to delete data, if the data is deleted it will also delete data related to this data! this action cannot be canceled</h5>
       </div>
       
       <!-- Modal footer -->
       <div class="modal-footer">
        <a href="{{url('bank_delete/'.$data->id)}}" class="btn btn-info">Yes</a>
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
  </div>
  @endforeach
 
@endsection
