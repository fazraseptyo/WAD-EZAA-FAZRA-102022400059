<!-- 1. Hubungkan file Profile.blade.php dengan profapp.blade.php-->

@section('title', 'Profil Mahasiswa')

@section('content')
<div class="profile-wrapper">
    <div class="profile-card animate-fadeup">
        <div class="profile-header">
            <div class="avatar animate-pop">
                <span><!-- 2. Panggil variabel dari controller dan tampilkan 1 huruf pertama dari nama--></span>
            </div>
            <div class="profile-identity">
                <h2><!-- 3. Panggil variabel dari controller untuk menampilkan nama--></h2>
                <p><!-- 4. Panggil variabel dari controller untuk menampilkan NIM--></p>
            </div>
        </div>

        <div class="profile-info animate-delay">
            <div class="info-group">
                <span class="label">Program Studi</span>
                <span class="value"><!-- 5. Panggil variabel dari controller untuk menampilkan prodi--></span>
            </div>
            <div class="info-group">
                <span class="label">Fakultas</span>
                <span class="value"><!-- 6. Panggil variabel dari controller untuk menampilkan fakultas--></span>
            </div>
            <div class="info-group">
                <span class="label">Kelas</span>
                <span class="value"><!-- 7. Panggil variabel dari controller untuk menampilkan kelas--></span>
            </div>
            <div class="info-group">
                <span class="label">Email</span>
                <span class="value"><!-- 8. Panggil variabel dari controller untuk menampilkan email--></span>
            </div>
        </div>

        <div class="btn-wrapper animate-fadein">
            <!-- 9. Isi value atribut href agar mendirect menuju halaman dashboard-->
            <a href="" class="btn-back">
                <i class="bi bi-arrow-left"></i> Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
