<?php
/*
 * Spring Signage Ltd - http://www.springsignage.com
 * Copyright (C) 2015 Spring Signage Ltd
 * (ChangeLayoutAction.php)
 */


namespace Xibo\XMR;


class ChangeLayoutAction extends PlayerAction
{
    public $layoutId;
    public $duration;
    public $downloadRequired;

    /**
     * Set details for this layout
     * @param int $layoutId the layoutId to change to
     * @param int $duration the duration this layout should be shown
     * @param bool|false $downloadRequired flag indicating whether a download is required before changing to the layout
     * @return $this
     */
    public function setLayoutDetails($layoutId, $duration = 0, $downloadRequired = false)
    {
        $this->layoutId = $layoutId;
        $this->duration = $duration;
        $this->downloadRequired = $downloadRequired;

        return $this;
    }

    public function getMessage()
    {
        $this->action = 'changeLayout';

        if ($this->layoutId == 0)
            throw new PlayerActionException('Layout Details not provided');

        return $this->serializeToJson(['layoutId', 'duration', 'downloadRequired']);
    }
}