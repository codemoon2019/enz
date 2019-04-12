# Core Boilerplate - v2.1.0-alpha1.0.2

## Requirements:
- PHP >= 7.1.3

## Installing

* Download this repo
	* [download link for LATEST release v2.1.0-alpha1.0.2](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v2.1.0-alpha1.0.2.zip)
	* [download link for release v2.1.0-alpha1.0.1](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v2.1.0-alpha1.0.1.zip)
	* [download link for release v2.1.0-alpha1.0.0](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v2.1.0-alpha1.0.0.zip)
	* [download link for release v2.0.0 (laravel 5.7)](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v2.0.0.zip)
	* [download link for release v1.0.16](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.16.zip)
	* [download link for release v1.0.15](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.15.zip)
	* [download link for release v1.0.14](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.14.zip)
	* [download link for release v1.0.13](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.13.zip)
	* [download link for release v1.0.12](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.12.zip)
	* [download link for release v1.0.11](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.11.zip)
	* [download link for release v1.0.10](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.10.zip)
	* [download link for release v1.0.9](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.9.zip)
	* [download link for release v1.0.8](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.8.zip)
	* [download link for release v1.0.7](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.7.zip)
	* [download link for release v1.0.6](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.6.zip)
	* [download link for release v1.0.5](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.5.zip)
	* [download link for release v1.0.4](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.4.zip)
	* [download link for release v1.0.3](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.3.zip)
	* [download link for release v1.0.2](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.2.zip)
	* [download link for release v1.0.1](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.1.zip)
	* [download link for release v1.0.0](https://bitbucket.org/halcyonlaravel/core-boilerplate/get/v1.0.0.zip)
	* 
* Commands for better start (terminal should on current project directory which is first run on local develop)
	* git init
	* git flow init # just enter recursively, [troubleshoot] sudo apt-get install git-flow
	* git remote add origin <remote-url>
	* git add . && git commit -sm "init" && git push origin --all
	* cp .env.example .env # then set your developing environment
	* composer install
	* php artisan key:generate
	* php artisan migrate --seed

# Changelog
	v1.0.13 - Enhance cache in service by adding abstract class, easy manage caching with cache tags, fix other minor stressfull issues.
	v1.0.9
		* Fixex
			- fix dropzone limits files uploaded issue @mark.halcyondigital@gmail.com
			- fix loader @ronaOla
	v1.0.8 
		* Fixex
			- Add Model Helper
			- Manage permission on nav
			- New Observer for repos CRUD.
	v1.0.7 - Bug fix, included new root folder for test file seeder
	v1.0.6
		* Fixes
			- Add menu when creating page.
			- Fix then add imagable on profile/account image
	v1.0.5 
		* Fixes
	 		- Add `leaf` on navbar.
	 		- Return Admin permission with user/role access.
	 		- System role will not access by Admin role.
	 		- Fix add image on pages.
	 		- Fix category manage.
	 		- Fix Buttons click
	v1.0.4 
		* Fixes
	 		- Article removed.
	 		- Fix Typo.
	 		- Move Inquries under Category.
	 		- Manage cache
	 		- Clean folder with uploaded files when seed.
	 		- add no script warning.
	 		- When updating menu, need to reset cache on menu
	 		- .h1 to .caption-content in slider index
	 		- Manage Role, and permissions.
	 		- Update seeder for production
	 		- All mail is Queueable ready
	v1.0.3 
		* Fixes
	 		- cache on menu when update status on pages.
			- See halcyon-laravel/module v1.0.4 and halcyon-laravel/base v1.0.6
	v1.0.2 - Major update, then all halcyon module has recently relesed for this version.
	v1.0.1 - Add `slug` on `users`.

# Changing Assets
	Backend Core JS/CSS - set on production
	Frontend Core JS/CSS 
		- change bootstrap version
		- set on production
## Created css helpers in _global.scss
## Summary
	Backend
		- Bootstrap 4 JS
		- Bootstrap 4 CSS
	Frontend
		- Bootstrap 3 JS
		- Bootstrap 3 CSS
	Views - affected inputs
		Frontend
			* layouts
				- app.blade.php
			* includes
			 	- nav.blade.php
			* auth
				- login.blade.php
				- register.blade.php
				* password
					- email.blade.php
					- expired.blade.php
					- reset.blade.php
			* user 
				* account 
					* tabs
						- change-password.blade.php
						- edit.blade.php
						- profile.blade.php
				- account.blade.php
				- dashboard.blade.php
#User Table Seeder
 - System
 	- email : system@system.com
 	- password: 1234
 - Admin
 	- email : admin@admin.com
 	- password: 1234
 - Anonymous
 	- email : user@user.com
 	- password: 1234

# Throttle Request 
	>> Having maximum attempts when logging in.
	- ThrottleRequest.php
	- middleware