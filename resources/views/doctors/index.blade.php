@extends('admin_layouts.admin')
@section('content')

<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>
      
  <a href="{{route('doctors.create')}}"  class="btn btn-success mb-5" style="align-center" >Add New Doctor</a></div>
      <table class="table table-bordered table-hover table-dark" class="mx-auto" style="background-color: 	rgb(52, 57, 64)" id="doctor_table">
        <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Avatar</th>
              <th scope="col">National ID</th>
              <th scope="col">Added On</th>
              <th scope="col">Ban Status</th>
              <th scope="col"></th>
              <th scope="col">Actions</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($doctors as $doctor)
            <tr>
                
            <th scope="row">{{ $doctor->id }}</th>
              <td>{{ $doctor->name }} </td>
              <td>{{$doctor->email}}</td>
              <td><img src="{{asset('uploads/doctors/'.$doctor->image)}}" width="90px" height="90px"></td>
              <td>{{ $doctor->national_id}}</td>
              {{-- <td>{{ $doctor->created_at->format('d-m-y')}}</td>  --}}

              <td>{{ $doctor->ban_flag ? 'Banned': 'Not Banned'}}</td>
              
         
              <td><a href="{{route('doctors.show',['doctor' => $doctor->id])}}" class="btn btn-primary btn-sm" >  <i class="fas fa-folder">
            </i> View</a></td>
              <td><a href="{{route('doctors.edit',['doctor' => $doctor->id])}}" class="btn btn-info btn-sm" > <i class="fas fa-pencil-alt">
            </i> Edit</a></td>
            <td> 
                <form method="POST" action="{{route('doctors.destroy',['doctor' => $doctor->id])}}" >
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this doctor?')"><i class="fas fa-trash-alt">
                    </i> Delete</button>
                </form>
</td>

            @if($doctor->ban_flag)         
            {{-- if ban status true -> unban action --}}
              <td><a href="#" class="btn btn-success btn-sm" >  <i class="fas fa-user-slash">
              </i> UnBan</a></td>           
            @else
            {{-- if ban status false -> ban action --}}
              <td><a href="#" class="btn btn-warning btn-sm" >  <i class="fas fa-user-slash">
              </i> Ban</a></td>    
            @endif

            
            </tr>
          @endforeach
          </tbody>
        </table> 
        {{$doctors->links()}}
  </div>
  @endsection
{{-- <script>
  $(document).ready(function () {

    $("#deleteCompany").click(function(e){

    if(!confirm("Do you really want to do this?")) {
       return false;
     }

    e.preventDefault();
    var id = $(this).data("id");
    // var id = $(this).attr('data-id');
    var token = $("meta[name='csrf-token']").attr("content");
    var url = e.target;

    $.ajax(
        {
          url: url.href, //or you can use url: "company/"+id,
          type: 'DELETE',
          data: {
            _token: token,
                id: id
        },
        success: function (response){

            $("#success").html(response.message)

            Swal.fire(
              'Remind!',
              'Company deleted successfully!',
              'success'
            )
        }
     });
      return false;
   });
    

});
</script> --}}