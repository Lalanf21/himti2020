<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'front-end/beranda';
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;

// frontEnd
// =================================================

// 1. Artikel
// *************************************************
$route['artikel'] = 'front-end/artikel';
$route['read-artikel/(:any)'] = 'front-end/artikel/detail/$1';
$route['artikel/page/(:any)'] = 'front-end/artikel/index/$1';
// *************************************************

// 2. events
// *************************************************
$route['events'] = 'front-end/events';
$route['read-events/(:any)'] = 'front-end/events/detail/$1';
$route['events/page/(:any)'] = 'front-end/events/index/$1';
// $route['events/detail)'] = 'front-end/events/detail/';
// *************************************************

// 3. modul
// *************************************************
$route['modul'] = 'front-end/modul';
$route['download-modul/(:any)'] = 'front-end/modul/download/$1';
// *************************************************

// 4. tentang himti
// *************************************************
$route['visi-misi-himti'] = 'front-end/visi_misi';
$route['struktural-himti'] = 'front-end/struktural';
$route['galeri'] = 'front-end/struktural';
// *************************************************

// 5. Kontak kami
// *************************************************
$route['kontak-kami'] = 'front-end/contact';
// *************************************************

// 6. Seminar Online
// *************************************************
$route['talkshow-data-security'] = 'front-end/talkshow';
$route['register-talkshow-data-security'] = 'front-end/talkshow/form_register';
$route['save-peserta'] = 'front-end/talkshow/save';
// *************************************************
// akhir front-end
// ################################################

// backEnd
// =================================================

// 1.Dashboard
// **************************************************************
$route['dashboard'] = 'back-end/dashboard';
// **************************************************************

// 2. Settings
// **************************************************************
$route['setting-carousel'] = 'back-end/carousel_setting';
$route['save-carousel'] = 'back-end/carousel_setting/add';
$route['delete-carousel'] = 'back-end/carousel_setting/delete';
$route['update-carousel'] = 'back-end/carousel_setting/update';
$route['setting-home'] = 'back-end/home_setting';
$route['setting-home/update'] = 'back-end/home_setting/update';
// ***************************************************************

// 3. Master data Anggota
// **************************************************************
$route['data-anggota'] = 'back-end/anggota';
$route['add-anggota'] = 'back-end/anggota/form_add';
$route['save-anggota'] = 'back-end/anggota/add';
$route['update-anggota'] = 'back-end/anggota/update';
$route['edit-anggota'] = 'back-end/anggota/form_edit';
$route['delete-anggota'] = 'back-end/anggota/delete';
// ***************************************************************

// 4. Master data divisi
// **************************************************************
$route['data-divisi'] = 'back-end/divisi';
$route['add-divisi'] = 'back-end/divisi/add';
$route['delete-divisi'] = 'back-end/divisi/delete';
$route['update-divisi'] = 'back-end/divisi/update';
// ***************************************************************

// 5. Master data tahun angkatan
// **************************************************************
$route['data-tahun-angkatan'] = 'back-end/tahun_angkatan';
$route['add-tahun-angkatan'] = 'back-end/tahun_angkatan/add';
$route['delete-tahun-angkatan'] = 'back-end/tahun_angkatan/delete';
$route['update-tahun-angkatan'] = 'back-end/tahun_angkatan/update';
// ***************************************************************

// 6. Master data peminatan
// **************************************************************
$route['data-peminatan'] = 'back-end/peminatan';
$route['add-peminatan'] = 'back-end/peminatan/add';
$route['delete-peminatan'] = 'back-end/peminatan/delete';
$route['update-peminatan'] = 'back-end/peminatan/update';
// ***************************************************************

// 7. Tentang HIMTI
// **************************************************************
$route['visi-misi'] = 'back-end/visi_misi';
$route['save-visi-misi'] = 'back-end/visi_misi/add';
$route['delete-visi-misi'] = 'back-end/visi_misi/delete';
$route['update-visi-misi'] = 'back-end/visi_misi/update';
$route['data-struktural'] = 'back-end/struktural';
$route['add-struktural'] = 'back-end/struktural/add';
$route['update-struktural'] = 'back-end/struktural/update';
$route['delete-struktural'] = 'back-end/struktural/delete';
// ***************************************************************

// 8. Modul
// **************************************************************
$route['list-modul'] = 'back-end/modul';
$route['add-modul'] = 'back-end/modul/form_add';
$route['save-modul'] = 'back-end/modul/add';
$route['delete-modul'] = 'back-end/modul/delete';
$route['update-modul'] = 'back-end/modul/update';
// ***************************************************************

// 9. Artikel
// **************************************************************
$route['list-artikel'] = 'back-end/artikel';
$route['add-artikel'] = 'back-end/artikel/form_add';
$route['edit-artikel'] = 'back-end/artikel/form_edit';
$route['save-artikel'] = 'back-end/artikel/add';
$route['update-artikel'] = 'back-end/artikel/update';
$route['delete-artikel'] = 'back-end/artikel/delete';
// ***************************************************************

// 10. Events
// **************************************************************
$route['list-events'] = 'back-end/events';
$route['add-events'] = 'back-end/events/form_add';
$route['edit-events'] = 'back-end/events/form_edit';
$route['save-events'] = 'back-end/events/add';
$route['update-events'] = 'back-end/events/update';
$route['delete-events'] = 'back-end/events/delete';
// **************************************************************

// 11. Data pengguna
// **************************************************************
$route['list-pengguna'] = 'back-end/pengguna';
$route['add-pengguna'] = 'back-end/pengguna/add';
$route['update-pengguna'] = 'back-end/pengguna/update';
$route['delete-pengguna'] = 'back-end/pengguna/delete';
$route['get_nim'] = 'back-end/pengguna/get_nim';
// ***************************************************************

// 12. Talkshow Data security
// **************************************************************
$route['list-peserta'] = 'back-end/talkshow';
$route['export-excel'] = 'back-end/talkshow/export_excel';
// ***************************************************************

$route['login'] = 'back-end/auth';
$route['login/proses'] = 'back-end/auth/proses_login';
$route['logout'] = 'back-end/auth/logout';

$route['ubah-pass'] = 'back-end/ubahpass';
$route['save-pass'] = 'back-end/ubahpass/update_pass';