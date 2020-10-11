## Install

Task management Cement can be cloned from repository and installed. Following the procedure given below:

* git clone `git@github.com:monca13/task-management.git`
* cd `task-management`

## Run

The app can be run with the command below:

* Copy .env file `cp .env.example .env`
* install the application dependencies using command: `composer install`
* Update database
* Run migration: `php artisan migrate`
* Run seeders `php artisan db:seed`
* use command `php artisan serve` to start the server (--port can be optional)
* access `http://localhost:8000` - login and registration

Basic Info
* Basic laravel auth used for authentication
* Adminlte3 for dashboard
* Prettus-l5 repository used for repository design pattern
* Admin login - email: admin@admin.com password :password

Roles
* Admin can add, list , update and assign task
* Normal user can see the list of assigned task and update status of task


