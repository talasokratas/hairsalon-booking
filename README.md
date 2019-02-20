<h2>Description</h2>
This is a PHP hairsalon/barbershop time booking system made in a few days. Hopefully will be updated soon. 
Client can choose date, time and hairdresser from given table. Booked times are colored red and available times are shown
as green button. When client clicks on the button he or she is redirected to confirmation form where credentials are entered.
10% discount for every fifth visit, visits are confirmed only by hairdresser. 

<h2>How to use this web application</h2>
For this app to work server where this app will be hosted must have mod_rewrite module enabled, because it is used in .htaccess files.

<h3>After placing this app to server or your developing environment foolow this steps:</h3>
1. <strong>IMPORTANT</strong><br> Open .htaccess file located in public folder and change rewrite base 
 RewriteBase /hairsalon-booking-mvc/public
to your directory. /hairsalon-booking-mvc/ should be replaced by your directory.
In most hosting cases RewriteBase /public/ should work<br>
2. Create database for this application<br>
3. Rename congig-example.php to config.php and save your database crediantials to this file<br>
4. Add rooturl and sitename to the same configuration file<br>

That's it for now. There are quite few things left to work on.
