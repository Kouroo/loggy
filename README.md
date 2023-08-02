-- 

## About Loggy

Loggy is a web platform to centralize and track every logs of your website in order to monitor and alert much better !

- Simple and fast installation, only 2 minutes
- Usable with backend and/or frontend stack
- Quick installation for Laravel and Symfony (much more very soon)
- Also usable for frontend project only
- Secure with static token or Oauth
- IP restriction to allow only your domains
- Real-time alert

Loggy is simple, fast and smart because it can alert you in real time and help you to resolve your bug. Don't let your logs faar away on your server !

## How it works

**Step 1 :**
- Create an account on [logmanager.kouroo.fr](https://logmanager.kouroo.fr)
- Then, add the first website that you want to monitor and track all the logs.
- Enter the name of the website, the URL and the allowed IPs address and that's it !

It will give you 2 things :
- UUID website
- Static Token
 
**Step 2 :**
Add the package in your project :

    composer require kouroo/loggy:dev-master

### Laravel Configuration
Add in your .env file the following variables :

    # Loggy configuration
    LOGGY_API_URL=https://logmanager.kouroo.fr/api
    LOGGY_SITE_ID=<your-site-uuid>
    LOGGY_SITE_TOKEN=<your-site-token>

Then, add two lines your app\Exceptions\Handler.php file :

    use Kouroo\Loggy\Helper\Loggy; <-- Import the loggy helper
    ...
    public function register()
    {
	    $this->reportable(function (Throwable  $e) {
		    Loggy::sendException($e); <-- Add the method in the register method
		});
	}

### Symfony Configuration
Coming soon 🕓

### WordPress Configuration
Coming soon 🕓

### Drupal Configuration
Coming soon 🕓

### Prestashop Configuration
Coming soon 🕓

### Adobe Commerce (Magento) Configuration
Coming soon 🕓

## Rest API
### Backend usability
Coming soon 🕓

### Frontend usability
Coming soon 🕓

## Security Vulnerabilities

If you discover a security vulnerability within Loggy, please send an e-mail to Kouroo via [contact@kouroo.fr](mailto:contact@kouroo.fr). All security vulnerabilities will be promptly addressed.

## License

The Loggy package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).