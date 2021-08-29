<div>
    @section('title', 'Leather Shop BD - Site Information')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Site Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Site Settings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Site Information</h3>
                </div>
                <div class="card-body">
                    <form action="#" class="w-75 m-auto" wire:submit.prevent="storeSiteconfig">
                        @if ($state['id'])
                            <input type="hidden" wire:model.defer='state.id'>
                        @endif
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                                wire:model.defer="state.title">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea id="desc" wire:model="state.description"
                                class="form-control @error('description') is-invalid @enderror" cols="30"
                                rows="6"></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keywords">Meta Keywords</label>
                            <textarea id="keywords" wire:model="state.keywords"
                                class="form-control @error('keywords') is-invalid @enderror" cols="30"
                                rows="6"></textarea>
                            @error('keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="favicon">Favicon</label>
                            <input type="file" id="favicon"
                                class="form-control-file @error('favicon') is-invalid @enderror"
                                wire:model="state.favicon">
                            @if ($state['favicon'])
                                <img src="{{ asset('images/siteconfig/' . $state['favicon']) }}" width="50px" alt="">
                            @endif
                            @error('favicon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" id="logo" class="form-control-file @error('logo') is-invalid @enderror"
                                wire:model="state.logo">
                            @if ($state['logo'])
                                <img src="{{ asset('images/siteconfig/' . $state['logo']) }}" width="50px" alt="">
                            @endif
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror"
                                wire:model="state.phone">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                wire:model="state.email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" wire:model="state.address"
                                class="form-control @error('address') is-invalid @enderror" cols="30"
                                rows="4"></textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" id="facebook"
                                class="form-control @error('facebook') is-invalid @enderror"
                                wire:model="state.facebook">
                            @error('facebook')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" id="twitter" class="form-control @error('twitter') is-invalid @enderror"
                                wire:model="state.twitter">
                            @error('twitter')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="linkedin">LinkedIn</label>
                            <input type="text" id="linkedin"
                                class="form-control @error('linkedin') is-invalid @enderror"
                                wire:model="state.linkedin">
                            @error('linkedin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" id="instagram"
                                class="form-control @error('instagram') is-invalid @enderror"
                                wire:model="state.instagram">
                            @error('instagram')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
                <div class="card-footer">

                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
</div>
