<?php

namespace App\Controllers\NewUser;

use App\Controllers\BaseController;
use App\Models\ContentPlanner;
use App\Models\SosialMedia;
use App\Models\ContentPillar;
use App\Models\ContentType;
use App\Models\InstagramMetrics;
use App\Models\TiktokMetrics;
use App\Models\YoutubeMetrics;
use App\Models\FacebookMetrics;
use App\Models\PinterestMetrics;
use App\Models\LinkedinMetrics;
use App\Models\TrendModel;
use CodeIgniter\HTTP\ResponseInterface;

class ContentPlannerController extends BaseController
{
    public function serve($filename)
    {
        $filePath = FCPATH . 'uploads/file_content/' . $filename;

        if (file_exists($filePath)) {
            return $this->response->download($filePath, null)->setFileName($filename);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function calender()
    {
        $modelCPlanner = new ContentPlanner();
        $modelSosialMedia = new SosialMedia();

        // Mengambil semua data dari tabel content_planner
        $content_planner = $modelCPlanner->findAll();
        $sosial_media = $modelSosialMedia->findAll();

        // Membuat array untuk memetakan nama sosial media ke warna sosial media
        $socialMediaColors = [];
        foreach ($sosial_media as $media) {
            $socialMediaColors[$media['nama_sosial_media']] = $media['warna_sosial_media'];
        }

        // Mengelompokkan data berdasarkan tanggal
        $eventsByDate = [];
        foreach ($content_planner as $event) {
            $date = date('Y-m-d', strtotime($event['post_date']));
            if (!isset($eventsByDate[$date])) {
                $eventsByDate[$date] = [];
            }
            $eventsByDate[$date][] = [
                'id_content_planner' => $event['id_content_planner'],
                'link_gdrive' => $event['link_gdrive'],
                'sosial_media' => $event['sosial_media'],
                'content_type' => $event['content_type'],
                'content_pillar' => $event['content_pillar'],
                'status' => $event['status'],
                'caption' => $event['caption'],
                'cta_link' => $event['cta_link'],
                'hashtag' => $event['hashtag'],
                'post_date' => $event['post_date'],
            ];
        }

        $data['eventsByDate'] = $eventsByDate;
        $data['socialMediaColors'] = $socialMediaColors;
        $data['sosialmedia'] = $sosial_media;

        return view('NewUser/content-planner/content-calendar', $data);
    }

    public function index()
    {
        $modelSosmed = new SosialMedia();
        $modelCPillar = new ContentPillar();
        $modelCType = new ContentType();

        $sosmed = $modelSosmed->findAll();
        $content_pillar = $modelCPillar->findAll();
        $content_type = $modelCType->findAll();

        $data['sosmeds'] = $sosmed;
        $data['c_pillars'] = $content_pillar;
        $data['c_types'] = $content_type;

        return view('NewUser/content-planner/content-planners', $data);
    }

    public function add()
    {
        // $file = $this->request->getFile('file_content');

        // if ($file->isValid() && !$file->hasMoved()) {
        //     // Pindahkan file ke direktori tujuan, misalnya: 'uploads'
        //     $fileName = $file->getRandomName();
        //     $file->move(FCPATH . 'uploads/file_content/', $fileName);
        // } else {
        //     // Jika ada kesalahan dalam pengunggahan file
        //     $fileName = null;
        // }

        $caption = $this->request->getPost('caption');
        $caption = nl2br($caption); // Convert newlines to <br> before saving

        $data = [
            'link_gdrive' => $this->request->getPost('gdrive_link'),
            'sosial_media' => $this->request->getPost('sosial_media'),
            'content_type' => $this->request->getPost('content_type'),
            'content_pillar' => $this->request->getPost('content_pillar'),
            'status' => $this->request->getPost('status'),
            'caption' => $caption,
            'cta_link' => $this->request->getPost('cta_link'),
            'hashtag' => $this->request->getPost('hashtag'),
            'post_date' => $this->request->getPost('post_date'),
        ];

        $model = new ContentPlanner();
        $model->insert($data);

        return redirect()->to('/content-calendar');
    }

    public function edit($id)
    {
        $modelSosmed = new SosialMedia();
        $modelCPillar = new ContentPillar();
        $modelCType = new ContentType();
        $modelCPlanner = new ContentPlanner();

        $sosmed = $modelSosmed->findAll();
        $content_pillar = $modelCPillar->findAll();
        $content_type = $modelCType->findAll();
        $content_planner = $modelCPlanner->find($id);

        $data['sosmeds'] = $sosmed;
        $data['c_pillars'] = $content_pillar;
        $data['c_types'] = $content_type;
        $data['c_planners'] = $content_planner;

        return view('NewUser/content-planner/content-planners-edit', $data);
    }

    public function update($id)
    {
        $modelCPlanner = new ContentPlanner();

        // Ambil data dari input
        $gdriveLink = $this->request->getPost('gdrive_link');
        $status = $this->request->getPost('status'); // Ambil status dari form

        // Logika untuk menentukan nilai link_gdrive
        if ($status === 'Posted') {
            // Jika status adalah 'Posted', link_gdrive harus di-set ke null
            $linkGdrive = null;
        } elseif (!empty($gdriveLink)) {
            // Jika status bukan 'Posted', gunakan gdriveLink jika tersedia
            $linkGdrive = $gdriveLink;
        } else {
            // Jika tidak ada input untuk gdriveLink, gunakan nilai null
            $linkGdrive = null;
        }

        // Ambil data dari form
        $data = [
            'sosial_media'   => $this->request->getPost('sosial_media'),
            'content_type'   => $this->request->getPost('content_type'),
            'content_pillar' => $this->request->getPost('content_pillar'),
            'status'         => $status,
            'caption'        => $this->request->getPost('caption'),
            'cta_link'       => $this->request->getPost('cta_link'),
            'hashtag'        => $this->request->getPost('hashtag'),
            'post_date'      => $this->request->getPost('post_date'),
            'link_gdrive'    => $linkGdrive, // Update link_gdrive dengan nilai yang telah ditentukan
        ];

        // Update data di database
        $modelCPlanner->update($id, $data);

        // Redirect ke halaman content calendar setelah update
        return redirect()->to('/content-calendar');
    }

    public function delete($id)
    {
        $modelCPlanner = new ContentPlanner();

        $modelCPlanner->delete($id);

        return redirect()->to('/content-calendar');
    }

    public function all_setup()
    {
        $modelSosmed = new SosialMedia();
        $modelCPillar = new ContentPillar();
        $modelCType = new ContentType();

        $sosmed = $modelSosmed->findAll();
        $content_pillar = $modelCPillar->findAll();
        $content_type = $modelCType->findAll();

        $data['sosmeds'] = $sosmed;
        $data['c_pillars'] = $content_pillar;
        $data['c_types'] = $content_type;

        return view('NewUser/content-planner/set-up', $data);
    }

    protected $sosialMediaModel;
    protected $contentTypeModel;
    protected $contentPillarModel;

    public function __construct()
    {
        $this->sosialMediaModel = new SosialMedia();
        $this->contentTypeModel = new ContentType();
        $this->contentPillarModel = new ContentPillar();
    }

    public function add_sosial_media()
    {
        $data = [
            'nama_sosial_media' => $this->request->getPost('nama_sosial_media'),
            'warna_sosial_media' => $this->request->getPost('warna_sosial_media'),
        ];

        $this->sosialMediaModel->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function update_sosial_media()
    {
        $id = $this->request->getPost('id');
        $column = $this->request->getPost('column');
        $value = $this->request->getPost('value');

        if (in_array($column, ['nama_sosial_media', 'warna_sosial_media'])) {
            $this->sosialMediaModel->update($id, [$column => $value]);
            return $this->response
                ->setJSON(['status' => 'success'])
                ->setHeader('X-CSRF-Token', csrf_hash());
        }

        return $this->response
            ->setJSON(['status' => 'failed'])
            ->setStatusCode(400)
            ->setHeader('X-CSRF-Token', csrf_hash());
    }

    public function delete_sosial_media()
    {
        $id = $this->request->getPost('id');
        $this->sosialMediaModel->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function add_content_type()
    {
        $data = [
            'nama_content_type' => $this->request->getPost('nama_content_type'),
        ];

        $this->contentTypeModel->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function update_content_type()
    {
        $id = $this->request->getPost('id');
        $column = $this->request->getPost('column');
        $value = $this->request->getPost('value');

        if (in_array($column, ['nama_content_type'])) {
            $this->contentTypeModel->update($id, [$column => $value]);
            return $this->response
                ->setJSON(['status' => 'success'])
                ->setHeader('X-CSRF-Token', csrf_hash());
        }

        return $this->response
            ->setJSON(['status' => 'failed'])
            ->setStatusCode(400)
            ->setHeader('X-CSRF-Token', csrf_hash());
    }

    public function delete_content_type()
    {
        $id = $this->request->getPost('id');
        $this->contentTypeModel->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function add_content_pillar()
    {
        $data = [
            'nama_content_pillar' => $this->request->getPost('nama_content_pillar'),
        ];

        $this->contentPillarModel->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function update_content_pillar()
    {
        $id = $this->request->getPost('id');
        $column = $this->request->getPost('column');
        $value = $this->request->getPost('value');

        if (in_array($column, ['nama_content_pillar'])) {
            $this->contentPillarModel->update($id, [$column => $value]);
            return $this->response
                ->setJSON(['status' => 'success'])
                ->setHeader('X-CSRF-Token', csrf_hash());
        }

        return $this->response
            ->setJSON(['status' => 'failed'])
            ->setStatusCode(400)
            ->setHeader('X-CSRF-Token', csrf_hash());
    }

    public function delete_content_pillar()
    {
        $id = $this->request->getPost('id');
        $this->contentPillarModel->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function kpi()
    {
        $modelIGMetrics = new InstagramMetrics();
        $modelTTMetrics = new TiktokMetrics();
        $modelYTMetrics = new YoutubeMetrics();
        $modelFBMetrics = new FacebookMetrics();
        $modelPINMetrics = new PinterestMetrics();
        $modelLKDMetrics = new LinkedinMetrics();

        $igMetrics = $modelIGMetrics->findAll();
        $ttMetrics = $modelTTMetrics->findAll();
        $ytMetrics = $modelYTMetrics->findAll();
        $fbMetrics = $modelFBMetrics->findAll();
        $pinMetrics = $modelPINMetrics->findAll();
        $lkdMetrics = $modelLKDMetrics->findAll();

        $data['igMetrics'] = $igMetrics;
        $data['ttMetrics'] = $ttMetrics;
        $data['ytMetrics'] = $ytMetrics;
        $data['fbMetrics'] = $fbMetrics;
        $data['pinMetrics'] = $pinMetrics;
        $data['lkdMetrics'] = $lkdMetrics;

        return view('NewUser/content-planner/input-kpi', $data);
    }

    public function addTrend()
    {
        $trendName = $this->request->getPost('trend_name');
        $media = $this->request->getPost('media');
        $year = $this->request->getPost('year');

        if ($trendName && $media && $year) {
            $model = new TrendModel($media);
            $data = [
                'nama_trend' => $trendName,
                'created_at' => $year,
                'januari' => 0,
                'februari' => 0,
                'maret' => 0,
                'april' => 0,
                'mei' => 0,
                'juni' => 0,
                'juli' => 0,
                'agustus' => 0,
                'september' => 0,
                'oktober' => 0,
                'november' => 0,
                'desember' => 0
            ];
            $model->insert($data);

            $newCsrfToken = csrf_hash(); // Dapatkan token CSRF baru

            // Kembalikan data yang baru dimasukkan sebagai respons JSON
            return $this->response->setJSON([
                'status' => 'success',
                'data' => $data,
                'new_csrf_token' => $newCsrfToken // Kembalikan token CSRF baru
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Invalid input data.'
        ]);
    }

    public function updateTrend()
    {
        $newTrendName = $this->request->getPost('trend_name');
        $oldTrendName = $this->request->getPost('old_trend_name');
        $media = $this->request->getPost('media');
        $year = $this->request->getPost('year');

        $data = [
            'nama_trend' => $newTrendName,
            'januari' => $this->request->getPost('januari'),
            'februari' => $this->request->getPost('februari'),
            'maret' => $this->request->getPost('maret'),
            'april' => $this->request->getPost('april'),
            'mei' => $this->request->getPost('mei'),
            'juni' => $this->request->getPost('juni'),
            'juli' => $this->request->getPost('juli'),
            'agustus' => $this->request->getPost('agustus'),
            'september' => $this->request->getPost('september'),
            'oktober' => $this->request->getPost('oktober'),
            'november' => $this->request->getPost('november'),
            'desember' => $this->request->getPost('desember')
        ];

        $model = new TrendModel($media);
        $model->where('nama_trend', $oldTrendName)
            ->where('created_at', $year)
            ->set($data)
            ->update();

        $newCsrfToken = csrf_hash(); // Dapatkan token CSRF baru

        return $this->response->setJSON([
            'status' => 'success',
            'new_csrf_token' => $newCsrfToken // Kembalikan token CSRF baru
        ]);
    }

    public function deleteTrend()
    {
        $trendName = $this->request->getPost('trend_name');
        $media = $this->request->getPost('media');
        $year = $this->request->getPost('year');

        if ($trendName && $media && $year) {
            $model = new TrendModel($media);
            $model->where('nama_trend', $trendName)
                ->where('created_at', $year)
                ->delete();

            $newCsrfToken = csrf_hash(); // Dapatkan token CSRF baru

            return $this->response->setJSON([
                'status' => 'success',
                'new_csrf_token' => $newCsrfToken // Kembalikan token CSRF baru
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Invalid input data.'
        ]);
    }
}
