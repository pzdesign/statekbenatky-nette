<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form,
    Nette\Forms\Controls,
    Nette\Application\UI;

class AktualityPresenter extends Nette\Application\UI\Presenter
{

    /** @var Nette\Database\Context */
    private $database;
    private $kategorie;
    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

    public function renderDefault()
    {
        $this->kategorie = 'aktuality';
        $this->template->posts = $this->database->table('posts')->order('created_at DESC')->where('category = ?', $this->kategorie);
    }

    public function renderShow($postId)
    {
        $this->template->post = $this->database->table('posts')->get($postId);
    }
}