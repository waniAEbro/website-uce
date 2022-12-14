@extends("layout.dashboard")

@section("main")
    <form action="/mentor" method="post">
        @csrf
        <div class="form-group">
            <label for="namaMentor">Nama</label>
            <input type="text" class="form-control" required name="nama" id="namaMentor" placeholder="ex : Rahman Surahman">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="formFile" class="form-label">Gambar</label>
            <input class="form-control" type="text" id="formFile" name="gambar">
            <small class="form-text text-muted"><span class="text-info">#</span>bisa kosong</small>
            @error('gambar')
            <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="deskripsi">Informasi</label>
            <input id="x" type="hidden" required name="deskripsi_singkat">
            <trix-editor input="x"></trix-editor>
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <button type="submit" class="btn btn-success">Tambah Perusahaan</button>
    </form>
@endsection