# MyPortal
MyPortal is a team collaboration server that makes moving files across computers easy and fast. It can be operated from a Raspberry Pi Computer.

Dependencies: PHP 7+, Apache 2, and MySQL

Recommended Computer Specs:

- 1 GHz Processor Clock Speed
- 512 MB RAM
- 5 MB/s Network Speed

These values match with a Raspberry Pi Zero, and are sufficient for 1-5 users. You should upgrade your server hardware if you have more users. 

You can install the required dependencies with the ```apt``` package manager.

# Setting Up MyPortal Users
Setting up users with MyPortal is easy. New users can click on the "Login to MyPortal" button, and click "Sign Up" at the bottom of the page. If you need to prevent certain words or characters in usernames, edit the *register.php* file (The code is commented out). All users will have access to the same tools (like the File Manager), so each user gets access to the same files. However, another MyPortal server (for example, in another state) will not have access to those tools. Each server is independent from another.

**Note: You need to create an SQL table on your server, and edit the values in the PHP scripts. Most of this can be done from the "config.php" script.**

# Activating Maintenance Support
If you are an administrator and wish to make changes to the configuration of MyPortal, please rename the ```maintenance1.enable``` file to ```maintenance.enable``` to activate the maintenance page.

You will have to add Rewrite Rules to your configuration file in the Apache Virtual Host to redirect all visitors to the maintenance page.
You can do it with the following Rewrite Rules:
    
    RewriteEngine On
    RewriteCond %{REMOTE_ADDR} !^123\.456\.789\.000
    RewriteCond %{DOCUMENT_ROOT}/maintenance.html -f
    RewriteCond %{DOCUMENT_ROOT}/maintenance.enable -f
    RewriteCond %{SCRIPT_FILENAME} !maintenance.html
    RewriteRule ^.*$ /maintenance.html [R=503,L]
    ErrorDocument 503 /maintenance.html
    Header Set Cache-Control "max-age=0, no-store"

Then reload Apache to apply the new settings with ```apachectl graceful```.

# Enable Automatic Updates
You can enable automatic updates by creating a bash script to pull new code to your server. 

The script can look like this:

    #!/bin/sh
    cd /var/www/html  # Use your server directory here
    git pull orgin master

Use ```chmod +x updatescript.sh``` to make it executable

Then you can use a ```crontab``` to make it run automatically.

Using ```crontab``` is very simple and straightforward. Using ```crontab -e``` you can add a new cron job to be scheduled. Go to [this link](https://www.pantz.org/software/cron/croninfo.html) 
for cron examples and syntax.

# Enable Custom Error Pages
Custom error pages are provided and can be activated using a ```.htaccess``` file. You need to create a ```.htaccess``` file in the root of your website. Within that file, you can place the following code in the ```.htaccess``` file to redirect users upon certain HTTP codes.

    ErrorDocument 403 http://SERVERIP/errorpages/403errorpage.html
    ErrorDocument 404 http://SERVERIP/errorpages/404errorpage.html
    ErrorDocument 500 http://SERVERIP/errorpages/500errorpage.html

The three most common error pages are provided: HTTP 403, 404, and 500. Please note that some HTTP 500 errors may not display the custom page because PHP pages don't operate with the same codes.

If you decide to make new pages you must update the ```.htaccess``` file to ensure the user sees the page.

# Enable TeamChat Web App
The TeamChat web application allows all users on a team to send messages instantly. A ScaleDrone API account is needed (Get one [here](https://scaledrone.com).) You need to edit the ```index.php``` file in the ```/teamchat``` folder and replace the API key with your own. The administrator is the only one that needs to make an API account, and other users will connect to it.

**If you don't change the API key, your page will break and you may get random messages!**

# Suggestions and Issues
If have your own suggestions, please make a pull request and it may get implemented.

For other issues, please make an issue and describe it with the files affected. You can create your own pull requests with fixes.