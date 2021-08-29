<div>
    @section('title', 'Leather Shop BD - Coupon')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Coupon</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product Coupon</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Coupon List</h3>
                    <button class="btn btn-sm btn-primary float-right" wire:click.prevent="addCoupon()"><i
                            class="fas fa-plus-square"></i> Add
                        Coupon</button>
                    {{-- Modal --}}
                    <div class="modal fade" id="coupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        {{ $editModalShow == true ? 'Edit Coupon' : 'Add Coupon' }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form id="form"
                                    wire:submit.prevent="{{ $editModalShow == true ? 'updateCoupon' : 'storeCoupon' }}"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="code">Coupon Code</label>
                                            <input type="text" id="code" wire:model.defer="state.code"
                                                class="form-control @error('code') is-invalid @enderror" />
                                            @error('code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Coupon Type</label>
                                            <select id="type" wire:model.defer="state.type"
                                                class="form-control @error('type') is-invalid @enderror">
                                                <option value="fixed">Fixed</option>
                                                <option value="percent">Percent</option>
                                            </select>
                                            @error('type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="value">Coupon Value</label>
                                            <input type="number" id="value" wire:model.defer="state.value"
                                                class="form-control @error('value') is-invalid @enderror" />
                                            @error('value')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cart_value">Cart Value</label>
                                            <input type="number" id="cart_value" wire:model.defer="state.cart_value"
                                                class="form-control @error('cart_value') is-invalid @enderror" />
                                            @error('cart_value')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="expiry_date">Expiry Date</label>
                                            <input type="date" id="expiry_date" wire:model.defer="state.expiry_date"
                                                class="form-control @error('expiry_date') is-invalid @enderror" />
                                            @error('expiry_date')
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
                    @if (!empty($coupons))
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>Cart Value</th>
                                    <th>Expiry Date</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->type }}</td>
                                        <td>{{ $coupon->value }}</td>
                                        <td>{{ $coupon->cart_value }}</td>
                                        <td>{{ $coupon->expiry_date }}</td>
                                        <td><i class="far fa-edit"
                                                wire:click.prevent="editCoupon({{ $coupon->id }})"></i>
                                            |
                                            <i class="fas fa-trash-alt"
                                                wire:click.prevent="confirmCouponRemoval({{ $coupon->id }})"></i>
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- Delete Modal --}}
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                    aria-labelledby="deleteModal" aria-hidden="true" wire:ignore.self>
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModal">Delete Coupon</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form id="form" wire:submit.prevent="deleteCoupon">
                                                <div class="modal-body">
                                                    Are you sure to delete this Coupon ?
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
                        @else
                            <p class="h5">No Coupon Available</p>
                    @endif
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
