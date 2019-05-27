# DownThePlan

After you downloaded the folder or cloned it go the main folder in our case ‘Eindwerk_WebDev2 and install composer locally or globally if do not have composer installed go to https://getcomposer.org/download/ and follow the steps.
or if you want a quick install in the current directory (prefferably the main folder) run.
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
After you installed composer either locally or globally you will create a .env file in the main folder. After you created this copy paste the following code in that file.

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:fEz7//WAMKDiRIJ0vfkhWLDD1laMNtFTzSYTWL0xcrs=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE= {your database name}
DB_USERNAME={your database user}
DB_PASSWORD={your database pass}

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=mailgun
MAIL_HOST=smtp.mailtrap.org
MAIL_PORT=587
MAIL_ENCRYPTION=tls

//Got to https://www.mailgun.com/ and create your free account 
//Create a sandbox domain and get the free api's paste them below on order

MAILGUN_DOMAIN={your mailgun domain}
MAILGUN_SECRET={your mailgun key}

MAIL_USERNAME=postmaster@sandboxc938220674964377ad56ea26066a5dd1.mailgun.org
MAIL_PASSWORD=f96402c4dce59b04d13c31f48e73ed8f-2416cf28-d5a07c2b
MAIL_FROM_ADRESS=postmaster@sandboxc938220674964377ad56ea26066a5dd1.mailgun.org
MAIL_FROM_NAME={your mail name}

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY=”${PUSHER_APP_KEY}”
MIX_PUSHER_APP_CLUSTER=”${PUSHER_APP_CLUSTER}”
// Go to https://stripe.com/en-be and create an account there you will find
// your public and secret Stripe key paste them in order down below
STRIPE_KEY={your stripe public key}
STRIPE_SECRET={your stripe secret key}
CREDIT_RATIO=0.05 
```

After you copied this add all the required info ( links to stripe and mailgun site included).
Your database will have to be linked aswell
If you created your database and linked it you can import the database.sql file into to your database.
This database will have a few basic pages with content and an admin user with the info AdminUser@test.be and pass: 123456789
or make a new user the admin and delete this one.

After you've done this you can and start the app by going into the main file in your terminal or other CLI-tool and run the command 
php artisan serve this will start up a server on the given host based on your .env file.

After that you can open a new terminal and use this project to start your own.
