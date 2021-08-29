<div>
    @section('title', 'Leather Shop BD - Category')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category List</h3>
                    <button class="btn btn-sm btn-primary float-right" wire:click.prevent="addCat()"><i
                            class="fas fa-plus-square"></i> Add
                        Category</button>
                    {{-- Modal --}}
                    <div class="modal fade" id="category" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        {{ $editModalShow == true ? 'Edit Category' : 'Add Category' }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form id="form"
                                    wire:submit.prevent="{{ $editModalShow == true ? 'updateCat' : 'storeCat' }}">
                                    <div class="modal-body">
                                        <label for="name">Category Name</label>
                                        <input type="text" id="name" wire:model.defer="state.name"
                                            class="form-control @error('name') is-invalid @enderror" />
                                        @error('name')
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
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td><i class="far fa-edit" wire:click.prevent="editCat({{ $category->id }})"></i>
                                        |
                                        <i class="fas fa-trash-alt"
                                            wire:click.prevent="confirmCatRemoval({{ $category->id }})"></i>
                                    </td>
                                </tr>
                            @endforeach
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
                                        <form id="form" wire:submit.prevent="deleteCat">
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

                    {{ $categories->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
</div>
