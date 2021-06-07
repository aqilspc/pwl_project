@foreach($vendors as $vd)
<div class="modal" id="EditVendor-{{$vd->id}}">
 <div class="modal-dialog">
   <div class="modal-content">
   
     <!-- Modal Header -->
     <div class="modal-header">
       <h4 class="modal-title">Edit Vendor</h4>
     </div>
     
     <!-- Modal body -->
     <div class="modal-body">
         <form role="form" action="{{url('vendor_update/'.$vd->id)}}" method="POST">
             @csrf
     <div class="form-group">
         <label>Vendor Name</label>
         <input class="form-control" value="{{$vd->name_vendor}}"
         name="name_vendor" placeholder="Vendor Name">
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

  <div class="modal" id="DeleteVendor-{{$vd->id}}">
 <div class="modal-dialog">
   <div class="modal-content">
   
     <!-- Modal Header -->
     <div class="modal-header">
       <h4 class="modal-title">Delete Vendor</h4>
       
     </div>
     
     <!-- Modal body -->
     <div class="modal-body">
        <h5>Are you sure you want to delete data, if the data is deleted it will also delete data related to this data! this action cannot be canceled</h5>
     </div>
     
     <!-- Modal footer -->
     <div class="modal-footer">
      <a href="{{url('vendor_delete/'.$vd->id)}}" class="btn btn-info">Yes</a>
       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     </div>
   </div>
 </div>
</div>
@endforeach