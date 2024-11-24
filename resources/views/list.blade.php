<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>

<div class="container text-center">
    @if (Session::has('success'))
    
    <div class="alert alert-success " role="alert">
        {{Session::get('success')}}
         </div>

 @endif

 <br>
    <a
    name=""
    id=""
    class="btn btn-dark mt-3"
    href="{{route('product')}}"
    role="button"
    >Add Student</a
 >
 <br>
 <br> 
 <br>
    <div class="bg-dark text-center py-2">
        <h3 class="text-white ">List</h3>
     </div>



     <div
        class="table-responsive "
     >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>



                </tr>
            </thead>
            <tbody>
                @foreach ($student as $data)
                <tr class="">
                 <td>{{$data->id}}</td>
                 <td>{{$data->name}}</td>
                 <td>{{$data->email}}</td>
                 <td>{{$data->contact}}</td>
                 <td>{{$data->gender}}</td>
                 <td>
                    <img src="{{ asset('uploads/stuimages/' . $data->image) }}" alt="Image" style="max-width: 100px; max-height: 100px;" class="rounded-circle">
                </td>

                   <td>
                    <a class="btn btn-dark" href="{{url('edit/'.$data->id)}}">Update</a>
                    <a class="btn btn-danger" href="{{url('deletedata/'.$data->id)}}">Delete</a>
                

                   </td>
                </tr>   
                @endforeach
               
              
            </tbody>
        </table>
     </div>
     





</div>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
