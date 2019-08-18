# MyPortal
This repository contains files for the MyPortal server.

MyPortal is a team collaboration server that makes moving files across computers easy and fast. It can be ran on a Raspberry Pi Computer.

Dependencies: PHP 7+, Apache 2, MySQL


# Setting Up MyPortal Users
Setting up users with MyPortal is easy. New users can click on the "Login to MyPortal" button, and click "Sign Up" at the bottom of the page. If you need to prevent certain words or characters in usernames, edit the *register.php* file (The code is commented out). All users will have access to the same tools (like the File Manager), so each user gets access to the same files. However, another MyPortal server (for example, in another state) will not have access to those tools. Each server is independent from another.

**Note: You need to create an SQL table on your server, and edit the values in the PHP scripts. Most of this can be done from the "config.php" script.**

# Activating Maintenance Support
If you are an administrator and wish to make changes to the configuration of MyPortal, please rename the "maintenance1.enable" file to "maintenance.enable", to activate the maintenance page.

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

Then reload Apache to apply the new settings with *apachectl graceful*.

# Enable Automatic Updates
You can enable automatic updates by creating a bash script to pull new code to your server. 

The script can look like this:

    #!/bin/sh
    cd /var/www/html  # Use your server directory here
    git pull orgin master

Use *chmod +x updatescript.sh* to make it executable

Then you can use a *crontab* to make it run automatically.

Using *crontab* is very simple and straightforward. Using *crontab -e* you can add a new cron job to be scheduled. Go to [this page] (https://www.pantz.org/software/cron/croninfo.html) for cron examples and syntax.