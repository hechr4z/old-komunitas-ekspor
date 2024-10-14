<?php

namespace App\Models;

use CodeIgniter\Model;


class LinkFounderModels extends Model
{
    protected $table = 'tb_link_founder';
    protected $primaryKey = 'id_link_founder';
    protected $returnType = 'object';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'nama_link_founder',
        'icon_link_founder',
        'link_founder',
        'id_founder',  // Make sure this is included
    ];

    public function getLinkFounderWithCategory($id)
{
    // Modify this method to remove the join with `tb_kategori_link`
    return $this->select('tb_link_founder.*')
                ->where('tb_link_founder.id_link_founder', $id)
                ->first();
}

public function getRelatedLinks($id, $categoryId)
{
    // Modify this method to remove the join with `tb_kategori_link`
    return $this->select('tb_link_founder.*')
                ->where('tb_link_founder.id_link_founder !=', $id)
                ->findAll();
}

public function getAllLinksWithCategory()
{
    return $this->select('tb_link_founder.*, tb_founder.nama_founder')
                ->join('tb_founder', 'tb_link_founder.id_founder = tb_founder.id_founder', 'left')
                ->findAll();
}

}