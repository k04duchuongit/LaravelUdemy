@extends('app')

@section('contents')
    <section>
        @if ($errors->has('file'))
            <div class="alert alert-danger">{{ $errors->first('file') }}</div>
        @endif
        <div class="row justify-content-center m-3">
            <div class="col-md-6">
                <div class="card mt-5 mb-5">
                    <div class="card-body">
                        <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">File</label>
                                <input type="file" class="form-control" id="" name="file">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <table class="">
                <tbody>
                    @foreach ($files as $file)
                        <td>
                            <img src="{{ asset($file->file_path) }}" width="200" height="200">
                            <a href="{{ route('file.download') }}">dowload file</a>
                        </td>
                        <br>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
