@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'requisitions'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Requisitions</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Requisite Asset
                        </button>
                    </div>
                    
                    <div class="card-body">
                        <div class="">
                            <table class="table hover" id="table">
                                <thead class="text-sm text-primary text-center">
                                    <th>
                                        Photo
                                    </th>
                                    <th>
                                        Asset
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Supplier
                                    </th>
                                    <th>
                                        Warehouse
                                    </th>
                                    <th>
                                        Transportation
                                    </th>
                                    <th>
                                        Date Approved
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </thead>
                                
                                <tbody class="text-center">
                                    @isset($data->restock)
                                        @foreach ($data->restock as $entity)
                                        <tr>
                                            <td>
                                                <img src="{{ URL::asset('storage/'.$entity->asset_photo) }}" width="150" alt="" class="">
                                            </td>
                                            <td>
                                                {{ $entity->asset }}
                                            </td>
                                            <td>
                                                {{ $entity->quantity }}
                                            </td>
                                            <td>
                                                {{ $entity->status }}
                                            </td>
                                            <td>
                                                {{ $entity->supplier }}
                                            </td>
                                            <td>
                                                {{ $entity->warehouse }}
                                            </td>
                                            <td>
                                                {{ $entity->transportation }}
                                            </td>
                                            <td>
                                                {{ $entity->date_approved }}
                                            </td>
                                            <td>
                                                <div class="row d-flex justify-content-center">
                                                    <button class="btn btn-warning btn-fab btn-icon btn-sm btn-round" data-toggle="modal" data-target="#editModal{{$entity->asset_id}}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    {{-- <div class="px-2"></div>
                                                    <button class="btn btn-danger btn-fab btn-icon btn-sm btn-round" data-toggle="modal" data-target="#deleteModal{{$entity->id}}">
                                                        <i class="fa fa-trash"></i>
                                                    </button> --}}
                                                </div>
                                                
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade " id="editModal{{$entity->asset_id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <form method="POST" action="{{ URL::route('restock.update', $entity->restock_request_id) }}" enctype="multipart/form-data">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Update Status</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf @method('PUT')

                                                        <input type="text" class="form-control" name="asset_item_id" value="{{ $entity->asset_item_id }}">  
                                                        <input type="text" class="form-control" name="number_of_stocks" value="{{ $entity->quantity }}">  
                                                          
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <select class="form-control" name="status">
                                                                @isset($data)
                                                                    <option value="" selected="selected" ></option>
                                                                    <option value="Pending">Pending</option>
                                                                    <option value="Approved">Approved</option>
                                                                    <option value="Shipped">Shipped</option>
                                                                    <option value=">Dropped Off">Dropped Off</option>
                                                                    <option value="Recieved">Recieved</option>
                                                                    <option value="Closed">Closed</option>
                                                                @endisset
                                                            </select>
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
                                        {{-- <div class="modal fade" id="deleteModal{{$entity->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                                        </div> --}}
                                        
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
    <form method="POST" action="{{ URL::route('restock.create') }}">
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
                    <label class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="quantity" required> 
                </div>
                <div class="mb-3">
                    <label class="form-label">Asset</label>
                    <select class="form-control" name="asset_id">
                        @isset($data)
                            @foreach ($data->assets as $entity)
                                <option value="{{ $entity->id }}">{{ $entity->name }}</option>
                            @endforeach
                        @endisset
                    </select>
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
                    <label class="form-label">Transportation</label>
                    <select class="form-control" name="transportation_id">
                        @isset($data)
                            @foreach ($data->transportations as $entity)
                                <option value="{{ $entity->id }}">{{ $entity->plate_number }}</option>
                            @endforeach
                        @endisset
                    </select>
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