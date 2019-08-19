# MyPortal
This repository contains files for the MyPortal server.

MyPortal is a team collaboration server that makes moving files across computers easy and fast. It can be ran on a Raspberry Pi Computer.

Dependencies: PHP 7+, Apache 2, MySQL

Recommended Computer Specs:

1 GHz Processor Clock Speed
512 MB RAM
32 GB Storage *
5 MB/s Network Speed (NOT internet speed! Network speed is between your computer and the router)

These values should be increased if there are plenty of users. For 1-5 users, this is enough.

*32 GB Storage is the drive itself. Typically, with a Lite Raspbian installation, you'll have about 30 GB left.

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

Using *crontab* is very simple and straightforward. Using *crontab -e* you can add a new cron job to be scheduled. Go to (https://www.pantz.org/software/cron/croninfo.html) 
for cron examples and syntax.

# Enable Custom Error Pages
Sometimes, a user might type in a URL which doesn't exist, causing a HTTP 404 error. Apache's default can be useful, but doesn't always look professional. Other times, you might accidentally hit a protected directory, causing an HTTP 403 error. Anyway, we have some covered.

We have made three custom error pages (HTTP Errors: 403, 404, and 500 (NOTE: Some 500 errors, like in PHP, don't actually send a 500 error, and so the page won't appear)).
You change these, or make new ones, just keep the name or edit the ".htaccess" files. We only have three right now because these are the most common.

If you decide to make new ones, you MUST add them to the ".htaccess" files! Otherwise, they won't activate when a user gets an error.

# Suggestions and Issues
If have your own suggestions, please make a pull request