-- 

## About Loggy ✌️

Loggy is a web platform to centralize and track every logs of your website in order to monitor and alert much better !

- Simple and fast installation, only 2 minutes
- Usable with backend and/or frontend stack
- Quick installation for Laravel and Symfony (much more very soon)
- Also usable for frontend project only
- Secure with static token or dynamic bearer token
- IP restriction to allow only your domains
- Real-time alert

Loggy is simple, fast and smart because it can alert you in real time and help you to resolve your bug. Don't let your logs faar away on your server !

## How it works 🤓

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
Add the following variables in your .env file :

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
Add the following variables in your .env file :

    # Loggy configuration
    LOGGY_API_URL=https://logmanager.kouroo.fr/api
    LOGGY_SITE_ID=<your-site-uuid>
    LOGGY_SITE_TOKEN=<your-site-token>

Then, create an ExceptionListener.php file in src/ :

    <?php
        namespace App\EventListener;

        use Kouroo\Loggy\Helper\Loggy;
        use Symfony\Component\HttpFoundation\Response;
        use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
        use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

        class ExceptionListener
        {
            /**
            * @param $event
            */
            public function onKernelException($event)
            {
                $e = $event->getThrowable();

                Loggy::sendException($e);
            }
        }

Finally, declare your listener in the config/services.yml file : 

    # add more service definitions when explicit configuration is needed
    # please note that last definitions always *replace* previous ones
    App\EventListener\ExceptionListener:
        tags:
            - { name: kernel.event_listener, event: kernel.exception }

### WordPress Configuration
Coming soon 🕓

### Drupal Configuration
Coming soon 🕓

### Prestashop Configuration
Coming soon 🕓

### Adobe Commerce (Magento) Configuration
Coming soon 🕓

## Rest API 💻

Documentation : [https://documenter.getpostman.com/view/6787367/2s946o2oNF](https://documenter.getpostman.com/view/6787367/2s946o2oNF)

### Authentication
    POST /api/login
    {
        email: <your-email>
        password: <your-password>
    }

### Log

Add log with authorization bearer token

    POST /api/site/<your-site-uuid>/log
    Authorization : Bearer <authorization-token>
    {
        ...
    }

Add log with a static token (less secure)

    POST /api/site/<your-site-uuid>/log?token=<your-site-token>
    {
        ...
    }

## Security Vulnerabilities 🚨

If you discover a security vulnerability within Loggy, please send an e-mail to Kouroo via [contact@kouroo.fr](mailto:contact@kouroo.fr). All security vulnerabilities will be promptly addressed.

## License 📑

The Loggy package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).