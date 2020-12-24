<?php 
/**
 * Nah skrg kita udh copy class2 yang akan jadi pengganti function  view bawaan Codeigniter
 * Ada 3 file yang di copy tadi, salah satunya ini. 
 * Jadi class ini yang bertanggungjawab render view di browser nanti
 * mari kita lihat
 * 
 * Seperti di controller LandingPage tadi, class ini jg 
 * butuh didefinisikan namespacenya (semua class butuh namespace)
 * disini berarti file ini berada di folder app/Libraries/View
 */
namespace App\Libraries\View;

/**
 * class nya namanya TemplateEngine, sesuai dengan nama file.
 */
class TemplateEngine {

    /**
     * Jadi kita gunain kelas ini buat nampilin view kita
     * dibawah ini ada function view() , sama seperti function view bawaan codeigniter
     * tetapi bedanya kita menerima class view sebagai parameternya
     * parameter itu yang didalam tanda kurung saat pemanggilan function
     * contoh: view('nahiniparameternya');
     * nanti kutunjukin beda class yg kita buat ini sama function bawaan codeigniter,
     * dan cara pemakaian nya
     * 
     * untuk memakai class ini, view kita harus dirubah menjadi class, bukan hanya html aja.
     * mari kita ubah salah satu view kita sebagai contoh
     * disini kita pakai view index aja ya.
     */
    public static function view(ViewInterface $view) : string {
        return $view->render();
    }
}