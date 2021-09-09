@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'assets'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Assets</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Asset
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <table class="table hover compact table-responsive" id="table">
                                <thead class="text-sm text-primary">
                                    <th>
                                        Photo
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Stocks
                                    </th>
                                    <th>
                                        Type
                                    </th>
                                    <th>
                                        Supplier
                                    </th>
                                    <th>
                                        Warehouse
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th class="text-center">
                                        Actions
                                    </th>
                                </thead>
                                
                                <tbody>
                                    @isset($data)
                                        @foreach ($data->assets as $entity)
                                        <tr class="text-center">
                                            <td>
                                                <img src="{{ URL::asset($entity->photo) }}" alt="" class="img-fluid">
                                            </td>
                                            <td>
                                                {{ $entity->name }}
                                            </td>
                                            <td>
                                                {{ $entity->number_of_stocks }}
                                            </td>
                                            <td>
                                                {{ $entity->type }}
                                            </td>
                                            <td>
                                                {{ $entity->supplier }}
                                            </td>
                                            <td>
                                                {{ $entity->warehouse }}
                                            </td>
                                            <td>
                                                {{ $entity->price }}
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
                                            <form method="POST" action="{{ URL::route('asset.update', $entity->id) }}" enctype="multipart/form-data">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Asset</h5>
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
                                                            <label class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="name" value="{{ $entity->name }}" required> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Number of Stocks</label>
                                                            <input type="text" class="form-control" name="number_of_stocks" value="{{ $entity->number_of_stocks }}"> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Type</label>
                                                            <input type="text" class="form-control" name="type" value="{{ $entity->type }}"> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Supplier</label>
                                                            <select class="form-control" name="supplier_id">
                                                                @isset($data)
                                                                    @foreach ($data->suppliers as $element)
                                                                        <option value="{{ $element->id }}" @if($element->id == $entity->supplier_id) selected="selected" @endif  >{{ $element->name }}</option>
                                                                    @endforeach
                                                                @endisset
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Warehouse</label>
                                                            <select class="form-control" name="warehouse_id">
                                                                @isset($data)
                                                                    @foreach ($data->warehouses as $element)
                                                                        <option value="{{ $element->id }}" @if($element->id == $entity->warehouse_id) selected="selected" @endif  >{{ $element->name }}</option>
                                                                    @endforeach
                                                                @endisset
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Price</label>
                                                            <input type="number" class="form-control" name="price" value="{{ $entity->price }}" required> 
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
                                            <form method="POST" action="{{ URL::route('asset.delete', $entity->id) }}">
                                                <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
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
        <form method="POST" action="{{ URL::route('asset.create') }}" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asset Details</h5>
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
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Number of Stocks</label>
                        <input type="text" class="form-control" name="number_of_stocks" > 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" name="type" > 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Supplier</label>
                        <select class="form-control" name="supplier_id">
                            @isset($data)
                                @foreach ($data->suppliers as $entity)
                                    <option value="{{ $entity->id }}">{{ $entity->name }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Warehouse</label>
                        <select class="form-control" name="warehouse_id">
                            @isset($data)
                                @foreach ($data->warehouses as $entity)
                                    <option value="{{ $entity->id }}">{{ $entity->name }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" required> 
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