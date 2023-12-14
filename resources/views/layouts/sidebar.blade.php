<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="/">Navbar</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ml-auto">
                            @foreach ($auth as $value)
                            @if (!empty($value->blade_file_name == "user.blade.php"))
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('add-role')}}">Add User <span class="sr-only">(current)</span></a>
                            </li>
                            @endif

                            @if (!empty($value->blade_file_name == "add-permission.blade.php"))
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('add-permission')}}"> Permission</span></a>
                            </li>
                            @endif
                            @if (!empty($value->blade_file_name == "assign-role.blade.php"))
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('assign-role')}}"> Role</span></a>
                            </li>
                            @endif

                            @endforeach
                        </ul>

                    </div>

                    <a href="{{url('logout')}}" class="btn btn-outline-success my-2 my-sm-0"  >Logout</a>
                </nav>
            </div>
        </div>
    </div>
</section>


{{-- @foreach ($auth as $value)


@if (empty($value->blade_file_name == "user.blade.php"))

@else
   <h6>{{$value->blade_file_name}}</h6>
@endif

@if (empty($value->blade_file_name == "add-permission.blade.php"))

@else
   <h6>{{$value->blade_file_name}}</h6>
@endif

@if (empty($value->blade_file_name == "assign-role.blade.php"))

@else
   <h6>{{$value->blade_file_name}}</h6>
@endif



@endforeach --}}
