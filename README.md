# :star: Mini MVC App Example :star:
With user registration, localization and file upload.

**:zap: Requirements:**
* PHP 7
* PDO
* Composer
* Vagrant (optional)

**:sunny: How to install:**
```
git clone https://github.com/Lisennk/Webmasters-Forge-LTD-Test-Job.git
cd Webmasters-Forge-LTD-Test-Job
composer install
composer dump-autoload
```
Now create new database and set it's data in `config/db.php` file. 
Then run `php migrate.php` to create database tables. Finally, make `public` folder your document root, set chmod to `cache` and `public/usercontent/*` and you are ready to go. 

**:cupid: Vagrant**

Also there is Homestead included, so you can set your data in Hometead.yaml and then run following commands to create machine:
```
php vendor/bin/homestead make
vagrant up
```
