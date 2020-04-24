@extends('layouts.layout')
@section('konten')
    <section style="margin-bottom:0px;border-top:0;width:calc(100% - 30px)">
        <h1> Komik Genre Cooking </h1>
        <p class="top1"> Baca komik dengan Genre Cooking terlengkap bahasa Indonesia. Di Komiku kalian bisa membaca Manga Genre Cooking terbaru. </p>
        <!-- <div class="filter">
            <p> Tampilkan berdasarkan jenis komik: </p>
            <form class="filer2" action="">
                <select name="orderby" id="filter" class="formfiler">
                    <option class="level-1" value="0">Baru ditambahkan</option>
                    <option class="level-1" value="meta_value_num"> Terpopuler</option>
                    <option class="level-1" value="modified"> Update Terbaru</option>
                </select>
                <select name="category_name" id="filter" class="formfiler">
                    <option class="level-1" value="0">Komik (Semua)</option>
                    <option class="level-1" value="manga"> Manga (Jepang)</option>
                    <option class="level-1" value="manhua"> Manhua (China)</option>
                    <option class="level-1" value="manhwa"> Manhwa (Korea)</option>
                </select>
                <input class="filter3" value="Filter" type="submit"> </form>
        </div> -->
        <div class="daftar">
            <div class="bge">
                <a href="{{url('manga/'.$detailKategoriManga->slug_manga)}}" class="popunder">
                    <div class="bgei">
                        <div class="vw Rekomendasi"> Rekomendasi</div> 
                        <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Tondemo-Skill-de-Isekai-Hourou-Meshi.jpg?resize=300,170&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Tondemo-Skill-de-Isekai-Hourou-Meshi.jpg?resize=300,170&amp;quality=60" class="lazy sd rd">
                        <div class="tpe1_inf"> <b>{{$detailKategoriManga->jenis_manga}}</b> {{$detailKategoriManga->konsep_cerita}} </div>
                    </div>
                    <div class="kan">
                        <h3> {{$detailKategoriManga->nama_manga}} </h3> <span>232 rb x • 4 minggu lalu</span>
                        <p> Mukouda dulunya adalah seorang pegawai gaji sampai ia dipanggil secara tidak sengaja ke dunia fantasi. </p>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection