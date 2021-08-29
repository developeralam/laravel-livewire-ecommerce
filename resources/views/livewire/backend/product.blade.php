<div>
    @section('title', 'Leather Shop BD - Product')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product List</h3>
                    <button class="btn btn-sm btn-primary float-right" wire:click.prevent="addProduct"><i
                            class="fas fa-plus-square"></i> Add
                        Product</button>
                    {{-- Modal --}}
                    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog" role="document" style="max-width: 600px!important;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        {{ $editModalShow == true ? 'Edit Product' : 'Add Product' }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form
                                    wire:submit.prevent="{{ $editModalShow == true ? 'updateProduct' : 'storeProduct' }}"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Product Name <sup class="text-danger">*</sup></label>
                                            <input type="text" id="name" wire:model.defer="state.name"
                                                class="form-control @error('name') is-invalid @enderror" />
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cat_id">Product Category <sup
                                                    class="text-danger">*</sup></label>
                                            <select wire:model.defer="state.cat_id" id="cat_id"
                                                class="form-control @error('cat_id') is-invalid @enderror">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('cat_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image <sup class="text-danger">*</sup></label>
                                            <input type="file"
                                                wire:model.defer="{{ $editModalShow == true ? 'newImage' : 'state.image' }}"
                                                id="image"
                                                class="form-control-file @error('{{ $editModalShow == true ? newImage : image }}') is-invalid @enderror" />
                                            @error('{{ $editModalShow == true ? newImage : image }}')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            @if ($editModalShow == true)
                                                @if ($newImage)
                                                    <img src="{{ $newImage->temporaryUrl() }}" width="80px"
                                                        class="mt-2 mr-4" alt="{{ $state['name'] }}">

                                                @else
                                                    @if ($state['image'])
                                                        <img src="{{ asset('images/product/' . $state['image']) }}"
                                                            width="80px" class="mt-2" alt="{{ $state['name'] }}">
                                                    @endif
                                                @endif
                                            @else
                                                @if ($state['image'])
                                                    <img src="{{ $state['image']->temporaryUrl() }}" width="80px"
                                                        class="mt-2" alt="">
                                                @endif
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="images">Image Gallery <sup class="text-danger">*</sup></label>
                                            <input type="file" multiple
                                                wire:model.defer="{{ $editModalShow == true ? 'newImages' : 'state.images' }}"
                                                id="images" class="form-control-file" />
                                            @error('{{ $editModalShow == true ? newImages : images }}')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            @if ($editModalShow == true)
                                                @if ($newImages)
                                                    @foreach ($newImages as $image)
                                                        <img src="{{ $image->temporaryUrl() }}" width="80px" alt="">
                                                    @endforeach
                                                @else
                                                    @if ($state['images'])
                                                        @php
                                                            $images = explode(',', $state['images']);
                                                            $images = array_slice($images, 1);
                                                        @endphp
                                                        @foreach ($images as $image)
                                                            <img src="{{ asset('images/product/' . $image) }}"
                                                                width="80px" alt="">
                                                        @endforeach
                                                    @endif
                                                @endif
                                            @else
                                                @if ($state['images'])
                                                    @foreach ($state['images'] as $image)
                                                        <img src="{{ $image->temporaryUrl() }}" width="80px" alt="">
                                                    @endforeach
                                                @endif
                                            @endif
                                        </div>
                                        <div class="form-group" wire:ignore>
                                            <label for="short_description">Short Description</label>
                                            <textarea wire:model.defer="state.short_description" id="short_description"
                                                class="form-control @error('short_description') is-invalid @enderror"></textarea>
                                            @error('short_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group" wire:ignore>
                                            <label for="description">Description<sup class="text-danger">*</sup></label>
                                            <textarea wire:model.defer="state.description" id="description"
                                                class="form-control @error('description') is-invalid @enderror"></textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="regular_price">Regular Price <sup
                                                    class="text-danger">*</sup></label>
                                            <input type="number" id="regular_price"
                                                wire:model.defer="state.regular_price"
                                                class="form-control @error('regular_price') is-invalid @enderror" />
                                            @error('regular_price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="sale_price">Sale Price</label>
                                            <input type="number" id="sale_price" wire:model.defer="state.sale_price"
                                                class="form-control @error('sale_price') is-invalid @enderror" />
                                            @error('sale_price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="stock_status">Stock Status <sup
                                                    class="text-danger">*</sup></label>
                                            <select wire:model.defer="state.stock_status" id="stock_status"
                                                class="form-control @error('stock_status') is-invalid @enderror">
                                                <option value="instock">Instock</option>
                                                <option value="outofstock">Out Of Stock</option>
                                            </select>
                                            @error('stock_status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="featured">Featured <sup class="text-danger">*</sup></label>
                                            <select wire:model.defer="state.featured" id="featured"
                                                class="form-control @error('featured') is-invalid @enderror">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            @error('featured')
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
                                <th>Name</th>
                                <th>Category</th>
                                <th>Regular Price</th>
                                <th>Sale Price</th>
                                <th>Featured</th>
                                <th>Stock</th>
                                <th>Image</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->regular_price }}</td>
                                    <td>{{ $product->sale_price }}</td>
                                    <td>{{ $product->featured == 0 ? 'No' : 'Yes' }}</td>
                                    <td>{{ $product->stock_status }}</td>
                                    <td>
                                        <img src="{{ asset('images/product/' . $product->image) }}" width="50px"
                                            alt="">
                                    </td>
                                    <td><i class="far fa-edit" wire:click.prevent="editPro({{ $product->id }})"></i>
                                        |
                                        <i class="fas fa-trash-alt"
                                            wire:click.prevent="confirmProRemoval({{ $product->id }})"></i>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- Delete Modal --}}
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                aria-labelledby="deleteModal" aria-hidden="true" wire:ignore.self>
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-bold" id="deleteModal">Delete Product
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form wire:submit.prevent="deletePro">
                                            <div class="modal-body">
                                                Are you sure to delete this Product ?
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
                    {{ $products->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
</div>
