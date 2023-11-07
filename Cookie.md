In PHP, you can work with cookies to store and retrieve data on the client-side (in the user's browser). Cookies are often used for various purposes, such as remembering user preferences, session management, and more. Below are some common operations related to cookies in PHP:

### **Setting a Cookie:**

To set a cookie in PHP, you use the `setcookie` function. Here's the basic syntax:

```php
setcookie(name, value, expire, path, domain, secure, httponly);
```

- `name`: The name of the cookie.
- `value`: The value to store in the cookie.
- `expire`: Optional. The expiration timestamp for the cookie. If not specified, the cookie will be a session cookie (expires when the browser is closed).
- `path`: Optional. The path on the server for which the cookie will be available. If not specified, it defaults to the current directory.
- `domain`: Optional. The domain for which the cookie is available. If not specified, it defaults to the current domain.
- `secure`: Optional. If set to `true`, the cookie will only be transmitted over secure HTTPS connections.
- `httponly`: Optional. If set to `true`, the cookie will only be accessible via HTTP and not JavaScript.

Here's an example of setting a cookie with a 24-hour expiration:

```php
setcookie("user", "JohnDoe", time() + 3600 * 24, "/");
```

### **Retrieving a Cookie:**

You can retrieve a cookie value using the `$_COOKIE` superglobal. For example:

```php
if (isset($_COOKIE["user"])) {
    $username = $_COOKIE["user"];
    echo "Welcome, $username!";
} else {
    echo "No user cookie found.";
}
```

### **Deleting a Cookie:**

To delete a cookie, you can use the `setcookie` function with an expiration time in the past, or simply set it to an empty value. For example:

```php
// Deleting a cookie by setting an expiration time in the past
setcookie("user", "", time() - 3600, "/");

// Deleting a cookie by setting it to an empty value
setcookie("user", "", time() - 3600, "/");
```
