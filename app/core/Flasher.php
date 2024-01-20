<?php

class Flasher
{

    public static function setFlash($pesan, $aksi)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="bg-purple-200 border-l-4 border-purple-500 text-gray-700 p-4" role="alert">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                        Data Pengguna
                        </div>
                        <div class="ml-3">
                        <p class="font-bold">' . $_SESSION['flash']['pesan'] . '</p>
                        <p>' . $_SESSION['flash']['aksi'] . '</p>
                        </div>
                        <button type="button" class="ml-auto text-gray-700 hover:text-gray-800 focus:outline-none focus:text-gray-800" data-dismiss="alert" aria-label="Close">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                </div>';
            unset($_SESSION['flash']);
        }
    }
}
