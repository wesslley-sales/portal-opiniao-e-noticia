@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Salvar {{ trans('cruds.post.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ isset($post) ? route("admin.posts.update", [$post->id]) :  route("admin.posts.store") }}"
                  enctype="multipart/form-data"
            >
                @method(isset($post) ? 'PUT' : 'POST')
                @csrf

                <div class="form-group">
                    <label class="required" for="categories">{{ trans('cruds.post.fields.categories') }}</label>
                    <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple required>
                        @foreach($categories as $id => $category)
                            <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || isset($post) && $post->categories->contains($id)) ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('categories'))
                        <div class="invalid-feedback">
                            {{ $errors->first('categories') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.categories_helper') }}</span>
                </div>

                <div class="form-group">
                    <label>{{ trans('cruds.post.fields.featured_position') }}</label>
                    <select class="form-control {{ $errors->has('featured_position') ? 'is-invalid' : '' }}" name="featured_position" id="featured_position">
                        <option value disabled {{ old('featured_position', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(\App\Enums\FeaturedPositionPostEnum::getDescriptions() as $item)
                            <option value="{{ $item['value'] }}" {{ old('featured_position', $post->featured_position ?? "") === (string) $item['value'] ? 'selected' : '' }}>
                                {{ $item['description'] }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('featured_position'))
                        <div class="invalid-feedback">
                            {{ $errors->first('featured_position') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.featured_position_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.post.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $post->title ?? "") }}" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.title_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="subtitle">{{ trans('cruds.post.fields.subtitle') }}</label>
                    <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $post->subtitle ?? "") }}">
                    @if($errors->has('subtitle'))
                        <div class="invalid-feedback">
                            {{ $errors->first('subtitle') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.subtitle_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="image_featured">{{ trans('cruds.post.fields.image_featured') }}</label>

                    <input type="hidden" name="image_id" id="image_id" value="{{ old('image_id', $post->image_id ?? "") }}">
                    <img src=""
                         id="image_featured"
                         class="img-thumbnail d-none mb-2"
                         style="width: 100px; height: 100px;"
                         loading="lazy"
                    />

                    <p class="form-control">
                        <a title="Selecionar foto" id="selectImage" href="javascript:void(0)">
                            <i class="fa fa-search"></i>
                            Selecionar foto destaque
                        </a>
                    </p>
                </div>

                <div class="form-group">
                    <label for="content">{{ trans('cruds.post.fields.content') }}</label>
                    <textarea class="form-control richEditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{!! old('content', $post->content ?? "") !!}</textarea>
                    @if($errors->has('content'))
                        <div class="invalid-feedback">
                            {{ $errors->first('content') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.content_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="source">{{ trans('cruds.post.fields.source') }}</label>
                    <input class="form-control {{ $errors->has('source') ? 'is-invalid' : '' }}" type="text" name="source" id="source" value="{{ old('source', $post->source ?? "") }}">
                    @if($errors->has('source'))
                        <div class="invalid-feedback">
                            {{ $errors->first('source') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.source_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="users">{{ trans('cruds.post.fields.user') }}</label>
                    <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users[]" id="users" multiple required>
                        @foreach($users as $id => $user)
                            <option value="{{ $id }}" {{ (in_array($id, old('users', [])) || isset($post) && $post->users->contains($id)) ? 'selected' : '' }}>{{ $user }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('users'))
                        <div class="invalid-feedback">
                            {{ $errors->first('users') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.user_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="published_at">{{ trans('cruds.post.fields.published_at') }}</label>
                    <input class="form-control {{ $errors->has('published_at') ? 'is-invalid' : '' }}"
                           type="datetime-local"
                           name="published_at" id="published_at"
                           value="{{ old('published_at', $post->published_at ?? date('Y-m-d\TH:i:s')) }}"
                           step="1"
                           required
                    />
                    @if($errors->has('published_at'))
                        <div class="invalid-feedback">
                            {{ $errors->first('published_at') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.published_at_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="tags">{{ trans('cruds.post.fields.tag') }}</label>
                    <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple>
                    </select>
                    @if($errors->has('tags'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tags') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.tag_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required">{{ trans('cruds.post.fields.status') }}</label>
                    @foreach(App\Models\Post::STATUS_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $post->status ?? \App\Enums\StatusEnum::ACTIVE->value) === (string) $key ? 'checked' : '' }} required>
                            <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.status_helper') }}</span>
                </div>

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#tags').select2({
                minimumInputLength: 3,
                language: {
                    inputTooShort: function() {
                        return 'Digite 3 ou mais caracteres...';
                    },
                    noResults: function() {
                        return 'Nenhum resultado encontrado...';
                    },
                    searching: function() {
                        return 'Pesquisando...';
                    }
                },
                ajax: {
                    url: '{{ route('admin.content-tags.search') }}',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        });
    </script>

    <script>
        let post = @json($post ?? null);

        if (post) {
            let tags = post.tags.map(tag => {
                $('#tags')
                    .append(new Option(tag.name, tag.id, true, true))
                    .trigger('change');
            });
        }
    </script>

    @include('partials.froalaEditor', [
        'crud_id' => isset($post) ? $post->id : 0,
        'model'   => "Post",
    ]);

    <script>
        $(document).on('click', '#selectImage', function (e) {
            e.preventDefault();
            window.open('{{ route('admin.images.selectImage') }}', '', 'height=800 width='+($(window).width() - 50)+', top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
        });
    </script>

    <script>
        window.addEventListener("message", function(event) {
            let selectedImages = event.data.selectedImages || [];

            if (selectedImages.length === 0) {
                return false;
            }

            if (event.data.source === 'selectImage') {
                $('#image_id').val(selectedImages[0].id);

                $('#image_featured')
                    .prop('src', selectedImages[0].imageUrl)
                    .removeClass('d-none');
            }

        }, false);
    </script>
@endsection
