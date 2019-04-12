<?php

namespace App\Models\Auth\Traits\Attribute;

/**
 * Trait UserAttribute.
 */
trait UserAttribute
{
    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<span class='badge badge-success'>" . __('labels.general.active') . '</span>';
        }

        return "<span class='badge badge-danger'>" . __('labels.general.inactive') . '</span>';
    }

    /**
     * @return string
     */
    public function getConfirmedLabelAttribute()
    {
        if ($this->isConfirmed()) {
            if ($this->id != 1 && $this->id != auth()->id()) {
                return '<a href="' . route(
                        'admin.auth.users.unconfirm',
                        $this
                    ) . '" data-toggle="tooltip" data-placement="top" title="' . __('buttons.backend.access.users.unconfirm') . '" name="confirm_item"><span class="badge badge-success" style="cursor:pointer">' . __('labels.general.yes') . '</span></a>';
            } else {
                return '<span class="badge badge-success">' . __('labels.general.yes') . '</span>';
            }
        }

        return '<a href="' . route('admin.auth.users.confirm',
                $this) . '" data-toggle="tooltip" data-placement="top" title="' . __('buttons.backend.access.users.confirm') . '" name="confirm_item"><span class="badge badge-danger" style="cursor:pointer">' . __('labels.general.no') . '</span></a>';
    }

    /**
     * @return string
     */
    public function getRolesLabelAttribute()
    {
        $roles = $this->getRoleNames()->toArray();

        if (count($roles)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item);
            }, $roles));
        }

        return 'N/A';
    }

    /**
     * @return string
     */
    public function getPermissionsLabelAttribute()
    {
        $permissions = $this->getDirectPermissions()->toArray();

        if (count($permissions)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item['name']);
            }, $permissions));
        }

        return 'N/A';
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->last_name
            ? $this->first_name . ' ' . $this->last_name
            : $this->first_name;
    }

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->full_name;
    }

    // /**
    //  * @return mixed
    //  */
    // public function getPictureAttribute()
    // {
    //     return $this->getPicture();
    // }

    /**
     * @return string
     */
    public function getSocialButtonsAttribute()
    {
        $accounts = [];

        foreach ($this->providers as $social) {
            $accounts[] = '<a href="' . route(
                    'admin.auth.users.social.unlink',
                    [$this, $social]
                ) . '" data-toggle="tooltip" data-placement="top" title="' . __('buttons.backend.access.users.unlink') . '" data-method="delete"><i class="fa fa-' . $social->provider . '"></i></a>';
        }

        return count($accounts) ? implode(' ', $accounts) : 'None';
    }

    /**
     * @return string
     */
    public function getLoginAsButtonAttribute()
    {
        /*
         * If the admin is currently NOT spoofing a user
         */
        if (!session()->has('admin_user_id') || !session()->has('temp_user_id')) {
            //Won't break, but don't let them "Login As" themselves
            if ($this->id != auth()->id()) {
                return '<a href="' . route(
                        'admin.auth.users.login-as',
                        $this
                    ) . '" class="dropdown-item">' . __('buttons.backend.access.users.login_as',
                        ['user' => $this->full_name]) . '</a> ';
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getClearSessionButtonAttribute()
    {
        if ($this->id != auth()->id() && config('session.driver') == 'database') {
            return '<a href="' . route('admin.auth.users.clear-session', $this) . '"
			 	 data-trans-button-cancel="' . __('buttons.general.cancel') . '"
                 data-trans-button-confirm="' . __('buttons.general.continue') . '"
                 data-trans-title="' . __('strings.backend.general.are_you_sure') . '"
                 class="dropdown-item" name="confirm_item">' . __('buttons.backend.access.users.clear_session') . '</a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="' . route('admin.auth.users.show',
                $this) . '" class="btn btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.view') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.auth.users.edit',
                $this) . '" class="btn btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getChangePasswordButtonAttribute()
    {
        return '<a href="' . route('admin.auth.users.change-password',
                $this) . '" class="dropdown-item">' . __('buttons.backend.access.users.change_password') . '</a> ';
    }

    /**
     * @return string
     */
    public function getStatusButtonAttribute()
    {
        if ($this->id != auth()->id()) {
            switch ($this->active) {
                case 0:
                    return '<a href="' . route('admin.auth.users.mark', [
                            $this,
                            1,
                        ]) . '" class="dropdown-item">' . __('buttons.backend.access.users.activate') . '</a> ';

                case 1:
                    return '<a href="' . route('admin.auth.users.mark', [
                            $this,
                            0,
                        ]) . '" class="dropdown-item">' . __('buttons.backend.access.users.deactivate') . '</a> ';

                default:
                    return '';
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getConfirmedButtonAttribute()
    {
        if (!$this->isConfirmed() && !config('access.users.requires_approval')) {
            return '<a href="' . route('admin.auth.users.account.confirm.resend',
                    $this) . '" class="dropdown-item">' . __('buttons.backend.access.users.resend_email') . '</a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id != auth()->id() && $this->id != 1) {
            return '<a href="' . route('admin.auth.users.destroy', $this) . '"
                 data-method="delete"
                 data-trans-button-cancel="' . __('buttons.general.cancel') . '"
                 data-trans-button-confirm="' . __('buttons.general.crud.delete') . '"
                 data-trans-title="' . __('strings.backend.general.are_you_sure') . '"
                 class="dropdown-item">' . __('buttons.general.crud.delete') . '</a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="' . route('admin.auth.users.delete-permanently',
                $this) . '" name="confirm_item" class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . __('buttons.backend.access.users.delete_permanently') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="' . route('admin.auth.users.restore',
                $this) . '" name="confirm_item" class="btn btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . __('buttons.backend.access.users.restore_user') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return '
				<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
				  ' . $this->restore_button . '
				  ' . $this->delete_permanently_button . '
				</div>';
        }

        return '
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  ' . $this->show_button . '
		  ' . $this->edit_button . '
		
		  <div class="btn-group btn-group-sm" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">
			  ' . $this->clear_session_button . '
			  ' . $this->login_as_button . '
			  ' . $this->change_password_button . '
			  ' . $this->status_button . '
			  ' . $this->confirmed_button . '
			  ' . $this->delete_button . '
			</div>
		  </div>
		</div>';
    }
}
