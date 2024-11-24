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
       <div class="container">
    
         <div class="bg-dark text-center py-2">
            <h3 class="text-white ">Update Your Data</h3>
         </div>
        
        <br>
        <a
            name=""
            id=""
            class="btn btn-dark"
            href="{{route('stulist')}}"
            role="button"
            >Go Back To Student List</a
        >
        <br>
        <form action="{{ route('updatestu', $student->id) }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input
                type="text"
                value="{{$student->name}}"
                class="@error('name') is-invalid @enderror form-control"
                name="name"
                id=""
            
                placeholder=""
            />
           @error('name')
               <p class="invalid-feedback">{{$message}}</p>
           @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input
               value="{{$student->email}}"
                type="email"
                class="@error('email') is-invalid @enderror form-control"
                name="email"
                id=""
                aria-describedby="emailHelpId"
            
            />
            @error('email')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input
               value="{{$student->password}}"
                type="password"
                class="@error('password') is-invalid @enderror form-control"
                name="password"
                id=""
                placeholder=""
            />
            @error('password')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Contact number</label>
            <input
               value="{{$student->contact}}"
                type="text"
                class="@error('contact') is-invalid @enderror form-control"
                name="contact"
                id=""
                placeholder=""
            />
            @error('contact')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
        </div>
        
        <div class="form-check">
            <input class="@error('gen') is-invalid @enderror form-check-input" type="radio" name="gen"  value="Male" @if ($student->gender === 'Male') checked @endif id="" />
            <label class="form-check-label" for="">Male</label>
            @error('gen')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
        </div>
        <div class="form-check">
       
            <input class="@error('gen') is-invalid @enderror form-check-input" type="radio" name="gen" value="Female" @if ($student->gender === 'Female') checked @endif id="" />
            <label class="form-check-label" for="">Female</label>
            @error('gen')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
        </div>
        @if ($student->image != '')

        <img src="{{ asset('uploads/stuimages/' . $student->image) }}" alt="Image" style="max-width: 100px; max-height: 100px;" class="rounded-circle">
        @endif
        

        <div class="mb-3">
            <label for="" class="form-label">Choose file</label>
            <input
                type="file"
                class="@error('image') is-invalid @enderror form-control"
                name="image"
                id=""
                placeholder=""
              
            />
            @error('image')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
        </div>
        <button
            type="submit" 
            class="btn btn-dark "
        >
         Update 
        </button>
        
        </form>

       </div>

        <!-- Bootstrap JavaScript Libraries -->
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
