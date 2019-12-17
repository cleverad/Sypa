<?php

namespace Sypa\Catalog\Controller\Checkout;

use OpenCart\System\Engine\Controller;

class ControllerCheckoutSuccess extends Controller {
    public function index() {
        $this->load->language('checkout/success');

        if (isset($this->session->data['order_id'])) {
            $this->cart->clear();

            unset($this->session->data['shipping_method']);
            unset($this->session->data['shipping_methods']);
            unset($this->session->data['payment_method']);
            unset($this->session->data['payment_methods']);
            unset($this->session->data['guest']);
            unset($this->session->data['comment']);
            unset($this->session->data['order_id']);
            unset($this->session->data['coupon']);
            unset($this->session->data['reward']);
            unset($this->session->data['voucher']);
            unset($this->session->data['vouchers']);
            unset($this->session->data['totals']);
        }

        $this->document->setTitle($this->language->get('heading_title'));

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'language=' . $this->config->get('config_language'))
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_basket'),
            'href' => $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'))
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_checkout'),
            'href' => $this->url->link('checkout/checkout', 'language=' . $this->config->get('config_language'))
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_success'),
            'href' => $this->url->link('checkout/success', 'language=' . $this->config->get('config_language'))
        );

        if ($this->customer->isLogged()) {
            $data['text_message'] = sprintf($this->language->get('text_customer'), $this->url->link('account/account', 'language=' . $this->config->get('config_language')), $this->url->link('account/order', 'language=' . $this->config->get('config_language')), $this->url->link('account/download', 'language=' . $this->config->get('config_language')), $this->url->link('information/contact', 'language=' . $this->config->get('config_language')));
        } else {
            $data['text_message'] = sprintf($this->language->get('text_guest'), $this->url->link('information/contact', 'language=' . $this->config->get('config_language')));
        }

        $data['continue'] = $this->url->link('common/home', 'language=' . $this->config->get('config_language'));

        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $this->response->setOutput($this->load->view('common/success', $data));
    }
}
