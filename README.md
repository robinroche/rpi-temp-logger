# rpi-temp-logger

An online Rasperry Pi-based temperature logger.

### Licence

None. Feel free to use it as you wish.

### Objectives

This project describes how I designed a monitoring system for measuring the current conditions in
my office. Right now, only a temperature sensor is used. More may be added in the future.

### Hardware setup

The required hardware parts are:
- A Raspberry Pi with Raspbian,
- A Wifi USB stick or an Ethernet connection,
- A way to interface the RPi's GPIO pins with electronic components, such as the [Pi Cobbler Kit](http://www.adafruit.com/products/914),
- A mouse and keyboard, preferably with a USB hub,
- A breadboard with a temperature sensor, such as the Dallas DS18B20, and a 4.7 kOhm resistor,
- An LED with a 220 Ohm resistor (optional).

### Operation principle

The system works as follows:
- The temperature sensor measures the temperature every 10 minutes,
- The RPi acquires this data and connects to this webpage,
- The data is added to a database table,
- The data is then retrieved and displayed in the graph below using [Highcharts](http://www.highcharts.com/).

![System architecture](http://robinroche.com/webpage/images/temp_log_archi.PNG)

### System setup

The following parameters need to be set on the RPi:
- Configure the Wifi connection,
- Make sure the sensor is working, after installing the required libraries (GPIO, Python, etc.),
- Make sure drivers (w1-gpio, w1-therm) are loaded at startup,
- Configure crontab and make sure it is started automatically on boot.

### Code structure

The following scripts are used:
- temperature_test.py: to test temperature measurements on the RPi,
- temperature_upload.py: to run temperature measurements on the RPi and upload them to a webserver,
- process_data.php: to add the measurement to the server database on the webserver,
- display_page.php: to display results on the webserver.

### Sample output

The final result looks as in shown in the figure below. This is a graph of the temperature, obtained with HighCharts.

![Temperature data obtained by the RPi](http://robinroche.com/webpage/images/temp_data_rpi.PNG)

Please note that temperature spikes usually result of the sun hitting the sensor directly, which yields
overestimated temperatures. This could be avoided by hiding the sensor from direct sunlight. 

### Limitations

Note that due to instabilities in the Wifi connection, I am not using this system anymore. An Ethernet connection would probably be better.

### Contact

Robin Roche - robinroche.com
