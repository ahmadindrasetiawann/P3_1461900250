<form action="{{ url('perpustakaan/' . $perpustakaan->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="patch">
    ID TRANSAKSI: <input type="text" name="id" value="{{ $perpustakaan->id }}">
    ID PELANGGAN: <input type="text" name="id_buku" value="{{ $perpustakaan->id_buku }}">
    ID BARANG: <input type="text" name="id_jenis_buku" value="{{ $perpustakaan->id_jenis_buku }}">
    <button type="submit">Simpan</button>
</form>