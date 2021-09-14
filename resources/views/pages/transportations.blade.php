@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'transportations'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Transportations</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Vehicle
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <table class="table hover table-striped text-center" id="table">
                                <thead class=" text-primary">
                                    <th>
                                        Type
                                    </th>
                                    <th>
                                        Vehicle
                                    </th>
                                    <th>
                                        Plate No.
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </thead>
                                
                                <tbody>
                                    @isset($data)
                                        @foreach ($data->transportations as $entity)
                                        <tr>
                                            <td>
                                                {{ $entity->type }}
                                            </td>
                                            <td>
                                                {{ $entity->vehicle }}
                                            </td>
                                            <td>
                                                {{ $entity->plate_number }}
                                            </td>
                                            <td>
                                                <div class="row d-flex justify-content-center">
                                                    <button class="btn btn-warning btn-fab btn-icon btn-sm btn-round" data-toggle="modal" data-target="#editModal{{$entity->id}}" >
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
                                            <form method="POST" action="{{ URL::route('transpo.update', $entity->id) }}">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Vehicle</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf @method('PUT')
                                                        <div class="mb-3">
                                                        <label class="form-label">Type</label>
                                                        <input type="text" class="form-control" name="type" value="{{ $entity->type }}" required> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Vehicle</label>
                                                            <select class="form-control" name="vehicle_id">
                                                                @isset($data)
                                                                    @foreach ($data->vehicles as $element)
                                                                        <option value="{{ $element->id }}" @if($element->id == $entity->vehicle_id) selected="selected" @endif  >{{ $element->brand }}</option>
                                                                    @endforeach
                                                                @endisset
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Plate Number</label>
                                                            <input type="text" class="form-control" name="plate_number" value="{{ $entity->plate_number }}" required> 
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
                                            <form method="POST" action="{{ URL::route('transpo.delete', $entity->id) }}">
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
        <form method="POST" action="{{ URL::route('transpo.create') }}">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vehicle Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input type="text" class="form-control" name="type" required> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Vehicle</label>
                        <select class="form-control" name="vehicle_id">
                            @isset($data)
                                @foreach ($data->vehicles as $entity)
                                    <option value="{{ $entity->id }}">{{ $entity->brand }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Plate Number</label>
                        <input type="text" class="form-control" name="plate_number" required> 
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