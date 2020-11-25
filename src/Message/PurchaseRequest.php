<?php

namespace Omnipay\Telcell\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Telcell\Gateway;

/**
 * Class PurchaseRequest
 * @package Omnipay\Telcell\Message
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * Sets the request shop id.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setShopId(string $value)
    {
        return $this->setParameter('shopId', $value);
    }

    /**
     * Get the request shop id.
     * @return mixed
     */
    public function getShopId()
    {
        return $this->getParameter('shopId');
    }

    /**
     * Sets the request shop key.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setShopKey(string $value)
    {
        return $this->setParameter('shopKey', $value);
    }

    /**
     * Get the request shop key.
     * @return mixed
     */
    public function getShopKey()
    {
        return $this->getParameter('shopKey');
    }

    /**
     * Sets the request description.
     *
     * @param $value
     *
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setParameter('description', $value);
    }

    /**
     * Sets the request email.
     *
     * @param $value
     *
     * @return $this
     */
    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    /**
     * Get the request email
     * @return mixed
     */
    public function getEmail()
    {
        return $this->getParameter('email');
    }

    /**
     * Get the request description.
     * @return $this
     */
    public function getDescription()
    {
        return $this->getParameter('description');
    }

    /**
     * Sets the request bill issuer.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setBillIssuer(string $value)
    {
        return $this->setParameter('bill:issuer', $value);
    }

    /**
     * Get the request bill issuer.
     * @return $this
     */
    public function getBillIssuer()
    {
        return $this->getParameter('bill:issuer');
    }

    /**
     * Sets the request buyer.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setBuyer(string $value)
    {
        return $this->setParameter('buyer', $value);
    }

    /**
     * Get the request buyer.
     * @return $this
     */
    public function getBuyer()
    {
        return $this->getParameter('buyer');
    }

    /**
     * Sets the request Amount.
     *
     * @param $value
     *
     * @return mixed
     */
    public function setSum($value)
    {
        return $this->setParameter('sum', $value);
    }

    /**
     * Get Amount.
     * @return mixed
     */
    public function getSum()
    {
        return $this->getParameter('sum');
    }

    /**
     * Sets the request issuer id.
     *
     * @param $value
     *
     * @return mixed
     */
    public function setTransactionId($value)
    {
        return $this->setParameter('issuer_id', $value);
    }

    /**
     * Get Amount
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->getParameter('issuer_id');
    }

    /**
     * Sets the request valid days.
     *
     * @param $value
     *
     * @return mixed
     */
    public function setValidDays($value)
    {
        return $this->setParameter('valid_days', $value);
    }

    /**
     * Get valid days
     * @return mixed
     */
    public function getValidDays()
    {
        return $this->getParameter('valid_days');
    }

    /**
     * Set custom data to get back as is
     *
     * @param array $value
     *
     * @return $this
     */
    public function setInfo(array $value = [])
    {
        return $this->setParameter('info', $value);
    }

    /**
     * Get custom data
     * @return mixed
     */
    public function getInfo()
    {
        return $this->getParameter('info');
    }

    /**
     * Prepare data to send
     * @return array
     */
    public function getData()
    {
        $this->validate('shopId', 'shopKey', 'bill:issuer', 'buyer', 'sum', 'issuer_id', 'valid_days');

        return [
            'bill:issuer'     => $this->getShopId(),
            'buyer'           => $this->getEmail(),
            'currency'        => $this->getCurrency(),
            'sum'             => $this->getSum(),
            'description'     => $this->getDescription(),
            'issuer_id'       => $this->getTransactionId(),
            'valid_days'      => $this->getValidDays(),
            'info'            => $this->getInfo(),
        ];
    }

    /**
     * Send data and return response instance
     *
     * @param mixed $data
     *
     * @return \Omnipay\Common\Message\ResponseInterface|\Omnipay\Telcell\Message\PurchaseResponse
     */
    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }
}