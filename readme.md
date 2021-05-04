# ```Setting up OSC Dealership locally:`````
OSC Dealership requires:<br>
Composer<br>
A local server with database capability (Xampp for windows, Lamp for Linux and Mamp for Mac are all good)<br></br>
Once all of this is downloaded and installed. Open the .env file from the root directory. Then fill in relevant information, 
this is primarily: <br>
`DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=`
These should all be configured to match your local server and the database within. With Xampp for example,
it will look something like this: <br>
`DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=OSC_Dealership
DB_USERNAME=root
DB_PASSWORD=`
Once configured, and all the prerequisites are installed. Open Xampp and start Apache and MySQL.
Run a command line within the folder OSC Dealership is installed in and run the command `php artisan migrate`
which will create the relevant database tables. Then run `php artisan serve`<br>
This will open the local composer server on http://127.0.0.1:8000/. Going to this address will run the
OSC Dealership. Clicking the fill database button will fill the table with dummy information.
