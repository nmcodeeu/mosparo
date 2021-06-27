<?php

namespace Mosparo\Controller\ProjectRelated;

use Mosparo\Helper\ProjectHelper;
use Mosparo\Entity\Project;

trait ProjectRelatedTrait
{
    /**
     * @var Mosparo\Helper\ProjectHelper
     */
    protected $projectHelper;

    public function setProjectHelper(ProjectHelper $projectHelper)
    {
        $this->projectHelper = $projectHelper;
    }

    public function getActiveProject(): Project
    {
        return $this->projectHelper->getActiveProject();
    }
}