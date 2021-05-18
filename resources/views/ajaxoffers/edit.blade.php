@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    {{ __('messages.Add your offer') }}
                </div>

                <div class="alert alert-success" id="success_msg" style="display: none;">
                    تم الحفظ بنجاح
                </div>

                @if (session()->has('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('status') }}
                    </div>
                @endif

                <form id="offer-form" method="POST" action="" enctype="multipart/form-data">
                    {{-- route('...') ila kant name f web.php sinn url('...') --}}
                    @csrf
                    <div class="form-group">
                        <label>أختر صوره العرض</label>
                        <input type="file" class="form-control" name="photo">
                        @error('photo')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" style="display: none" name="offer_id" class="form-control" value="{{ $offer->id }}">
                        <label>{{ __('messages.Offer Name en') }}</label>
                        <input type="text" name="name_en" class="form-control" placeholder="{{ __('messages.Offer Name') }}" value="{{ old('name_en', $offer->name_en ?? null) }}">
                        @error('name_en')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('messages.Offer Name ar') }}</label>
                        <input type="text" class="form-control" name="name_ar" placeholder="{{ __('messages.Offer Name') }}" value="{{ old('name_en', $offer->name_ar ?? null) }}">
                        @error('name_ar')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Offer Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Offer Price" value="{{ old('price', $offer->price ?? null) }}">
                        @error('price')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('messages.Offer details en') }}</label>
                        <input type="text" name="details_en" class="form-control" placeholder="{{ __('messages.Offer details') }}" value="{{ old('details_en', $offer->details_en ?? null) }}">
                        @error('details_en')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('messages.Offer details ar') }}</label>
                        <input type="text" class="form-control" name="details_ar" placeholder="{{ __('messages.Offer details') }}" value="{{ old('details_ar', $offer->details_ar ?? null) }}">
                        @error('details_ar')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button id="update_offer" class="btn btn-primary">Update Offer</button>
                </form>

            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '#update_offer', function(e) {
            e.preventDefault();
            var form = $('#offer-form')[0];
            var formData = new FormData(form);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{ route('ajax.offers.update') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if (data.status == true) {
                        $('#success_msg').show();
                    }
                },
                error: function(reject) {

                }
            });
        });

    </script>
@endsection