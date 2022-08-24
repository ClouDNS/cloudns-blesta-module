# ClouDNS

Easily provision DNS Zones using ClouDNS, DNS Hosting service.

## Install the Module

1. Upload the source code to a /components/modules/cloudns/ directory within
your Blesta installation path.

    For example:

    ```
    /var/www/html/blesta/components/modules/cloudns/
    ```

2. Log in to your admin Blesta account and navigate to
> Settings > Modules

3. Find the ClouDNS module and click the "Install" button to install it

4. You're done!

---

# Setting Up

#### Add an account
- Go to `/admin/settings/company/modules/installed/` and click "Manage" on the "ClouDNS" module
- Click "Add Account" in the top right
- Fill out required information

### Quick Support
#### How do I find my API User ID and Password?

- Login into your ClouDNS account
- Go to "Resellers" at the top (https://www.cloudns.net/api-settings/)
- Under API Users, click "+ Add new user"
- This will prompt your to enter an "auth-password", that is your API User Password
- Click "Save", once created, you'll see it in the table with an "auth-id", that is your API User ID 