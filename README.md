## ECNU Back-End Application 

PROJECT NAME: Management System 

CLIENT NAME: Elderly Care Network Uganda (ecnu)

PROJECT TYPE:Deployment
 
DATE: 18/03/2024

PROJECT LINK: https://github.com/HENRY-2016/ecnu

DEVELOPER:		MogaHenze
                   +256 701 243 139
                   +256 771 977 854
 
EMAIL:			henryatubuntu@gmail.com
 
COPYRIGHT BY:		mogahenze.com
 
WEBSITE:			https://mogahenze.com

## Frame Works Used
    -   Laravel 10
    -   Bootstrap 5
    -   Jquery
    -   HTML5
    -   Javascript
    -   MySql
    -   Laravel Breeze
            https://laravel.com/docs/10.x/starter-kits

    -   Localization
            https://laravel.com/docs/10.x/localization
    - Carbon
        https://carbon.nesbot.com/docs/



## Important routes
    Migrate db tables:
        /migrate

    Clear route cache:
        /cache-clear

    Clear config cache:
        /config-cache

    Clear application cache:
        /clear-cache

    Clear view cache:
        /view-clear

    Clear route cache:
        /route-cache

    Clear config cache:
        /config-cache

## Home Tables, Models and Controllers
    Logs
        php artisan make:migration create_logs_table --create=logs_table
        php artisan make:model LogsModel -m (model)
        php artisan make:controller LogsController --resource (controller)

    Organizations 
        php artisan make:migration create_organizations_table --create=organizations_table
        php artisan make:model OrganizationsModel -m (model)
        php artisan make:controller OrganizationsController --resource (controller)

    Supplier 
        php artisan make:migration create_supplier_table --create=supplier_table
        php artisan make:model SupplierModel
        php artisan make:controller SupplierController --resource 

    Assets 
        php artisan make:migration create_assets_table --create=assets_table
        php artisan make:model AssetsModel
        php artisan make:controller AssetsController --resource 


            To add the new column
        php artisan make:migration add_new_column_to_organizations_table --table="organizations_table"


         public function up()
            {
                Schema::table('instructors_table', function($table) {
                    $table->string('description');
                });
            }
        public function down()
            {
                Schema::table('tasks', function($table) {
                    $table->dropColumn('description');
                });
            }
        php artisan make:controller BaseApiController --resource (controller)



## Git Hub Pushing
1 => git add .
2 => git commit -m 'New Changes And Updates'
3 => git branch -M main
4 => git push -u origin main


