@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'employees'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Employees</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Employee
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <table class="table hover compact text-center" id="table">
                                <thead class="text-sm text-primary">
                                    <th>
                                        Photo
                                    </th>
                                    <th>
                                        First Name
                                    </th>
                                    <th>
                                        Last Name
                                    </th>
                                    <th>
                                        Middle Name
                                    </th>
                                    <th>
                                        Employee Type
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </thead>
                                
                                <tbody>
                                    @isset($data)
                                        @foreach ($data as $entity)
                                        <tr>
                                            <td>
                                                <p class="text-center">
                                                    <img src="{{ URL::asset('storage/'.$entity->photo) }}"  width="60" alt="" class="">
                                                </p>
                                            </td>
                                            <td>
                                                {{ $entity->first_name }}
                                            </td>
                                            <td>
                                                {{ $entity->last_name }}
                                            </td>
                                            <td>
                                                {{ $entity->middle_name }}
                                            </td>
                                            <td>
                                                {{ $entity->employee_type }}
                                            </td>
                                            <td>
                                                <div class="row d-flex justify-content-center">
                                                    <button class="btn btn-warning btn-fab btn-icon btn-sm btn-round" data-toggle="modal" data-target="#editModal{{$entity->id}}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <div class="px-2"></div>
                                                    <button class="btn btn-danger btn-fab btn-icon btn-sm btn-round" data-toggle="modal" data-target="#deleteModal{{$entity->id}}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                                
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade " id="editModal{{$entity->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <form method="POST" action="{{ URL::route('employee.update', $entity->id) }}" enctype="multipart/form-data">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf @method('PUT')
                                                        <div class="mb-3">
                                                            <label class="form-label">Photo</label>
                                                            <input type="file" class="form-control" name="photo"> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">First Name</label>
                                                            <input type="text" class="form-control" name="first_name" value="{{ $entity->first_name }}" required> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Last Name</label>
                                                            <input type="text" class="form-control" name="last_name" value="{{ $entity->last_name }}" required> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Middle Name</label>
                                                            <input type="text" class="form-control" name="middle_name" value="{{ $entity->middle_name }}" required> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Employee Type</label>
                                                            <input type="text" class="form-control" name="employee_type" value="{{ $entity->employee_type }}"> 
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="left-side">
                                                            <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Close</button>
                                                        </div>
                                                        <div class="divider"></div>
                                                        <div class="right-side">
                                                            <button type="submit" class="btn btn-warning btn-link">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{$entity->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <form method="POST" action="{{ URL::route('employee.delete', $entity->id) }}">
                                                <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf @method('DELETE')
                                                        <div class="col">
                                                            <p>Are you sure you want to delete this User?</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="left-side">
                                                            <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                        <div class="divider"></div>
                                                        <div class="right-side">
                                                            <button type="submit" class="btn btn-danger btn-link">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                        
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="{{ URL::route('employee.create') }}" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Photo</label>
                        <input type="file" class="form-control" name="photo"> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" required> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" required> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" required> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee Type</label>
                        <input type="text" class="form-control" name="employee_type"> 
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="left-side">
                        <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Close</button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <button type="submit" class="btn btn-primary btn-link">Submit</button>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </div>

@endsection