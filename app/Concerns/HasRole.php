<?php
/**
 * ----------------------------------
 * The model that has uuid column
 * ----------------------------------
 * This will generate a new uuid when creating
 * a new model
 */
namespace App\Concerns;

use App\Enums\UserRole;

trait HasRole {

    public function role()
    {
        return UserRole::name($this->role);
    }
    /**
     * Determine if the authenticated user is Admin
     * 
     * @return bool
     */
    public function isAdmin()
    {
        return (bool)$this->role === (bool)UserRole::ADMIN;
    }

    /**
     * Determine if the authenticated user is normal user
     * 
     * @return bool
     */
    public function isUser()
    {
        return (bool)$this->role === (bool)UserRole::USER;
    }

    /**
     * Make this user as Admin
     */
    public function toAdmin()
    {
        if (! $this->isAdmin()) {
            $this->role = UserRole::ADMIN;
        }

        return $this;
    }

    /**
     * Make this Admin User as normal User
     */
    public function toUser()
    {
        if ($this->isAdmin()) {
            $this->role = UserRole::USER;
        }

        return $this;
    }
}