<!DOCTYPE html>
<html>
<head>
  <title>Transaction Report Data</title>
</head>
<body>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #269abc;
  color: white;
}
</style>
  <center>
    <h5>Report Data Lease date : {{$start}}  -  {{$end}}</h4>
    </center>
    <table id="customers" class='table table-bordered' style="width: 100%">
      <thead>
        <tr>
        <th >No</th>
                                        <th>Donation Name</th>
                                        <th>Contributor Name</th>
                                        <th>Date Donation</th>
                                        <th>Total Donate</th>
                                       
        </tr>
      </thead>
      <tbody>
          @php $no = 1; @endphp
          @php $total = 0; @endphp
                                @foreach($data as $data)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$data->donation->name_donation}}</td>
                                    <td>{{$data->contributor->name_contributor}}</td>
                                    <td>{{$data->date}}</td>
                                    <td>{{number_format($data->total_item)}}</td>
                                </tr>
                                @php $no++; @endphp
                                @php $total += $data->total_item @endphp
                                 @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="5" style="text-align: right">
           Total : {{number_format($total)}}
          </td>
        </tr>
      </tfoot>
      </table>
      <p align="left"> Data From {{url('/')}}</p>
      <p align="left"> Generate at {{$now}}</p>
    </body>
    </html>