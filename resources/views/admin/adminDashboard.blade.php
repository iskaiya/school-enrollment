@extends('common.main')
@section('title', 'Admin Dashboard')
@section('content')
    
<div class="container">
    <h1 class="title-page">Dashboard</h1>
    <div class="row mb-5 g-3">
        <div class="col-md-4">
            <div class="card  h-100">
                <h5 class="card-header bg-warning-subtle text-warning">Pending</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{$pending}}</h5>
                    </div>
            </div>       
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <h5 class="card-header bg-success-subtle text-success">Approved</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{$approved}}</h5>
                    </div>
            </div>       
        </div>
        <div class="col-md-4">
            <div class="card  h-100">
                <h5 class="card-header bg-danger-subtle text-danger">Rejected</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{$rejected}}</h5>
                    </div>
            </div>       
        </div>
    </div>

        <div class="card text-center">
        <div class="card-header d-flex justify-content-end align-items-center card-header-summary">
                    <form method = "GET" action = "{{route('admin.dashboard')}}" class="search d-flex" id="searchBar">
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
                <th scope="col">Student No.</th>
                <th scope="col">Name</th>
                <th scope="col">Year</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td >{{$student ->student_id}}</td>
                    <td>{{$student ->name}}</td>
                    <td>{{$student ->year}}</td>
                    <td>
                        @if ($student->status == 'pending')
                        <span class="badge bg-warning-subtle status-text text-warning p-2 ps-2 px-3 "><i class="bi bi-dot text-warning"></i> Pending</span>
                        @elseif ($student->status == 'approved')
                        <span class="badge bg-success-subtle status-text text-success p-2 ps-2 px-3 "><i class="bi bi-dot text-success"></i> Approved</span>
                        @elseif ($student->status == 'rejected')
                        <span class="badge bg-danger-subtle status-text text-danger p-2 ps-2 px-3 "><i class="bi bi-dot text-danger"></i> Rejected</span>
                        @endif

                    </td>
                </tr>
                @endforeach
        </tbody>
        </table>
        </div>
    </div>
    </div>  
</div>
<style>
    .container{
        padding: 20px;
    }
    .title-page{
        color:#007dc4;
        font-weight: 900;
    }
    .card-header{
        font-weight:bold;
    }
    .search{
        max-width: 250px;
    }
    .search .input-group{
        border: 1px solid #c3c3c376;
        border-radius: 8px;
        background-color: #F8FAFC;
    }
    .input-group input{
        border: none;
    }
    .card{
        box-shadow: 5px 10px 15px rgba(138, 189, 255, 0.16);
        border: none;
    }
    .card-header-summary{
        background-color: #007dc4;
        opacity: 0.5;
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

</style>
    <script>
        document.getElementById('search').addEventListener('input', function(){
            if(this.value === ''){
                document.getElementById('searchBar').submit();
            }
        });
    </script>
@endsection