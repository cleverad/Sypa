<?php

namespace OpenCart\Catalog\Controller\Startup;

use OpenCart\System\Engine\Action;
use OpenCart\System\Engine\Controller;

class ControllerStartupEvent extends Controller {
    public function index() {
        // Add events from the DB
        $this->load->model('setting/event');

        $results = $this->model_setting_event->getEvents();

        foreach ($results as $result) {
            // @todo Action sort order
            $this->event->register(substr($result['trigger'], strpos($result['trigger'], '/') + 1), new Action($result['action']), $result['sort_order']);
        }
    }
}
