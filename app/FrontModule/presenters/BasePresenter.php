<?php

namespace App\FrontModule\Presenters;

use App\AdminModule\Repositories\AccessRepository;
use App\Entities\ArticleEntity;
use App\FrontModule\components\IMenuFactory;
use App\FrontModule\components\ISliderFactory;
use App\FrontModule\components\Slider;
use App\Model\AccessModel;
use Tracy\Debugger;


/**
 * Base presenter for all application presenters.
 */
class BasePresenter extends \App\Presenters\BasePresenter
{

    /** @var \DK\Menu\UI\IControlFactory @inject */
    public $menuFactory;


    protected $description = "Přírodní produkty pro vaše zdraví.";
    protected $keywords = "Pro zdraví, zdravíčko, pevné zdraví, pro zdravíčko, pro pevné zdraví";

    protected function startup()
    {
        parent::startup();

        $this->template->robots = "index, follow";
        $this->template->description = $this->description;
        $this->template->keywords = $this->keywords;
        $this->template->title = "sdfwf";

        // @todo předělat podmínku zobrazení google analytics z nalogovaného uživatele na oprávněného uživatele pto toto zobrazení
        $this->template->googleAnalytics = (!Debugger::$productionMode || $this->getUser()->isLoggedIn())
            ? false
            : true;

    }


    private function _saveUserVisitedInfo()
    {
        if (Debugger::$productionMode && !$this->isAjax()) {
            $this->accessRepository->add();
        }
    }


    /**
     * @return \DK\Menu\UI\Control
     */
    protected function createComponentMenu()
    {
        return $this->menuFactory->create();
    }


}
