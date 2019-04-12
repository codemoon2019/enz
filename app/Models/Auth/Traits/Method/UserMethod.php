<?php

namespace App\Models\Auth\Traits\Method;

/**
 * Trait UserMethod.
 */
trait UserMethod
{
    /**
     * @return mixed
     */
    public function canChangeEmail()
    {
        return config('access.users.change_email');
    }

    /**
     * @return bool
     */
    public function canChangePassword()
    {
        return !app('session')->has(config('access.socialite_session_name'));
    }

    public function isAdminOrSystem()
    {
        return $this->hasAnyRole([
            config('access.users.system_role'),
            config('access.users.admin_role'),
        ]);
    }

    public function isHasSystemRole()
    {
        return $this->hasRole(config('access.users.system_role'));
    }


    public function picture($sizeName = 'original')
    {
        return $this->getPicture(false, $sizeName);
    }

    /**
     * @param bool   $size
     * @param string $sizeName
     *
     * @return bool|mixed|string
     * @throws \Creativeorange\Gravatar\Exceptions\InvalidEmailException
     */
    public function getPicture($size = false, $sizeName = 'original')
    {
        switch ($this->avatar_type) {
            case 'gravatar':
                if (!$size) {
                    $size = config('gravatar.default.size');
                }

                return gravatar()->get($this->email, ['size' => $size]);

            case 'storage':
                // return url('storage/'.$this->avatar_location);
                return $this->getFirstMediaUrl('images', $sizeName);
        }

        $social_avatar = $this->providers()->where('provider', $this->avatar_type)->first();
        if ($social_avatar && strlen($social_avatar->avatar)) {
            return $social_avatar->avatar;
        }

        return false;
    }

    /**
     * @param $provider
     *
     * @return bool
     */
    public function hasProvider($provider)
    {
        foreach ($this->providers as $p) {
            if ($p->provider == $provider) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function isSystem()
    {
        return $this->hasRole(config('access.users.system_role'));
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active == 1;
    }

    /**
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed == 1;
    }

    /**
     * @return bool
     */
    public function isPending()
    {
        return config('access.users.requires_approval') && $this->confirmed == 0;
    }
}
