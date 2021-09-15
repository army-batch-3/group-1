@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'users'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add New User
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <table class="table table-striped" id="table">
                                <thead class=" text-primary">
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th class="text-center">
                                        Actions
                                    </th>
                                </thead>
                                
                                <tbody>
                                    @isset($data)
                                        @foreach ($data as $entity)
                                        <tr>
                                            <td>
                                                {{ $entity->name }}
                                            </td>
                                            <td>
                                                {{ $entity->email }}
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
                                            <form method="POST" action="{{ URL::route('test') }}">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="mb-3">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{ $entity->name }}" required> 
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" class="form-control" name="email" value="{{ $entity->email }}" required> 
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
                                            <form method="POST" action="{{ URL::route('test') }}">
                                                <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
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
        <form method="POST" action="{{ URL::route('test') }}">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
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
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required> 
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

@push('scripts')
    <script>
        function SelectText(element) {
            var doc = document,
                text = element,
                range, selection;
            if (doc.body.createTextRange) {
                range = document.body.createTextRange();
                range.moveToElementText(text);
                range.select();
            } else if (window.getSelection) {
                selection = window.getSelection();
                range = document.createRange();
                range.selectNodeContents(text);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        }
        window.onload = function () {
            var iconsWrapper = document.getElementById('icons-wrapper'),
                listItems = iconsWrapper.getElementsByTagName('li');
            for (var i = 0; i < listItems.length; i++) {
                listItems[i].onclick = function fun(event) {
                    var selectedTagName = event.target.tagName.toLowerCase();
                    if (selectedTagName == 'p' || selectedTagName == 'em') {
                        SelectText(event.target);
                    } else if (selectedTagName == 'input') {
                        event.target.setSelectionRange(0, event.target.value.length);
                    }
                }

                var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
                    beforeContent = beforeContentChar.charCodeAt(0).toString(16);
                var beforeContentElement = document.createElement("em");
                beforeContentElement.textContent = "\\" + beforeContent;
                listItems[i].appendChild(beforeContentElement);

                //create input element to copy/paste chart
                var charCharac = document.createElement('input');
                charCharac.setAttribute('type', 'text');
                charCharac.setAttribute('maxlength', '1');
                charCharac.setAttribute('readonly', 'true');
                charCharac.setAttribute('value', beforeContentChar);
                listItems[i].appendChild(charCharac);
            }
        }
    </script>
@endpush