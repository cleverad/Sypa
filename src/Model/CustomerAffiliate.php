<?php

declare(strict_types=1);

namespace Sypa\Model;

use Sypa\Exception\InvalidResourceIdentifierException;
use Sypa\Exception\InvalidStringLengthException;

class CustomerAffiliate {
    /**
     * @var int
     */
    private $customer_id;
    /**
     * @var string
     */
    private $company;
    /**
     * @var string
     */
    private $website;
    /**
     * @var string
     */
    private $tracking;
    /**
     * @var float
     */
    private $commission;
    /**
     * @var string
     */
    private $tax;
    /**
     * @var string
     */
    private $payment;
    /**
     * @var string
     */
    private $cheque;
    /**
     * @var string
     */
    private $paypal;
    /**
     * @var string
     */
    private $bank_name;
    /**
     * @var string
     */
    private $bank_branch_number;
    /**
     * @var string
     */
    private $bank_swift_code;
    /**
     * @var string
     */
    private $bank_account_name;
    /**
     * @var string
     */
    private $bank_account_number;
    /**
     * @var string
     */
    private $custom_field;
    /**
     * @var bool
     */
    private $status;
    /**
     * @var \DateTimeImmutable
     */
    private $date_added;

    /**
     * @param int $customer_id
     * @param string $company
     * @param string $website
     * @param string $tracking
     * @param float $commission
     * @param string $tax
     * @param string $payment
     * @param string $cheque
     * @param string $paypal
     * @param string $bank_name
     * @param string $bank_branch_number
     * @param string $bank_swift_code
     * @param string $bank_account_name
     * @param string $bank_account_number
     * @param string $custom_field
     * @param bool $status
     * @param \DateTimeImmutable $date_added
     */
    public function __construct(
        int $customer_id,
        string $company,
        string $website,
        string $tracking,
        float $commission,
        string $tax,
        string $payment,
        string $cheque,
        string $paypal,
        string $bank_name,
        string $bank_branch_number,
        string $bank_swift_code,
        string $bank_account_name,
        string $bank_account_number,
        string $custom_field,
        bool $status,
        \DateTimeImmutable $date_added
    ) {
        if ($customer_id < 1) {
            throw new InvalidResourceIdentifierException(sprintf(
                "Customer ID must be a positive integer. ID %s received.",
                $customer_id
            ));
        }

        if (\mb_strlen($company) > 40) {
            throw new InvalidStringLengthException(sprintf(
                "Company must be 40 or fewer characters. Length %s received.",
                \mb_strlen($company)
            ));
        }

        if (\mb_strlen($website) > 255) {
            throw new InvalidStringLengthException(sprintf(
                "Website must be 255 or fewer characters. Length %s received.",
                \mb_strlen($company)
            ));
        }

        if (\mb_strlen($tracking) > 64) {
            throw new InvalidStringLengthException(sprintf(
                "Tracking must be 64 or fewer characters. Length %s received.",
                \mb_strlen($tracking)
            ));
        }

        if (\mb_strlen($tax) > 64) {
            throw new InvalidStringLengthException(sprintf(
                "Tax must be 64 or fewer characters. Length %s received.",
                \mb_strlen($tax)
            ));
        }

        if (\mb_strlen($payment) > 6) {
            throw new InvalidStringLengthException(sprintf(
                "Payment must be 6 or fewer characters. Length %s received.",
                \mb_strlen($payment)
            ));
        }

        if (\mb_strlen($cheque) > 100) {
            throw new InvalidStringLengthException(sprintf(
                "Cheque must be 100 or fewer characters. Length %s received.",
                \mb_strlen($cheque)
            ));
        }

        if (\mb_strlen($paypal) > 64) {
            throw new InvalidStringLengthException(sprintf(
                "Paypal must be 64 or fewer characters. Length %s received.",
                \mb_strlen($paypal)
            ));
        }

        if (\mb_strlen($bank_name) > 64) {
            throw new InvalidStringLengthException(sprintf(
                "Bank Name must be 64 or fewer characters. Length %s received.",
                \mb_strlen($bank_name)
            ));
        }

        if (\mb_strlen($bank_branch_number) > 64) {
            throw new InvalidStringLengthException(sprintf(
                "Bank Branch Number must be 64 or fewer characters. Length %s received.",
                \mb_strlen($bank_branch_number)
            ));
        }

        if (\mb_strlen($bank_swift_code) > 64) {
            throw new InvalidStringLengthException(sprintf(
                "Bank Swift Code must be 64 or fewer characters. Length %s received.",
                \mb_strlen($bank_swift_code)
            ));
        }

        if (\mb_strlen($bank_account_name) > 64) {
            throw new InvalidStringLengthException(sprintf(
                "Bank Account Name must be 64 or fewer characters. Length %s received.",
                \mb_strlen($bank_account_name)
            ));
        }

        if (\mb_strlen($bank_account_number) > 64) {
            throw new InvalidStringLengthException(sprintf(
                "Bank Account Number must be 64 or fewer characters. Length %s received.",
                \mb_strlen($bank_account_number)
            ));
        }

        $this->customer_id = $customer_id;
        $this->company = $company;
        $this->website = $website;
        $this->tracking = $tracking;
        $this->commission = $commission;
        $this->tax = $tax;
        $this->payment = $payment;
        $this->cheque = $cheque;
        $this->paypal = $paypal;
        $this->bank_name = $bank_name;
        $this->bank_branch_number = $bank_branch_number;
        $this->bank_swift_code = $bank_swift_code;
        $this->bank_account_name = $bank_account_name;
        $this->bank_account_number = $bank_account_number;
        $this->custom_field = $custom_field;
        $this->status = $status;
        $this->date_added = $date_added;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int {
        return $this->customer_id;
    }

    /**
     * @return string
     */
    public function getCompany(): string {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getWebsite(): string {
        return $this->website;
    }

    /**
     * @return string
     */
    public function getTracking(): string {
        return $this->tracking;
    }

    /**
     * @return float
     */
    public function getCommission(): float {
        return $this->commission;
    }

    /**
     * @return string
     */
    public function getTax(): string {
        return $this->tax;
    }

    /**
     * @return string
     */
    public function getPayment(): string {
        return $this->payment;
    }

    /**
     * @return string
     */
    public function getCheque(): string {
        return $this->cheque;
    }

    /**
     * @return string
     */
    public function getPaypal(): string {
        return $this->paypal;
    }

    /**
     * @return string
     */
    public function getBankName(): string {
        return $this->bank_name;
    }

    /**
     * @return string
     */
    public function getBankBranchNumber(): string {
        return $this->bank_branch_number;
    }

    /**
     * @return string
     */
    public function getBankSwiftCode(): string {
        return $this->bank_swift_code;
    }

    /**
     * @return string
     */
    public function getBankAccountName(): string {
        return $this->bank_account_name;
    }

    /**
     * @return string
     */
    public function getBankAccountNumber(): string {
        return $this->bank_account_number;
    }

    /**
     * @return string
     */
    public function getCustomField(): string {
        return $this->custom_field;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool {
        return $this->status;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
