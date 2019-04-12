<?php

namespace App\Http\Middleware;

use App\Exceptions\GeneralException;
use Illuminate\Routing\Middleware\ThrottleRequests as Throttle;

class ThrottleRequests extends Throttle
{
    /**
     * Create a 'too many attempts' exception.
     *
     * @param string $key
     * @param int    $maxAttempts
     *
     * @return \Illuminate\Http\Exceptions\ThrottleRequestsException|void
     * @throws GeneralException
     */
    protected function buildException($key, $maxAttempts)
    {
        $retryAfter = $this->getTimeUntilNextRetry($key);
        // dd($retryAfter);
        $headers = $this->getHeaders(
            $maxAttempts,
            $this->calculateRemainingAttempts($key, $maxAttempts, $retryAfter),
            $retryAfter
        );

        throw new GeneralException(
            "Sorry, there have been more than 5 failed login attempts for this account. Try again in $retryAfter seconds or <b><a href='" . route('frontend.auth.password.reset') . "' >request a new password.</a></b>"
        );
    }
}
