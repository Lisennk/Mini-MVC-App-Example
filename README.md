# Webmasters-Forge-LTD-Test-Job
Test job for Webmasters Forge LTD

**Requirements:**
* PHP 7
* PDO
* Composer
* Vagrant (optional)

**How to install:**
```
git clone https://github.com/Lisennk/Webmasters-Forge-LTD-Test-Job.git
cd Webmasters-Forge-LTD-Test-Job
composer install
composer dump-autoload
```
Now create new database and set it's data in `config/db.php` file. 
Then run `php migrate.php` to create database tables. Finally, make `public` folder your document root, set chmod to `cache` and `public/usercontent/*` and you are ready to go. 

**Vagrant**

Also there is Homestead included, so you can set your data in Hometead.yaml and then run following commands to create machine:
```
php vendor/bin/homestead make
vagrant up
```
