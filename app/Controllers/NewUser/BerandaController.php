<?php

namespace App\Controllers\NewUser;

use App\Controllers\NewUser\BaseController;
use App\Models\ArtikelModel;
use App\Models\FounderModels;
use App\Models\KategoriVideoModels;
use App\Models\KeuntunganModel;
use App\Models\LinkFounderModels;
use App\Models\MetaModel;
use App\Models\PengumumanModels;
use App\Models\TentangModels;
use App\Models\TestimonialModels;
use App\Models\VideoPembelajaranModels;
use CodeIgniter\HTTP\ResponseInterface;

class BerandaController extends BaseController
{

    public function index()
    {
        $keuntunganModel = new KeuntunganModel();
        $keuntungan = $keuntunganModel->findAll();

        $founderModel = new FounderModels();
        $founder = $founderModel->findAll();

        $pengumumanModel = new PengumumanModels(); // Ensure this is the correct model
        $today = date('Y-m-d'); // Get today's date
        $pengumuman = $pengumumanModel->getHomePengumuman($today); // Fetch announcements

        // Slice the array to get the latest 3 if more are returned
        $pengumuman = array_slice($pengumuman, 0, 3);

        //SEO
        $metaModel = new MetaModel();
        $meta = $metaModel->where('nama_halaman', 'Beranda')->first();
        $canonicalUrl = base_url('beranda');

        $testimoniModel = new TestimonialModels();
        $testimoni = $testimoniModel->findAll();

        // Debug data testimoni
        // var_dump($testimoni); // Cek apakah data ada dan benar
        // exit();

        return $this->render('NewUser/beranda/index', [
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,
            'keuntungan' => $keuntungan,
            'founder' => $founder,
            'pengumuman' => $pengumuman,
            'testimoni' => $testimoni,
        ]);
    }

    public function about()
    {
        // Load Tentang Model
        $tentangModel = new TentangModels();
        // Get the first record from the Tentang table
        $tentang = $tentangModel->first(); // Returns an object of stdClass

        // Load Founder Model
        $founderModel = new FounderModels();

        // Perform a join between Founder and LinkFounder tables
        $founderData = $founderModel
            ->select('tb_founder.*, tb_link_founder.*')  // Select all columns from both tables
            ->join('tb_link_founder', 'tb_link_founder.id_founder = tb_founder.id_founder', 'left')  // Left join
            ->findAll();  // Get all records

        // Process data to group links by founder
        $founder = [];
        foreach ($founderData as $item) {
            // Check if the founder already exists in the array
            if (!isset($founder[$item->id_founder])) {
                $founder[$item->id_founder] = (object) [
                    'id_founder' => $item->id_founder,
                    'nama_founder' => $item->nama_founder,
                    'jabatan_founder' => $item->jabatan_founder,
                    'foto_founder' => $item->foto_founder,
                    'deskripsi_founder' => $item->deskripsi_founder,
                    'links' => [] // Initialize an empty array for links
                ];
            }

            // If there is a link, add it to the founder's links
            if (!empty($item->id_link_founder)) {
                $founder[$item->id_founder]->links[] = (object) [
                    'link_founder' => $item->link_founder,
                    'icon_link_founder' => $item->icon_link_founder,
                    'nama_link_founder' => $item->nama_link_founder,
                ];
            }
        }

        // Convert the associative array back to a numerically indexed array
        $founder = array_values($founder);

        //SEO
        $metaModel = new MetaModel();
        $meta = $metaModel->where('nama_halaman', 'Tentang Kami')->first();
        $canonicalUrl = base_url('about');

        // Pass the necessary data to the view
        return $this->render('NewUser/beranda/about', [
            'tentang' => $tentang,
            'founder' => $founder,
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,

        ]);
    }




    public function kontak()
    {
        //SEO
        $metaModel = new MetaModel();
        $meta = $metaModel->where('nama_halaman', 'Kontak')->first();
        $canonicalUrl = base_url('kontak');

        return $this->render('NewUser/beranda/kontak', [
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,
        ]);
    }
}
