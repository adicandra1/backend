<?php namespace App\Controllers\PortalHRD;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Libraries\View\TemplateEngine;
use App\Models\UserModel;
use App\Views\PortalHRD\DataContract\UserDataContract;
use App\Views\PortalHRD\Users\PermissionList;
use App\Views\PortalHRD\Users\UserList;
use App\Views\PortalHRD\ViewRoutesContract;
use Config\Services;
use Myth\Auth\Authorization\FlatAuthorization;

class Users extends BaseController
{
    private FlatAuthorization $flatAuthorization;

    private UserModel $userModel;

    public function __construct() {
        $this->flatAuthorization = Services::authorization();
        $this->userModel = model('UserModel');
    }

    /**
     * GET Request
     * Show permissionList view with assigned group
     * with addPermission form modal and confirm delete modal
     */
    public function permissionList() {
        return TemplateEngine::view(new PermissionList(
            "Permission List",
            UserDataContract::withMockData()
        ));

    }

    /**
     * POST request
     * add posted permission to the database
     */
    public function addPermission() {
        if(isset($_POST['name']) && isset($_POST['description'])) {
            
            //add posted permission to the database
            $permissionId = $this->flatAuthorization->createPermission($_POST['name'], $_POST['description']);
            if(is_int($permissionId)) {
                //if success redirect to permissionList with success message
                return redirect()->route(ViewRoutesContract::PORTALHRD_MANAGEUSER_PERMISSIONLIST)->with('message', lang('Auth.forgotEmailSent'));
            }
            
            //if fail show addPermission form with error
        }
        
    }

    /**
     * GET request
     * delete selected permission
     */
    public function deletePermission($permissionId) {
        //delete selected permission
        if($this->flatAuthorization->deletePermission($permissionId)) {
            //if success redirect to permissionList with success message
        } else {
            //if fail redirect to permissionList with error
        }
    }

    /**
     * GET request
     * show user list view with associated group and permissions
     * with addUser form modal and confirm delete modal
     */
    public function userList() {
        return TemplateEngine::view(new UserList("User List", UserDataContract::withMockData()));
    }

    /**
     * POST request
     * save posted data to database
     */
    public function addUser() {

		$users = model('UserModel');

		// Validate here first, since some things,
		// like the password, can only be validated properly here.
		$rules = [
			'username'  	=> 'required|alpha_numeric_space|min_length[3]|is_unique[users.username]',
			'email'			=> 'required|valid_email|is_unique[users.email]',
			'password'	 	=> 'required|strong_password',
			'pass_confirm' 	=> 'required|matches[password]',
		];

		if (! $this->validate($rules))
		{
			return redirect()->route(ViewRoutesContract::PORTALHRD_MANAGEUSER_USERLIST)->withInput()->with('errors', service('validation')->getErrors());
		}

		// Save the user
		$allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
		$user = new User($this->request->getPost($allowedPostFields));

		$this->config->requireActivation !== false ? $user->generateActivateHash() : $user->activate();

		// Ensure default group gets assigned if set
        if (! empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }

		if (! $users->save($user))
		{
			return redirect()->route(ViewRoutesContract::PORTALHRD_MANAGEUSER_USERLIST)->withInput()->with('errors', $users->errors());
		}

		if ($this->config->requireActivation !== false)
		{
			$activator = service('activator');
			$sent = $activator->send($user);

			if (! $sent)
			{
				return redirect()->route(ViewRoutesContract::PORTALHRD_MANAGEUSER_USERLIST)->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
			}

			// Success!
			return redirect()->route(ViewRoutesContract::PORTALHRD_MANAGEUSER_USERLIST)->with('message', lang('Auth.activationSuccess'));
		}

		// Success!
		return redirect()->route(ViewRoutesContract::PORTALHRD_MANAGEUSER_USERLIST)->with('message', lang('Auth.registerSuccess'));
        //if success redirect to UserList with success message
        //if fail show addUser form with error
    }

    /**
     * GET request
     * delete selected user by id
     */
    public function deleteUser($userId) {

        $this->userModel->delete($userId);
        //delete selected user
        //if success redirect to UserList with success message
        //if fail redirect to UserList with error
    }

    /**
     * GET request
     * show groupList view with associated permissions
     * with addGroup form modal and confirm delete modal
     */
    public function groupList() {
        //show the group List

    }

    /**
     * POST request
     * save posted data to database
     */
    public function addGroup() {
        //save group to database.
        
        //if success redirect to groupList with success message
        //if fail show addGroup form with error
    }

    /**
     * GET request
     * delete selected group by id
     */
    public function deleteGroup($groupId) {
        //delete selected user
        //if success redirect to groupList with success message
        //if fail redirect to groupList with error
    }
}