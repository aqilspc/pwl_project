@foreach ($data as $item)
    <p> 
      {{$item->id}}
    </p>
    <p> 
      {{$item->name_bank}}
    </p>
    <p> 
      {{$item->no_rek}}
    </p>
    <p> 
      {{$item->an}}
    </p>
@endforeach