1. First download Xampp from https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.0.19/xampp-windows-x64-8.0.19-0-VS16-installer.exe/download

2. Run notepad as administrator mode  and go to "C:\xampp\apache\conf\extra"  and open this file "httpd-vhosts.conf"
then add this piece of code and save the file:

<VirtualHost *:8080>
    DocumentRoot "C:/xampp/htdocs/"
    ServerName localhost
</VirtualHost>

<VirtualHost *:8080>
    DocumentRoot "C:/xampp/htdocs/Final"
    ServerName RTFoodDelivery.test
</VirtualHost>

3. Again  Run notepad as administrator mode  and go to "C:\Windows\System32\drivers\etc" and open this file "hosts" then add this piece of code and save the file:
 

127.0.0.1      RTFoodDelivery.test
::1      localhost

4. extract the zipped-code folder and copy 'final' folder and paste it to "C:\xampp\htdocs" in this location.

5.Now open xamapp start apache and MySQL. Click admin option from MySQL . create a new database and named it , 'final' then select import option and chose ".sql" file from upzipped folder and then click on import button.

6.now open a new tab and paste this link, "http://rtfooddelivery.test:8080/" 
here I attached admin credential for this site: 
'
 email: rayhanhimel007@gmail.com
 pass:  123456
'

after logging in with this credential you can see all users , you can logged in any of them , just use password: 123456

or you can create account as "user or  delivery man".



 cheers



