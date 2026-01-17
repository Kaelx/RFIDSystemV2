@extends('adminlte::page')

@section('content_header')
    <h1>Edit Vendor</h1>
@endsection


@section('content')
    <div class="container-fluid">

        {{-- <x-input-error :messages="$errors->all()" /> --}}

        <div class="card">
            <form action="{{ route('seller.update', $seller->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-header">
                    <h2 class="card-title">Form</h2>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <x-input-label for="fname" value="First Name" />
                        <x-text-input type="text" id="fname" name="fname"
                            value="{{ old('fname', $seller->fname) }}" />
                        <x-input-error :messages="$errors->get('fname')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="mname" value="Middle Name" />
                        <x-text-input type="text" id="mname" name="mname"
                            value="{{ old('mname', $seller->mname) }}" />
                        <x-input-error :messages="$errors->get('mname')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="lname" value="Last Name" />
                        <x-text-input type="text" id="lname" name="lname"
                            value="{{ old('lname', $seller->lname) }}" />
                        <x-input-error :messages="$errors->get('lname')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="sname" value="Suffix Name" />
                        <x-text-input type="text" id="sname" name="sname"
                            value="{{ old('sname', $seller->sname) }}" />
                        <x-input-error :messages="$errors->get('sname')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="bdate" value="Birthdate" />
                        <x-text-input type="date" id="bdate" name="bdate"
                            value="{{ old('bdate', $seller->bdate) }}" />
                        <x-input-error :messages="$errors->get('bdate')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="sex" value="Sex" />
                        <select name="sex" id="sex" class="form-control">
                            <option value="" disabled {{ old('sex', $seller->sex) == '' ? 'selected' : '' }}>
                                -- Select --</option>
                            <option value="male" {{ old('sex', $seller->sex) == 'male' ? 'selected' : '' }}>Male
                            </option>
                            <option value="female" {{ old('sex', $seller->sex) == 'female' ? 'selected' : '' }}>Female
                            </option>
                            <option value="none" {{ old('sex', $seller->sex) == 'none' ? 'selected' : '' }}>Prefer not
                                to say</option>
                        </select>
                        <x-input-error :messages="$errors->get('sex')" />
                    </div>
                    <div>
                        <label>Profile Picture</label><br>
                        <img src="{{ asset('storage/' . $seller->image) }}" alt="{{ $seller->lname }}"
                            class="img-thumbnail" style="max-width: 150px;">
                    </div>
                    <div class="mb-2">
                        <x-input-label for="image" value="Upload New" />
                        <x-text-input type="file" id="image" name="image" accept="image/*" />
                        <x-input-error :messages="$errors->get('image')" />
                    </div>
                </div>
                <div class="card-footer">
                    <x-primary-button type="submit">Update</x-primary-button>
                    <a href="{{ route('seller.index') }}"><x-secondary-button
                            type="button">Cancel</x-secondary-button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
