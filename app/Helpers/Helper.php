<?php

if (!function_exists('get_role_user')) {
    function get_role_user()
    {
        return \Spatie\Permission\Models\Role::pluck('name', 'name');
    }
}

if (!function_exists('get_permission_user')) {
    function get_permission_user()
    {
        return \Spatie\Permission\Models\Permission::pluck('name', 'name');
    }
}

if (!function_exists('ganti_depan')) {
    function ganti_depan($nomor)
    {
        // Mengonversi nomor menjadi integer
        $intValue = intval($nomor);

        // Mengecek apakah nomor dimulai dengan 8
        if (preg_match('/^8(\d*)/', $intValue)) {
            // Jika dimulai dengan 8, maka ditambahkan 62 di depan
            $kalimat_hasil = '62' . $intValue;
        } else {
            // Jika tidak dimulai dengan 8, biarkan string tetap sama
            $kalimat_hasil = $intValue;
        }

        return $kalimat_hasil;
    }
}
