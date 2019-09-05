# Using WordPress authentication on an external application

This is a code sample for the situation when we want to use WordPress' authentication on an application external to it, installed on the same server (on a sub-directory of WordPress' directory).

## Warnings

* WordPress uses domain-based cookies to keep users logged in, which means that this package can only be installed on the same domain as the WordPress installation we are using to verify the users sessions. **Subdomains will not work**.

## Sources

* <https://www.webhostinghero.com/wordpress-authentication-integration-with-php/>
* https://stackoverflow.com/a/38046553/1298923