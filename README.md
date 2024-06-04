<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Sistem Manajemen RW</h1>
        Sistem Manajemen RW adalah sebuah aplikasi web yang dirancang untuk membantu pengelolaan administrasi dan kegiatan di tingkat Rukun Warga (RW). 
        Aplikasi ini bertujuan untuk memudahkan pengurus RW dalam mengelola data warga, informasi kegiatan, serta berkomunikasi dengan warga secara lebih efektif dan efisien.
    </p>
    <h2>Fitur Utama</h2>
    <ul>
        <li><strong>Manajemen Data Warga</strong>: Menyimpan dan mengelola informasi detail setiap warga, seperti nama, alamat dan status kependudukan.</li>
        <li><strong>Informasi Kegiatan RW</strong>: Publikasi jadwal dan detail kegiatan yang akan atau telah dilakukan di lingkungan RW.</li>
        <li><strong>Forum Diskusi</strong>: Sarana komunikasi antara warga dan pengurus RW untuk berdiskusi mengenai berbagai topik.</li>
        <li><strong>Laporan dan Statistik</strong>:  Menyimpan dan mengelola informasi dalam kegiatan RW.</li>
    </ul>
    <h2>Instalasi</h2>
    <ol>
        <li>Clone repositori ini ke lokal mesin Anda:
            <pre><code>git clone https://github.com/integer-class/rwis-2</code></pre>
        </li>
        <li>Masuk ke direktori proyek:
            <pre><code>cd rwis-2</code></pre>
        </li>
        <li>Instal dependensi menggunakan Composer:
            <pre><code>composer install</code></pre>
        </li>
        <li>Atur file <code>.env</code> dengan konfigurasi yang diperlukan (contoh tersedia di <code>.env.example</code>):
            <pre><code>cp .env.example .env
php artisan key:generate</code></pre>
        </li>
        <li>Migrasi dan seed database:
            <pre><code>php artisan migrate --seed</code></pre>
        </li>
        <li>Instal dependensi frontend menggunakan npm:
            <pre><code>npm install
npm run dev</code></pre>
        </li>
        <li>Jalankan server aplikasi:
            <pre><code>php artisan serve</code></pre>
        </li>
    </ol>
    <h2>Teknologi yang Digunakan</h2>
    <ul>
        <li>Backend: Laravel 11</li>
        <li>Autentikasi: Laravel Breeze</li>
        <li>Frontend: Blade Template Engine, Tailwind CSS</li>
        <li>Database: MySQL</li>
    </ul>
    <h2>Kontribusi</h2>
    <p>Kami sangat terbuka untuk kontribusi dari siapapun. Berikut adalah langkah-langkah untuk berkontribusi:</p>
    <ol>
        <li>Fork repositori ini.</li>
        <li>Buat branch fitur baru (<code>git checkout -b fitur-baru</code>).</li>
        <li>Commit perubahan Anda (<code>git commit -m 'Tambah fitur baru'</code>).</li>
        <li>Push ke branch (<code>git push origin fitur-baru</code>).</li>
        <li>Buat Pull Request.</li>
    </ol>
    <h2>Tim Pengembang</h2>
    <ul>
        <li><strong>Fahruddin Zaim Ibrahim Wicaksono</strong> - 2241720253 </li>
        <li><strong>Gastiadirijal Naufaldy Kestiyanto</strong> - 2241720001 </li>
        <li><strong>Maulia Balqis Ansya Aulia</strong> - 2241720246 </li>
        <li><strong>Muhammad Nur Fauzi Ikhsan</strong> - 2241720076</li>
        <li><strong>Renathan Anggoro Arry Wibisono</strong> - 2241720239 </li>
    </ul>

</body>
</html>

<img src="https://github.com/integer-class/rwis-2/blob/main/public/assets/keren.png"/>
