{{-- Shared form for create/edit; expects $action, $submitLabel and an optional $category. --}}
<form method="POST" action="{{ $action }}">
    @csrf

    @isset($category)
    @method('PUT')
    @endisset

    <div class="mb-3">
        <label for="CategoryName" class="form-label">
            Category Name <span class="text-danger">*</span>
        </label>

        <input type="text" name="CategoryName" id="CategoryName"
            class="form-control @error('CategoryName') is-invalid @enderror"
            value="{{ old('CategoryName', $category->CategoryName ?? '') }}" maxlength="25" required>

        @error('CategoryName')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="form-text">Up to 25 characters.</div>
    </div>

    <div class="mb-3">
        <label for="Description" class="form-label">Description</label>

        <textarea name="Description" id="Description" rows="3"
            class="form-control @error('Description') is-invalid @enderror"
            maxlength="255">{{ old('Description', $category->Description ?? '') }}</textarea>

        @error('Description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="form-text">Optional, up to 255 characters.</div>
    </div>

    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
            Cancel
        </a>
        <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
    </div>
</form>