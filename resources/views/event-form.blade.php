<x-modal-action action="{{ $action }}">

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
                <input type="text" name="start_date" readonly
                    value="{{ $data->start_date ?? request()->start_date }}" class="form-control datepicker">
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
                    <label class="form-check-label" for="category-success">Success</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'danger' ? 'checked' : null }} type="radio"
                        name="category" id="category-danger" value="danger">
                    <label class="form-check-label" for="category-danger">Danger</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'warning' ? 'checked' : null }} type="radio"
                        name="category" id="category-warning" value="warning">
                    <label class="form-check-label" for="category-warning">Warning</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'info' ? 'checked' : null }} type="radio"
                        name="category" id="category-info" value="info">
                    <label class="form-check-label" for="category-info">Info</label>
                </div>
            </div>
        </div>

        <div>
            <input class="form-check-input" type="checkbox" name="reminder" id="reminder" value="1"
                {{ $data->reminder ? 'checked' : '' }}>
            <label class="form-check-label ms-2" for="reminder">Turn On Reminder</label>
        </div>

        @if ($data->id)
            <div class="col-12">
                <div class="mt-3 card shadow-sm p-3" style="width: auto; display: inline-block;">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="delete" role="switch"
                                id="flexSwitchCheckDefault"
                                style="transition: all 0.3s ease; background-color: #1737d5; width: 50px; height: 25px;">
                            <label class="form-check-label ms-2" for="flexSwitchCheckDefault"
                                style="color: rgba(0, 0, 0, 0.55); font-weight: normal; font-size: 16px; font-family: inherit;">
                                Delete
                            </label>

                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>
</x-modal-action>
