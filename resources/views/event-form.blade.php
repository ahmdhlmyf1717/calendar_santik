<x-modal-action :action="$action" :data="$data">

    @if (session('status'))
        <div class="alert alert-{{ session('status')['type'] }} alert-dismissible fade show" role="alert">
            {{ session('status')['message'] }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($data->id)
        @method('put')
    @endif

    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <input type="text" name="start_date" readonly value="{{ $data->start_date ?? request()->start_date }}"
                    class="form-control datepicker">
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <input type="text" name="end_date" readonly value="{{ $data->end_date ?? request()->end_date }}"
                    class="form-control datepicker">
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <textarea name="title" class="form-control">{{ $data->title }}</textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'success' ? 'checked' : null }} type="radio"
                        name="category" id="category-success" value="success">
                    <label class="form-check-label" for="category-success">Rapat</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'danger' ? 'checked' : null }} type="radio"
                        name="category" id="category-danger" value="danger">
                    <label class="form-check-label" for="category-danger">Deadline</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'warning' ? 'checked' : null }} type="radio"
                        name="category" id="category-warning" value="warning">
                    <label class="form-check-label" for="category-warning">Acara</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'info' ? 'checked' : null }} type="radio"
                        name="category" id="category-info" value="info">
                    <label class="form-check-label" for="category-info">Tugas</label>
                </div>
            </div>
        </div>

        <div>
            <input class="form-check-input" type="checkbox" name="reminder" id="reminder" value="1"
                {{ $data->reminder ? 'checked' : '' }}>
            <label class="form-check-label ms-2" for="reminder">Turn On Reminder</label>
        </div>
    </div>

</x-modal-action>
