<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property string bank_name
 * @property string account_name
 * @property string account_number
 * @property string account_iban
 */
class BankAccount extends Model
{
    protected $table = 'bank_accounts';
    protected $fillable = ['bank_name','account_name','account_number','account_iban'];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bank_name;
    }

    /**
     * @param string $bank_name
     */
    public function setBankName(string $bank_name): void
    {
        $this->bank_name = $bank_name;
    }

    /**
     * @return string
     */
    public function getAccountName(): string
    {
        return $this->account_name;
    }

    /**
     * @param string $account_name
     */
    public function setAccountName(string $account_name): void
    {
        $this->account_name = $account_name;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->account_number;
    }

    /**
     * @param string $account_number
     */
    public function setAccountNumber(string $account_number): void
    {
        $this->account_number = $account_number;
    }

    /**
     * @return string
     */
    public function getAccountIban(): string
    {
        return $this->account_iban;
    }

    /**
     * @param string $account_iban
     */
    public function setAccountIban(string $account_iban): void
    {
        $this->account_iban = $account_iban;
    }


}
