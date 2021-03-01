<?php

namespace App\Models;

use CodeIgniter\Model;

class GamesModel extends Model
{
  protected $table = 'game';
  protected $useTimestamps = true;
  protected $allowedFields = ['nama', 'slug', 'genre', 'dev', 'rilis', 'versi', 'img'];

  public function getGames($slug = false)
  {
    if ($slug == false) {
      return $this->findAll();
    }
    return $this->where(['slug' => $slug])->first();
  }
}