# MyPortal Test Branch
You are currently in the testing branch of MyPortal.

Features here may break or disappear completely. Or, they may be added to the main branch in a future release.

If you wish to see new features, or work on your own, you can use the test branch without disrupting your normal users.
It isn't recommended to add this branch to an auto-update script, because it can break any edits you make, or prevent updates from being merged to your data.

When you want a new version of the testing branch, clone it into a different directory. Then you can access that directory, like this: yourdomain.com/TEST_BRANCH

# Shared-Database Issue
*If you download this without editing anything, and run it, you could possibly destroy your entire SQL database!*

The database configuration is set to the *same default* as the main branch! If this happens to be your configuration setup (which it shouldn't), you can damage your actual user database.
To prevent this, create a backup of your SQL database, and use it for the testing branch.