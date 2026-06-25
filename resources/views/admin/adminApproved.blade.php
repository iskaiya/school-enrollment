@extends('common.main')
@section ('title', 'Approved Status')
@section('content')


<div class="container">
    <h1 class="title-page">Approved ({{$students->count()}})</h1>
        <div class="card text-center">
        <div class="card-header d-flex justify-content-end align-items-center card-header-summary">
                    <form method = "GET" action = "{{route('admin.approvedPage')}}" class="search d-flex" id="searchBar">
                        <div class="input-group">
                            <input class="form-control searchbar" type="search" placeholder="Search" aria-label="Search" name = "param" value="{{ request('param') }}" id="search">
                            <button class="btn" type="submit">
                                    <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
        </div>
        <div class="card-body">
            <div class="scroll-wrapper">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-start">Student No.</th>
                    <th scope="col" class="text-start">Name</th>
                    <th scope="col" class="text-start">Program</th>
                    <th scope="col" class="text-start">Year</th>
                    <th scope="col" class="text-start">Units</th>
                    <th scope="col" class="text-start"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td class="text-start">{{$student ->student_id}}</td>
                        <td class="text-start">{{$student ->name}}</td>
                        <td class="text-start">{{$student ->program}}</td>
                        <td class="text-start">{{$student ->year}}</td>
                        <td class="text-start">{{$student ->units}}</td>
                        <td>
                            <button type="button" class="icon-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $student->user_id}}">
                                <i class="bi bi-pencil-fill text-danger"></i>
                            </button>


                            <button type="button" class="icon-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop2{{ $student->user_id}}">
                                <i class="bi bi-file-text-fill" style="color: #5d90ff;"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>

@foreach($students as $student)
    <div class="modal fade" id="staticBackdrop{{$student->user_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.statusUpdate', $student->user_id)}}" method="POST">
                @csrf
                @method('PUT')
        <div class="modal-header align-items-start ">
            <div class="text-start">
                <h5 class="modal-title ">{{$student->name}}</h5>
                <p class="text-muted mb-0">Current status: {{$student->status}}</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-start">
            <p class="mb3">Update status to:</p>
            @if ($student->status !== 'pending')
                <div class="form-check">
                    <input class = "form-check-input" type="radio" name="status" id="pending{{$student->user_id}}" value="pending">
                    <label class="form-check-label" for="pending{{$student->user_id}}">Pending</label>
                </div>
            @endif

            @if ($student->status !== 'approved')
                <div class="form-check">
                    <input class = "form-check-input" type="radio" name="status" id="approved{{$student->user_id}}" value="approved">
                    <label class="form-check-label" for="approved{{$student->user_id}}">Approved</label>
                </div>
            @endif

        
            @if ($student->status !== 'rejected')
                <div class="form-check">
                    <input class = "form-check-input" type="radio" name="status" id="rejected{{$student->user_id}}" value="rejected">
                    <label class="form-check-label" for="rejected{{$student->user_id}}">Rejected</label>
                </div>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <div class="modal fade" id="staticBackdrop2{{$student->user_id}}"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header align-items-start">
            <div class="text-start">
                <h5 class="modal-title">{{$student->name}}</h5>
                    <p class="text-muted mb-0">{{$student->student_id}}</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-start">
            <p class="text-muted mb-0">Enrollment Summary</p>
            <p class="mb-1"><span class="fw-bold">Program: </span>{{$student->program}}</p>
            <p class="mb-1"><span class="fw-bold">Year: </span>{{$student->year}}</p>
            <p class="mb-1"><span class="fw-bold">Units: </span>{{$student->units}}</p>
            <p class="mb-1"><span class="fw-bold">Status: </span>{{$student->status}}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-close2" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
@endforeach

<style>
    .container{
        padding: 20px;
    }
    .title-page{
        color:#007dc4;
        font-weight: 900;
    }
    .search{
        max-width: 250px;
    }
    .search .input-group{
        border: 1px solid #c3c3c376;
        border-radius: 8px;
        background-color: #F8FAFC;
        overflow: hidden;
    }
    .card-header-summary{
        background-color: #007dc4;
        opacity: 0.5;
    }
    .input-group input{
        border: none;
    }
    .card{
        box-shadow: 5px 10px 15px rgba(138, 189, 255, 0.16);
        border: none;
    }
    .scroll-wrapper{
        max-height: 260px;
        overflow-y: auto;
        display: block;
    }

    .scroll-wrapper table{
        width: 100%;
    }

    .scroll-wrapper thead{
        position: sticky;
        top: 0;
        background:#fff;
        z-index: 1;
    }

    .icon-button{
        background: none;
        border: none;
        padding: 4px 8px;
    }

    .icon-button:hover{
        background-color: rgba(0,0,0,0.03);
        border-radius: 5px;
    }
    .btn-close2{
        background-color: #007dc4;
        color: whitesmoke;
        border:none;
        padding: 10px 15px;
        border-radius: 10px 5px;
    }


</style>
    <script>
        document.getElementById('search').addEventListener('input', function(){
            if(this.value === ''){
                document.getElementById('searchBar').submit();
            }
        });
    </script>
@endsection