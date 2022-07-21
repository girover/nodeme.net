<?php

namespace App\Enums;

class WebhookStatus extends Enum {

    /**
     * The charge is created
     */
    const CHARGE_CREATED = 'charge:created';
    /**
     * The charge is confirmed
     */
    const CHARGE_CONFIRMED  = 'charge:confirmed';
    /**
     * The charge is delayed
     */
    const CHARGE_DELAYED  = 'charge:delayed';
    /**
     * The charge is pending
     */
    const CHARGE_PENDING  = 'charge:pending';
    /**
     * The charge is failed
     */
    const CHARGE_FAILED  = 'charge:failed';
    /**
     * The charge is resolved
     */
    const CHARGE_RESOLVED  = 'charge:resolved';

}