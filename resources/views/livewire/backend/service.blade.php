<div>
    @section('title', 'Leather Shop BD - Service')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Service</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Service</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Service List</h3>
                    <button class="btn btn-sm btn-primary float-right" wire:click.prevent="addService()"><i
                            class="fas fa-plus-square"></i> Add
                        Service</button>
                    {{-- Modal --}}
                    <div class="modal fade" id="service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        {{ $editModalShow == true ? 'Edit Service' : 'Add Service' }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form id=""
                                    wire:submit.prevent="{{ $editModalShow == true ? 'updateService' : 'storeService' }}"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" id="image"
                                                wire:model.defer="{{ $editModalShow == true ? 'newImage' : 'state.image' }}"
                                                class="form-control @error('image') is-invalid @enderror" />
                                            @if ($editModalShow == true)
                                                @if ($newImage)
                                                    <img src="{{ $newImage->temporaryUrl() }}" alt="" width="50px">
                                                @else
                                                    <img src="{{ asset('images/service/' . $state['image']) }}"
                                                        width="50px" alt="">
                                                @endif
                                            @else
                                                @if ($state['image'])
                                                    <img src="{{ $state['image']->temporaryUrl() }}" alt=""
                                                        width="50px">
                                                @endif
                                            @endif
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="alt">Image Alt</label>
                                            <input type="text" id="alt" wire:model.defer="state.alt"
                                                class="form-control @error('alt') is-invalid @enderror" />
                                            @error('alt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary"
                                            value="{{ $editModalShow == true ? 'Save Changes' : 'Save' }}">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Modal End --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Alt</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($services))
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('images/service/' . $service->image) }}" alt=""
                                                width="50px">
                                        </td>
                                        <td>{{ $service->alt }}</td>
                                        <td><i class="far fa-edit"
                                                wire:click.prevent="editService({{ $service->id }})"></i>
                                            |
                                            <i class="fas fa-trash-alt"
                                                wire:click.prevent="confirmServiceRemoval({{ $service->id }})"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <p>No Slider Available</p>
                            @endif
                            {{-- Delete Modal --}}
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                aria-labelledby="deleteModal" aria-hidden="true" wire:ignore.self>
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModal">Delete Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form id="form" wire:submit.prevent="deleteService">
                                            <div class="modal-body">
                                                Are you sure to delete this category ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Delete Modal End --}}
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
</div>
