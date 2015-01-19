<?php

class Url {

    private $domain;
    private $ssl;
    private $rewrite = array();
    private $request = null;

    public function __construct($domain, $ssl = '', $request = null) {
        $this->domain = $domain;
        $this->ssl = $ssl;
        $this->request = $request;
    }

    public function addRewrite($rewrite) {
        $this->rewrite[] = $rewrite;
    }

    public function getFilters() {
        $url = '';

        if (isset($this->request->get['filter_name'])) {
            $url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_model'])) {
            $url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_price'])) {
            $url .= '&filter_price=' . $this->request->get['filter_price'];
        }

        if (isset($this->request->get['filter_quantity'])) {
            $url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
        }

        if (isset($this->request->get['filter_status'])) {
            $url .= '&filter_status=' . $this->request->get['filter_status'];
        }

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
            $url .= '&order=' . $this->request->get['order'];
        }

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }
        if (isset($this->request->get['target'])) {
            $url .= '&target=' . $this->request->get['target'];
        }

        if (isset($this->request->get['thumb'])) {
            $url .= '&thumb=' . $this->request->get['thumb'];
        }
        if (isset($this->request->get['directory'])) {
			$url .= '&directory=' . urlencode($this->request->get['directory']);
		}

        return $url;
    }

    public function link($route, $args = '', $secure = false) {
        if (!$secure) {
            $url = $this->domain;
        } else {
            $url = $this->ssl;
        }

        $url .= 'index.php?route=' . $route;

        if ($args) {
            $url .= str_replace('&', '&amp;', '&' . ltrim($args, '&'));
        }

        foreach ($this->rewrite as $rewrite) {
            $url = $rewrite->rewrite($url);
        }

        return $url;
    }

}
