<div>
    @section('title', 'Leather Shop BD - Slider')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Slider</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product Slider</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Slider List</h3>
                    <button class="btn btn-sm btn-primary float-right" wire:click.prevent="addSlider()"><i
                            class="fas fa-plus-square"></i> Add
                        Slider</button>
                    {{-- Modal --}}
                    <div class="modal fade" id="slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        {{ $editModalShow == true ? 'Edit Slider' : 'Add Slider' }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form id="form"
                                    wire:submit.prevent="{{ $editModalShow == true ? 'updateSlider' : 'storeSlider' }}"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <label for="category">Category Name</label>
                                        <input type="text" id="category" wire:model.defer="state.category"
                                            class="form-control @error('category') is-invalid @enderror" />
                                        @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="modal-body">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" wire:model.defer="state.name"
                                            class="form-control @error('name') is-invalid @enderror" />
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="modal-body">
                                        <label for="offers">Offer</label>
                                        <input type="text" id="offers" wire:model.defer="state.offers"
                                            class="form-control @error('offers') is-invalid @enderror" />
                                        @error('offers')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="modal-body">
                                        <label for="image">Image</label>
                                        <input type="file" id="image"
                                            wire:model.defer="{{ $editModalShow == true ? 'newImage' : 'state.image' }}"
                                            class="form-control @error('image') is-invalid @enderror" />
                                        @if ($editModalShow == true)
                                            @if ($newImage)
                                                <img src="{{ $newImage->temporaryUrl() }}" alt="" width="50px">
                                            @else
                                                <img src="{{ asset('images/slider/' . $state['image']) }}"
                                                    width="50px" alt="">
                                            @endif
                                        @else
                                            @if ($state['image'])
                                                <img src="{{ $state['image']->temporaryUrl() }}" alt="" width="50px">
                                            @endif
                                        @endif
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                <th>Category</th>
                                <th>Name</th>
                                <th>Offers</th>
                                <th>Image</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($sliders))
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $slider->category }}</td>
                                        <td>{{ $slider->name }}</td>
                                        <td>{{ $slider->offers }}</td>
                                        <td><img src="{{ asset('images/slider/' . $slider->image) }}" alt=""
                                                width="50px">
                                        </td>
                                        <td><i class="far fa-edit"
                                                wire:click.prevent="editSlider({{ $slider->id }})"></i>
                                            |
                                            <i class="fas fa-trash-alt"
                                                wire:click.prevent="confirmSliderRemoval({{ $slider->id }})"></i>
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
                                        <form id="form" wire:submit.prevent="deleteSlider">
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
                <div class="card-footer clearfix">

                    {{-- {{ $categories->links() }} --}}
                </div>
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
</div>
