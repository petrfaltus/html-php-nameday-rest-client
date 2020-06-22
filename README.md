# Name day REST client
The PHP application for finding name days for the name or for the date inside the simple HTML page. It is the client that communicates with my own name day REST service.

This code needs to be launched using the web server with the PHP processing on the server side. This can be done by any separate computer, by any virtual machine or by any docker image.

For the operation there must be the **name or date** field in the web form specified.

## Versions
Now in June 2020 my version of Apache web server is **2.4.38** (Debian) and my version of PHP is **7.4.6**. All used PHP code should be also fully compatible with the PHP version 5. I am launching the web server using the docker desktop version **2.3.0.3 (45519)** with the docker engine version **19.03.8**.

### Cloning to your computer
- clone this repository to your computer by the GIT command `git clone https://github.com/petrfaltus/html-php-nameday-rest-client.git`

### Running
- copy all files to the web folder of the web server
- call the `index.php` file through the web server from the web browser
