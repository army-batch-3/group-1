@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'warehouse'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Warehouse</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Warehouse
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <table class="table hover compact table-responsive" id="table">
                                <thead class="text-sm text-primary">
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Floor
                                    </th>
                                    <th>
                                        Building
                                    </th>
                                    <th>
                                        Room
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        Section
                                    </th>
                                    <th>
                                        Contact Number
                                    </th>
                                    <th class="text-center">
                                        Actions
                                    </th>
                                </thead>
                                
                                <tbody>
                                    @isset($data)
                                        @foreach ($data as $entity)
                                        <tr class="text-center">
                                            <td>
                                                {{ $entity->name }}
                                            </td>
                                            <td>
                                                {{ $entity->floor }}
                                            </td>
                                            <td>
                                                {{ $entity->bldg }}
                                            </td>
                                            <td>
                                                {{ $entity->room }}
                                            </td>
                                            <td>
                                                {{ $entity->address }}
                                            </td>
                                            <td>
                                                {{ $entity->section }}
                                            </td>
                                            <td>
                                                {{ $entity->contact_number }}
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
                                            <form method="POST" action="{{ URL::route('warehouse.update', $entity->id) }}">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Warehouse</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf @method('PUT')
                                                        <div class="mb-3">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="name" value="{{ $entity->name }}" required> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Floor</label>
                                                            <input type="text" class="form-control" name="floor" value="{{ $entity->floor }}"> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Building</label>
                                                            <input type="number" class="form-control" name="bldg" value="{{ $entity->bldg }}"> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Room</label>
                                                            <input type="text" class="form-control" name="room" value="{{ $entity->room }}"> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Address</label>
                                                            <input type="text" class="form-control" name="address" value="{{ $entity->address }}"> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Section</label>
                                                            <input type="text" class="form-control" name="section" value="{{ $entity->section }}"> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Contact Number</label>
                                                            <input type="text" class="form-control" name="contact_number" value="{{ $entity->contact_number }}"> 
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
                                            <form method="POST" action="{{ URL::route('warehouse.delete', $entity->id) }}">
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
        <form method="POST" action="{{ URL::route('warehouse.create') }}">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Warehouse Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Floor</label>
                        <input type="text" class="form-control" name="floor" > 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Building</label>
                        <input type="text" class="form-control" name="bldg" > 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Room</label>
                        <input type="text" class="form-control" name="room" > 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" > 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Section</label>
                        <input type="text" class="form-control" name="section" > 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contact Number</label>
                        <input type="text" class="form-control" name="contact_number" > 
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