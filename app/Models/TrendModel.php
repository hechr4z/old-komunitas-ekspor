<?php

namespace App\Models;

use CodeIgniter\Model;

class TrendModel extends Model
{
    protected $table;
    protected $allowedFields = [
        'nama_trend',
        'created_at',
        'januari',
        'februari',
        'maret',
        'april',
        'mei',
        'juni',
        'juli',
        'agustus',
        'september',
        'oktober',
        'november',
        'desember'
    ];

    public function __construct($media = null)
    {
        parent::__construct();

        if ($media) {
            $this->setTable('tb_metrics_' . $media);
        }
    }
}
